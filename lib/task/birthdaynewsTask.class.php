<?php

class birthdaynewsTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name','frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'frontend';
    $this->name             = 'birthdaynews';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [ba:recount|INFO] task does things.
Call it with:

  [php symfony frontend:lesson|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
    $this->context = sfContext::createInstance($this->configuration);

    $pdo = Doctrine_Manager::connection()->getDbh();

    $q = Doctrine_Manager::getInstance()->connection();

      echo 'start for man...'."\n;";



      $anniversaries = ProfileTable::getAnniversariesTosend('m');

      if(count($anniversaries)>0)
      {

          $sql_string = "SELECT sf_guard_user.id, sf_guard_user.email, sf_guard_user.culture, sf_guard_user.salt from sf_guard_user, jo_profile where jo_profile.user_id=sf_guard_user.id and sf_guard_user.is_active='true' and  jo_profile.status_id=1 and sf_guard_user.gender='w'";

          $st = $q->execute($sql_string);

          $items = $st->fetchAll();

          $arr = array();
          foreach ($items as $k=>$v)
          {

              $notice = NotifyTable::getNotify(14,$v['culture']);
              $content = $notice->Translation[$v['culture']]->icontent;
              $title = $notice->Translation[$v['culture']]->ititle;

              foreach($anniversaries as $ke=>$ve)
              {


                  $scontent = str_replace('%user_name%',$ve->getFirstName().' '.$ve->getLastName(),$content);
                  $scontent = str_replace('%user_date%',format_date($ve->getBirthday(),'D'),$scontent);
                  $scontent = str_replace('%image_link%','http://'.sfConfig::get('app_http_host').$ve->getUrlImage(),$scontent);

                  $scontent = str_replace('%messagebox_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/message/index?code='.$v['salt'],$scontent);
                  $scontent = str_replace('%contact_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/contact/index?code='.$v['salt'],$scontent);

                  $scontent = str_replace('%member_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/profile/show?username='.$ve->getsfGuardUser()->getUsername().'&code='.$v['salt'],$scontent);


                  $m = new Mailer();
                  $m->setTitle($title);
                  $m->setContent($scontent);
                  $m->setEmail($v['email']);
                  $m->setUserId($v['id']);
                  $m->save();

                  $ve->setBirthdayMark(date('Y'));
                  $ve->save();
                  // mailTools::send($v->getEmail(), $v->getTitle(), $v->getContent());
                  //echo "sending...".$v."\n;";
              }

             echo "sending.....".$v['email']."\n;";
          }
      }













          $anniversaries = ProfileTable::getAnniversariesTosend('w');

          if(count($anniversaries)>0)
          {

              $sql_string = "SELECT sf_guard_user.id, sf_guard_user.email, sf_guard_user.culture, sf_guard_user.salt from sf_guard_user, jo_profile where jo_profile.user_id=sf_guard_user.id and sf_guard_user.is_active='true' and  jo_profile.status_id=1 and sf_guard_user.gender='m'";

              $st = $q->execute($sql_string);

              $items = $st->fetchAll();

              $arr = array();
              foreach ($items as $k=>$v)
              {

                  $notice = NotifyTable::getNotify(14,$v['culture']);
                  $content = $notice->Translation[$v['culture']]->icontent;
                  $title = $notice->Translation[$v['culture']]->ititle;

                  foreach($anniversaries as $ke=>$ve)
                  {


                      $scontent = str_replace('%user_name%',$ve->getFirstName().' '.$ve->getLastName(),$content);
                      $scontent = str_replace('%user_date%',format_date($ve->getBirthday(),'D'),$scontent);
                      $scontent = str_replace('%image_link%','http://'.sfConfig::get('app_http_host').$ve->getUrlImage(),$scontent);

                      $scontent = str_replace('%messagebox_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/message/index?code='.$v['salt'],$scontent);
                      $scontent = str_replace('%contact_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/contact/index?code='.$v['salt'],$scontent);

                      $scontent = str_replace('%member_link%','http://'.sfConfig::get('app_http_host').'/'.$v['culture'].'/profile/show?username='.$ve->getsfGuardUser()->getUsername().'&code='.$v['salt'],$scontent);


                      $m = new Mailer();
                      $m->setTitle($title);
                      $m->setContent($scontent);
                      $m->setEmail($v['email']);
                      $m->setUserId($v['id']);
                      $m->save();

                      $ve->setBirthdayMark(date('Y'));
                      $ve->save();
                      // mailTools::send($v->getEmail(), $v->getTitle(), $v->getContent());
                      //echo "sending...".$v."\n;";
                  }

                  echo "sending.....".$v['email']."\n;";
              }





      }


     echo 'done';
   

   
  }
  


  
  
}
