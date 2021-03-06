<?php

/**
 * HotlistTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class HotlistTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object HotlistTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Hotlist');
    }
    
    public static function getCntActive($user)
    {
         $cnt = Doctrine::getTable('Hotlist')
        ->createQuery('a')
        ->where('a.from_id=? and a.is_active=?',array($user->getId(), true))
        ->count();
        return $cnt;
    }

    public static  function getCurrentAmmountAbonents($user)
    {

        $p = Doctrine::getTable('Hotlist')

            ->createQuery('a')

            ->where('a.from_id=?',array($user->getId()))

            ->count();

        return $p;
    }

}