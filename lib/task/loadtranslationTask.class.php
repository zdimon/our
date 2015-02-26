<?php

class loadtranslationTask extends sfBaseTask
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
    $this->name             = 'loadtranslation';
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


      $this->logSection('loading', 'Start...');
      $this->logSection('loading', 'Catalouge...');
      $pdo->exec("copy catalogue from '/var/www/ourfeeling14/data/backup/catalogue.dat' delimiter ';' CSV;");
      //$pdo->exec("copy catalogue from 'd:/web/marride/jo/data/backup/catalogue.dat' delimiter ';' CSV;");
      $this->logSection('loading', 'Units...');
      //$pdo->exec("copy trans_unit from 'd:/web/marride/jo/data/backup/trans_unit.dat' delimiter ';' CSV;");
      $pdo->exec("copy trans_unit from '/var/www/ourfeeling14/data/backup/trans_unit.dat' delimiter ';' CSV;");
      $this->logSection('loading', 'done ...');

   

   
  }
  
	
  
}
