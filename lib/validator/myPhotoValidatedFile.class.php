<?php
class myPhotoValidatedFile extends sfValidatedFile
{
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {
     //$this->path=sfConfig::get('sf_upload_dir')."/material/gallery";
    $file_name = parent::save($file, $fileMode, $create, $dirMode);

    //Обжим
    $this->generateThumbnail ( $file_name );
    $this->generateThumbnail2 ( $file_name );
    /////
    
    return $file_name;
  }
  
public function generateThumbnail($value) 

	{
            $uploadDir = sfConfig::get('sf_upload_dir');
            $img = new sfImage( $uploadDir . '/photo/' . $value,null);
            $img->thumbnail(sfConfig::get('app_photo_width'),sfConfig::get('app_photo_height'),'top');
            $img->saveAs($uploadDir . '/photo/thumbnail/' . $value);
		
	}

public function generateThumbnail2($value)

	{
            $uploadDir = sfConfig::get('sf_upload_dir');
            $img = new sfImage( $uploadDir . '/photo/' . $value,null);
            $img->thumbnail(sfConfig::get('app_photo_thumb_width'),sfConfig::get('app_photo_thumb_height'),'top');
            $img->saveAs($uploadDir . '/photo/_thumbnail/' . $value);

	}
 


	
	
}