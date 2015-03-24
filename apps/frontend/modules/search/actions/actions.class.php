<?php

/**
 * search actions.
 *
 * @package    levandos
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */



    public function executeAnniversary(sfWebRequest $request)
    {
      //$this->checkAuthorization();
        /*
        $q = Doctrine_Query::create()
            ->select('j.id')
            ->from('profile as j')
            ->where('((EXTRACT(MONTH FROM j.birthday ),
             EXTRACT(DAY FROM j.birthday )) IN (
             SELECT EXTRACT( MONTH FROM thedate.theday + s.a ) AS m,
             EXTRACT( DAY FROM thedate.theday + s.a ) AS d
             FROM
             (SELECT date ( v.column1 -(extract ( YEAR FROM v.column1 )-2000 ) * INTERVAL "1 year") as theday
                 FROM ( VALUES (date "2012-03-12" )) as v) as thedate,
                 GENERATE_SERIES(0, 6) AS s(a)
        )
    )')
            ->execute();
    */

        $dt = new sfDate();
        //$dt->subtractDay(15);
        if($this->getUser()->isAuthenticated())
        {
            if($this->getUser()->getGuardUser()->getProfile()->getGender()=='m')
            {
                $g = 'w';
            }
            else
            {
                $g = 'm';
            }
        } else {
            $g = 'w';
        }
        $q = Doctrine_Manager::getInstance()->connection();

        $sql_string = "SELECT id
        FROM
           jo_profile as people
        WHERE
            ((EXTRACT(MONTH FROM people.birthday),
             EXTRACT(DAY FROM people.birthday)) IN (
                SELECT EXTRACT(MONTH FROM thedate.theday + s.a) AS m,
                       EXTRACT(DAY FROM thedate.theday + s.a) AS d
                FROM
                        (SELECT date (v.column1 -
                                (extract (YEAR FROM v.column1)-2000) * INTERVAL '1 year'
                               ) as theday
                         FROM (VALUES (date '".$dt->dump('Y-m-d')."')) as v) as thedate,
                         GENERATE_SERIES(0, 15) AS s(a)
                )
            ) and people.gender='".$g."'";

        $st = $q->execute($sql_string);
        $this->items = $st->fetchAll();

        $this->insertArrays();
     $this->banners = Doctrine::getTable('Page')
     ->createQuery('a')
     ->where('a.alias=?' ,array('banners'))
     ->fetchOne();

    }

public function executeAdv(sfWebRequest $request)
  {
    if(sfConfig::get('app_reg_search')=='false' and !$this->getUser()->isAuthenticated()) $this->redirect ('access/onlyregister');
    $this->form = new advsearchForm();
    
    
           ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  __('Advanced search'));
		    $this->getResponse()->addMeta('keywords', __('Advanced search'));
		    $this->getResponse()->addMeta('title',  __('Advanced search'));
	   ////
                    
    
  }

  public function executeIndex(sfWebRequest $request)
  {
      $this->autoenter();
      //$this->checkAuthorization();
      //if(!$this->getUser()->isAuthenticated()) $this->redirect ('access/onlyregister');
      
      
     $this->banners = Doctrine::getTable('Page')
     ->createQuery('a')
     ->where('a.alias=?' ,array('banners'))
     ->fetchOne();

     if($this->getUser()->isAuthenticated())
     {
      if($this->getUser()->getGuardUser()->getProfile()->getGender()=='m')
      {
          $this->gender = 'w';
      }
      else
      {
           $this->gender = 'm';
      }
     } else {
         $this->gender = 'w';
     }
     

      $q = Doctrine::getTable('Profile')
      ->createQuery('a')
      ->leftJoin('a.sfGuardUser s')
      ->where('a.is_active=? and a.status_id=1 and a.is_staff=false',array(true));

      /*
      if($this->getUser()->isAuthenticated())
      {
          if(sfConfig::get('app_not_same_gender')=='true')


              $q->addWhere('a.gender<>?',array($this->getUser()->getGuardUser()->getGender()));

      }
      */

      $q = $this->addCriteria($request, $q);
      $q = $this->addOrder($request, $q);

//      $pars = $_GET;
//      $this->arp = array();
//      foreach($pars as $k=>$v)
//      {
//         $this->arp[$k]=$v;
//      }
      //print_r($this->arp);

       $this->pager = new sfDoctrinePager('Profile',15);
       $this->pager->setQuery($q);
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();

       $this->insertArrays();

      if($this->gender=='m' and !isset($this->title))
      {
          $this->title =  __('Result of your search');
      }
      else{
          $this->title =  __('Result of your search');
          $this->pager_routing = '@search_album';
      }

      if($request->getParameter('is_online')=='on' and !isset($_GET['age_from']))
      {

         $this->title =  __('Online users');
         $this->pager_routing = 'search/index';
      }
      if($request->getParameter('new')=='1')
      {
          $this->title =  __('New members');
          $this->pager_routing = '@search_new';
      }
      if($request->getParameter('order')=='rating')
      {
          $this->title =  __('Most Viewed');
          $this->pager_routing = '@search_most';
      }
      if($request->getParameter('order')=='unrating')
      {
          $this->title =  __('Less Viewed');
          $this->pager_routing = '@search_less';
      }
      if($request->getParameter('type')=='top')
      {
          $this->title =  __('Top 100');
          $this->pager_routing = '@search_top';
      }

      if($request->getParameter('title')=='gallery_men' and !$request->getParameter('is_online'))
      {
          $this->title =  __('Men gallery');
          $this->pager_routing = '@search_album_men';
      }

      if($request->getParameter('title')=='gallery_women'  and !$request->getParameter('is_online'))
      {
          $this->title =  __('Women gallery');
          $this->pager_routing = '@search_album_woman';
      }


      ////Устанавливаем заголовки
      $this->getResponse()->addMeta('description',  $this->title);
      $this->getResponse()->addMeta('keywords', $this->title);
      $this->getResponse()->addMeta('title',  $this->title);
      ////


  }

  protected function addCriteria($request, $q)
  {

      if($request->getParameter('age_from'))
      {
          $y = date('Y')-$request->getParameter('age_from');
          $dt_from = $y.'-'.date('m').'-'.date('d');
          $q->addWhere('a.birthday<?',array($dt_from));
      }

      if($request->getParameter('age_to'))
      {

          $y = date('Y')-$request->getParameter('age_to');
          $dt_from = $y.'-'.date('m').'-'.date('d');
          $q->addWhere('a.birthday>?',array($dt_from));
      }


      if($request->getParameter('id')>0)
      {
          $id = substr($request->getParameter('id'),1,strlen($request->getParameter('id'))-1);
          $q->addWhere('a.user_id=?',array($id));
      }

       if($request->getParameter('with_photo'))
      {
          $q->addWhere('a.with_photo=?',array(true));
      }


      if($request->getParameter('eyes_color'))
      {
          $q->addWhere('a.eye_color=?',array($request->getParameter('eyes_color')));
      }


      if($request->getParameter('is_online')=='on')
      {

         // $q->addWhere('s.is_online=?',array(true));
          $q->orderBy('s.is_online DESC, s.id DESC');

      }



       if($request->getParameter('with_video'))
      {
          $q->addWhere('a.with_video=?',array(true));
          $this->pager_routing = '@search_video';
      }



       if($request->getParameter('country'))
      {
          $q->addWhere('a.country=?',array($request->getParameter('country')));
      }

      if($request->getParameter('user_id'))
      {
          $id = substr($request->getParameter('user_id'), 1, strlen($request->getParameter('user_id')));
          $q->addWhere('a.user_id=?',array($id));
  
      }


      if($request->getParameter('subtype')=='bikini')
      {
          $q->addWhere('a.subtype=?',array('bikini'));
      }


      if($request->getParameter('subtype')=='top100')
      {
          $q->addWhere('a.subtype=?',array('top100'));
      }

      if($request->getParameter('children'))
      {
          if($request->getParameter('children')=='with children')
          {
              $q->addWhere('a.children=? or a.children=? or a.children=? or a.children=? or a.children=? or a.children=? or a.children=?',array(
                  'with children',
                  '1 child',
                  '2 children',
                  '3 children',
                  '4 children',
                  '5 children',
                  '6 children',
                      ));
          } else {         
            $q->addWhere('a.children=?',array($request->getParameter('children')));
          }
      }

      if($request->getParameter('body_type'))
      {
          $q->addWhere('a.body_type=?',array($request->getParameter('body_type')));
      }


      if($request->getParameter('height_from'))
      {
          $q->addWhere('a.height>=?',array($request->getParameter('height_from')));
      }

      if($request->getParameter('height_to'))
      {
          $q->addWhere('a.height<=?',array($request->getParameter('height_to')));
      }


      if($request->getParameter('weight_from'))
      {
          $q->addWhere('a.weight>=?',array($request->getParameter('weight_from')));
      }

      if($request->getParameter('weight_to'))
      {
          $q->addWhere('a.weight<=?',array($request->getParameter('weight_to')));
      }



      if($request->getParameter('want_children'))
      {
          $q->addWhere('a.want_children=?',array($request->getParameter('want_children')));
      }

      if($request->getParameter('ethnicity'))
      {
          $q->addWhere('a.ethnicity=?',array($request->getParameter('ethnicity')));
      }

      if($request->getParameter('marital_status'))
      {
          $q->addWhere('a.marital_status=?',array($request->getParameter('marital_status')));
      }

      if($request->getParameter('education'))
      {
          $q->addWhere('a.education=?',array($request->getParameter('education')));
      }
      
      if($request->getParameter('smoker'))
      {
          $q->addWhere('a.smoker=?',array($request->getParameter('smoker')));
      }
      
      if($request->getParameter('drinker'))
      {
          $q->addWhere('a.drinker=?',array($request->getParameter('drinker')));
      }

      if($request->getParameter('looking_for_age_from'))
      {
          $q->addWhere('a.looking_for_age_from=?',array($request->getParameter('looking_for_age_from')));
      }

      if($request->getParameter('looking_for_age_to'))
      {
          $q->addWhere('a.looking_for_age_to=?',array($request->getParameter('looking_for_age_to')));
      }

      if($request->getParameter('city'))
      {
          $q->addWhere('a.city=?',array($request->getParameter('city')));
      }

      if($request->getParameter('hair_lenght'))
      {
          $q->addWhere('a.hair_lenght=?',array($request->getParameter('hair_lenght')));
      }

      if($request->getParameter('hair_color'))
      {
          $q->addWhere('a.hair_color=?',array($request->getParameter('hair_color')));
      }

      if($request->getParameter('language')!='---' and $request->getParameter('language'))
      {
          $q->addWhere('(a.language1=? or a.language2=? or a.language3=?)',array($request->getParameter('language'),$request->getParameter('language'),$request->getParameter('language')));

      }

      if($request->getParameter('language_skill')!='---' and $request->getParameter('language_skill'))
      {
          $q->addWhere('(a.language_skill1=? or a.language_skill2=? or a.language_skill3=?)',array($request->getParameter('language_skill'),$request->getParameter('language_skill'),$request->getParameter('language_skill')));

      }

            if(strlen($request->getParameter('profession'))>0)
      {
          $q->addWhere('a.occupation=?',array($request->getParameter('profession')));
      }
      


      if($request->getParameter('new')=='true')
      {
          
          $q->addWhere('a.timenew>?',array(time()));
          

      }

      if($request->getParameter('packet_id'))
      {
          $q->addWhere('a.packet_id=?',array($request->getParameter('packet_id')));
          $q->addWhere('a.gender=?',array('m'));

      }

       if($this->getUser()->isAuthenticated())
       {
      if(!$this->getUser()->getGuardUser()->getIsSuperAdmin())
      $q->addWhere('a.gender=?',array($this->gender));
       }

      return $q;

  }

    protected function addOrder($request, $q)
    {
        if($request->getParameter('order')=='rating')
        {
            $q->addWhere('a.rating>0');
            $q->orderBy('a.rating DESC');
        }
        elseif($request->getParameter('order')=='unrating')
        {
            $q->addWhere('a.rating>0');
            $q->orderBy('a.rating ASC, a.id');
        }
        elseif($request->getParameter('order')=='new')
        {

            $q->orderBy('a.id DESC');
            $this->title =  __('New members');
        }
        elseif($request->getParameter('is_online')=='on')
        {

            //$q->addWhere('s.is_online=?',array(true));
            //$q->orderBy('s.is_online DESC');

        }
        else{
            $q->orderBy('a.id DESC');
        }

        return $q;

    }
    
}
