<?php
class OrderGiftValidatedFile extends sfValidatedFile
{
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {
     //$this->path=sfConfig::get('sf_upload_dir')."/material/gallery";
    $file_name = parent::save($file, $fileMode, $create, $dirMode);

    //Обжим
    $this->generateThumbnail ( $file_name );
    /////
    
    return $file_name;
  }
  
public function generateThumbnail($value) 

	{
            $uploadDir = sfConfig::get('sf_upload_dir');
            $img = new sfImage( $uploadDir . '/giftbox/' . $value,null);
            $img->resize(120, null);
            $img->saveAs($uploadDir . '/giftbox/thumbnail/' . $value);
		
	}
 


	
	
}