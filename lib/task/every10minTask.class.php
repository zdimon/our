<?php

class every10minTask extends sfBaseTask
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
    $this->name             = 'every10min';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [ba:recount|INFO] task does things.
Call it with:

  [php symfony frontend:lesson|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
	//check that admin stop this task or not
	if(!is_file("work/.runFalse")){
		echo 'Script Disabled...';
		return;
	}
	
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
    $this->context = sfContext::createInstance($this->configuration);

    $pdo = Doctrine_Manager::connection()->getDbh();
    
	/******This is Fake Online Script By Vimal Ghorecha ******/
	$maxMFake = 40; //Maximum Fake Counter
	$minMFake = 30; //Minimum Fake Counter
	//First making offline the user made online by this script but not offline real one
	/*Doctrine_Query::create()
          ->update('sfGuardUser')
          ->set('is_online','false')->set('is_fake_online','false')->set('is_false','false')->execute();*/
	Doctrine_Query::create()
          ->update('sfGuardUser')
          ->set('is_online','false')
		  ->set('is_false','false')
          ->where('timer<? and is_false=? and is_online=? and gender=?', array(time(),true,true,"m"))
          ->execute();
	
	//Checking how many Fake is online
	$cntfake = Doctrine::getTable('sfGuardUser')
          ->createQuery('a')
		  ->where("a.is_false=true AND gender='m'")
          ->count();
	$response = "$cntfake Fake Male Online\n";
	
	if($cntfake < $minMFake){
		$maxUser = rand($minMFake,$maxMFake);
		$maxUser = $maxUser - $cntfake;
		for ($i = 1; $i <= $maxUser; $i++) {
			$userCount = Doctrine::getTable('sfGuardUser')->count();
			$user = Doctrine::getTable('sfGuardUser')
			  ->createQuery()
			  ->where('gender=?',array('m'))
			  ->limit(1)
			  ->offset(rand(0, $userCount - 1))
			  ->fetchOne();
			if($user)
			{
				$randMinute = rand(5,120);
				$randTime = time() + (60*$randMinute);
				Doctrine_Query::create()
				  ->update('sfGuardUser')
				  ->set('is_online','true')
				  ->set('is_false','true')
				  ->set('timer',$randTime)
				  ->where('id=?', $user->getId())
				  ->execute();
				$response .= 'put online...'.$user->getId()."\n;";
			}
		}
	}
	
	$maxFFake = 38; //Maximum Fake Counter
	$minFFake = 28; //Minimum Fake Counter
	//First making offline the user made online by this script but not offline real one
	
	Doctrine_Query::create()
          ->update('sfGuardUser')
          ->set('is_online','false')
		  ->set('is_false','false')
          ->where('timer<? and is_false=? and is_online=? and gender=?', array(time(),true,true,'w'))
          ->execute();
	
	//Checking how many Fake is online
	$cntfake = Doctrine::getTable('sfGuardUser')
          ->createQuery('a')
		  ->where("a.is_false=true AND gender='w'")
          ->count();
	$response .= "$cntfake Fake Female Online\n";
	
	if($cntfake < $minFFake){
		$maxUser = rand($minFFake,$maxFFake);
		$maxUser = $maxUser - $cntfake;
		for ($i = 1; $i <= $maxUser; $i++) {
			$userCount = Doctrine::getTable('sfGuardUser')->count();
			$user = Doctrine::getTable('sfGuardUser')
			  ->createQuery()
			  ->where('gender=?',array('w'))
			  ->limit(1)
			  ->offset(rand(0, $userCount - 1))
			  ->fetchOne();
			if($user)
			{
				$randMinute = rand(5,120);
				$randTime = time() + (60*$randMinute);
				Doctrine_Query::create()
				  ->update('sfGuardUser')
				  ->set('is_online','true')
				  ->set('is_false','true')
				  ->set('timer',$randTime)
				  ->where('id=?', $user->getId())
				  ->execute();
				$response .= 'put online...'.$user->getId()."\n";
			}
		}
	}
    echo $response .= 'done : ' . date('d-m-Y h:i:s');
	file_put_contents('every10minTask.log',$response);
  }
}
