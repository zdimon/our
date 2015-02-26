<?php

class massemailTask extends sfBaseTask
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
    $this->name             = 'massemail';
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

      echo 'start...';
      $rez= Doctrine::getTable('Message')
          ->createQuery('a')
          ->where('a.is_email_sent=? and a.to_other=?',array(false,true))
          ->execute();
      foreach($rez as $r)
      {

          $r->setIsEmailSent(true);
          $r->save();

          $res = $r->getToUser();
          $users = ProfileTable::getAllUsers($res->getGender());
          foreach ($users as $to)
          {
              if($to->getUserId()<>$r->getToId())
              {
                  echo 'sending to'.$to->getUserId()."/n";
                  $m = new Message();
                  $m->setFromId($r->getFromId());
                  $m->setToId($to->getUserId());
                  $m->setTitle($r->getTitle());
                  $m->setContent($r->getContent());
                  $m->setImage($r->getImage());
                  $m->setIsEmailSent(true);
                  $m->save();

                  NotifyTable::sendTemplateBatch($m->getToUser(),$r->getFromUser(),3);
                  sleep(2);

              }



          }



      }
      echo 'done';
   

   
  }
  


  
  
}
