<?php

/**
 * FriendTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FriendTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object FriendTable
     */

public static function isManVideo($man, $woman)
    {

       if($man->getGender()=='m')
       {
             $p = Doctrine::getTable('Friend')
                ->createQuery('a')
                ->where('a.request_video=? and a.accept_video=? and a.user_id=? and a.friend_id=?',array(true,true,$man->getId(),$woman->getId()))
                ->count();
             if($p>0) return true;
             return false;
       }
       else
       {
           return false;
       }


            return $p;

    }

    public static function getInstance()
    {
        return Doctrine_Core::getTable('Friend');
    }


    public static function getCnt($guard_user)
    {
        $p = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.user_id=?',array($guard_user->getId()))
            ->count();

        return $p;

    }

    public static function getCntMatches($guard_user)
    {
        $p = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.user_id=? and a.status_id=6',array($guard_user->getId()))
            ->count();

        return $p;

    }


    public static function getCntNew()
    {
           $p = Doctrine::getTable('Friend')
                ->createQuery('a')
                ->where('a.status_id=?',array(2))
                ->count();

            return $p;

    }

    public static function getCntDelivered()
    {
           $p = Doctrine::getTable('Friend')
                ->createQuery('a')
                ->where('a.status_id=?',array(4))
                ->count();

            return $p;

    }

    public static function getCntRejected()
    {
           $p = Doctrine::getTable('Friend')
                ->createQuery('a')
                ->where('a.status_id=?',array(5))
                ->count();

            return $p;

    }

    /// Новые фавориты у пользователя
     public static function getCntUnreadUser($user)
    {
       $cnt = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.is_read_user=? and a.user_id=?',array(false,$user->getId()))
            ->count();

          if($cnt>0)
         {
            return '<span class="cnt_new">('.$cnt.')</span>';
         }
         return '';

    }

        /// Новые фавориты у друга
     public static function getCntUnreadFriend($user)
    {
       $cnt = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.is_read_friend=? and a.friend_id=?',array(false,$user->getId()))
            ->count();

          if($cnt>0)
         {
            return '<span class="cnt_new">('.$cnt.')</span>';
         }
         return '';

    }

      /// Новые запросы просмотра видео
     public static function getCntNewRequest($user)
    {
       $cnt = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.user_id=? and a.request_video=? and a.read_accept=?',array($user->getId(),true,false))
            ->count();

          if($cnt>0)
         {
            return '<span class="cnt_new">('.$cnt.')</span>';
         }
         return '';

    }



}