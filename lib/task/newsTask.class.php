<?php

class newsTask extends sfBaseTask
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
    $this->name             = 'news';
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
    
    $vs = Doctrine::getTable('Mailer')
    ->createQuery('a')
    ->where('a.is_sent=?',array(false))
    ->limit(5)
    ->execute();

      echo 'start...'."\n;";

    foreach($vs as $v)
    {
        $v->setIsSent(true);
        $v->save();

       // mailTools::send($v->getEmail(), $v->getTitle(), $v->getContent());
        echo "sending...".$v->getId()."\n;";
    }

    echo 'start clearing online users'."\n;";
    $t = time()-900;
    sfGuardUserTable::getInstance()->createQuery('a')->where('a.timer<?',array($t))->delete(); 
   echo 'stop clearing online users'."\n;";
     
    
     echo 'done';
   

   
  }
  


  
  
}
