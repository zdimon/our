<?php

/**
 * MyCountry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MyCountry extends BaseMyCountry
{
    
        public function setPub($v) {
        if($v==true and $this->getPub()==false)
        {
            $d = 'ID:'.$this->getId();
            ActionsTable::add(5,$d);
        }
        $this->_set('pub', $v);
    }
    
}