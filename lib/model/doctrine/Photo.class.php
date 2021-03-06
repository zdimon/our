<?php

/**
 * Photo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Photo extends BasePhoto
{
    
           public function setPub($v) {
        if($v==true and $this->getPub()==false)
        {
            $d = 'USER ID:'.$this->getUserId();
            ActionsTable::add(2,$d);
        }
        $this->_set('pub', $v);
    }
    

    public function delImage($name)
    {
        $f = sfConfig::get('sf_upload_dir').'/photo/original/'.$name;
        @unlink($f);
        $f = sfConfig::get('sf_upload_dir').'/photo/big_thumbnail/'.$name;
        @unlink($f);
        $f = sfConfig::get('sf_upload_dir').'/photo/middle_thumbnail/'.$name;
        @unlink($f);
        $f = sfConfig::get('sf_upload_dir').'/photo/small_thumbnail/'.$name;
        @unlink($f);
    }

     public function delete(Doctrine_Connection $conn = null)
    {
       
         if($this->getImage()!='girl.jpg' and $this->getImage()!='man.jpg')
         {
            $this->delImage($this->getImage());
         }

         
         if (sfContext::hasInstance())
         {
             if($this->user_id!=sfContext::getInstance()->getUser()->getGuardUser()->getId())
             {
               $user = $this->getUser();
               
               
                $m = NotifyTable::getNotify(5, $user->getCulture());

        if($m)
        {
            $arr = array();
            $content =$m->parse2($arr,$user->getCulture());

            mailTools::send($user->getEmail(), $m->Translation[$user->getCulture()]->ititle, $content);
            
               
               
             }
         }
         }
                 $pr = ProfileTable::getProfileById($this->getUserId());
                 if($pr)
                 {
                     $pr->updateWithPhoto();              
                 }
         parent::delete();
        

    }
    
    public function save(Doctrine_Connection $conn = null)
	{
      
        if(strlen($this->image)==0) return true;

        ////Устанавливаем главной первое фото
             $cnt = Doctrine::getTable('Photo')
             ->createQuery('a')
             ->where('a.user_id=?',array($this->user_id))
             ->count();

             if($cnt==0)
             {
                 $this->setIsMain(true);


             }
             parent::save();
             
                 $pr = ProfileTable::getProfileById($this->getUserId());
                 if($pr)
                 {
                    $pr->updateWithPhoto();              
                 }
          
         


      
		
	}


 //   public function setUserId($value)
 //   {
 //       $this->_set('user_id', $value);
 //       $s = Doctrine::getTable('sfGuardUser')->find($value);
 //       if($s)
 //       {
 //           $this->setUsername($s->getUsername());
 //           $this->setPartnerId($s->getPartnerId());
 //       }

 //   }

    public function getStatusStr()
    {
        if($this->pub)
        {
            return __('утверждено');
        }
        else
        {
            return __('неутверждено');
        }
        

    }


    public function setImage($value) {
        if($value != $this->getImage())
        {
            $this->delImage($this->getImage());
        }
        $this->_set('image', $value);
        if(strlen($value)>0)
        $this->generateThumbnail ( $value );

    }
    public function generateThumbnail($value) {

        $small_photo_width  =  79;
        $small_photo_height =  79;
        $big_photo_width    =  247;
        $big_photo_height   =  369;
        $middle_photo_width =  96;
        $middle_photo_height =  138;

        if(file_exists($uploadDir . '/photo/original/' . $value)) {


            $uploadDir = sfConfig::get ( 'sf_upload_dir' );
            $img_small = new sfImage( $uploadDir . '/photo/original/' . $value,null);
            $img_middle = new sfImage( $uploadDir . '/photo/original/' . $value,null);
            $img_big = new sfImage( $uploadDir . '/photo/original/' . $value,null);
            $img_orig = new sfImage( $uploadDir . '/photo/original/' . $value,null);
           // $img->thumbnail(sfConfig::get('app_photo_width'),sfConfig::get('app_photo_height'),'top');
            $img_small->thumbnail($small_photo_width,$small_photo_height,'top');
            $img_small->saveAs($uploadDir . '/photo/small_thumbnail/' . $value);

            $img_middle->thumbnail($middle_photo_width,$middle_photo_height,'top');
            $img_middle->saveAs($uploadDir . '/photo/middle_thumbnail/' . $value);

           // $bg = new sfImage( sfConfig::get ( 'sf_web_dir' ).'/images/bth.jpg', null);
            $img_big->thumbnail($big_photo_width,$big_photo_height,'top');
            //$bg->overlay($img_big, array(100,100));
            //$img_big->resize($big_photo_width,null);
            //$img_big->fill(0,0,'#000000');
            $img_big->saveAs($uploadDir . '/photo/big_thumbnail/' . $value);

           // $thumbnail = new sfThumbnail(333, 488);
           // $thumbnail = new sfThumbnail(333, 488, true, true, 75);
          //  $thumbnail->loadFile( $uploadDir . '/photo/original/' . $value);
           // $thumbnail->save($uploadDir . '/photo/big_thumbnail/' . $value, 'image/jpeg');

            $water = new sfImage(sfConfig::get ( 'sf_web_dir' ).'/images/tag.png');

            $arsize = getimagesize($uploadDir . '/photo/original/' . $value);
            $w = $arsize[0];

            if($w<313)
            {


                $water->resize($w-10,null);
                $water->saveAs($uploadDir . '/photo/original/111.png');

            }

            $img_orig->overlay($water, 'bottom-center');
            $img_orig->saveAs($uploadDir . '/photo/original/' . $value);

        } else {
           echo 'file does not exist';
        }


    }







        


}
