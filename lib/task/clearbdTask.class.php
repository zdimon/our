<?php

class clearbdTask extends sfBaseTask
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
    $this->name             = 'clearbd';
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


      $this->logSection('clearing', 'Dropping tables...');



      $sqls2 = array(
          "drop table IF EXISTS catalogue cascade ",
          "drop table IF EXISTS jo_faq cascade",
          "drop table IF EXISTS jo_faq_translation cascade",
          "drop table IF EXISTS jo_friend cascade",
          "drop table IF EXISTS jo_message cascade",
          "drop table IF EXISTS jo_news cascade",
          "drop table IF EXISTS jo_news_translation cascade",
          "drop table IF EXISTS jo_notify cascade",
          "drop table IF EXISTS jo_notify_translation cascade",
          "drop table IF EXISTS jo_page cascade",
          "drop table IF EXISTS jo_page_translation cascade",
          "drop table IF EXISTS jo_photo cascade",
          "drop table IF EXISTS jo_profile cascade",
          "drop table IF EXISTS jo_profile_type cascade",
          "drop table IF EXISTS jo_profile_type_translation cascade",
          "drop table IF EXISTS jo_service cascade",
          "drop table IF EXISTS jo_service_translation cascade",
          "drop table IF EXISTS jo_settings cascade",
          "drop table IF EXISTS jo_status_friend cascade",
          "drop table IF EXISTS jo_testimonials cascade",
          "drop table IF EXISTS jo_video cascade",
          "drop table IF EXISTS sf_guard_forgot_password cascade",
          "drop table IF EXISTS sf_guard_group cascade",
          "drop table IF EXISTS sf_guard_group_permission cascade",
          "drop table IF EXISTS sf_guard_permission cascade",
          "drop table IF EXISTS sf_guard_remember_key cascade",
          "drop table IF EXISTS sf_guard_user cascade",
          "drop table IF EXISTS sf_guard_user_group cascade",
          "drop table IF EXISTS sf_guard_user_permission cascade",
          "drop table IF EXISTS trans_unit cascade",
          "drop table IF EXISTS jo_payment cascade",
          "drop table IF EXISTS jo_hotlist cascade",
          "drop table IF EXISTS jo_blacklist cascade",
          "drop table IF EXISTS jo_billing_type cascade",
          "drop table IF EXISTS jo_billing cascade",
          "drop table IF EXISTS jo_interest cascade",
          "drop table IF EXISTS jo_chat2_chanels cascade",
          "drop table IF EXISTS jo_chat2_message cascade",
          "drop table IF EXISTS jo_chat2_room cascade",
          "drop table IF EXISTS jo_chat2_room_users cascade",
          "drop table IF EXISTS jo_chat2_videolog cascade",
          "drop table IF EXISTS sf_forum_category cascade",
          "drop table IF EXISTS sf_forum_category_permissions cascade",
          "drop table IF EXISTS sf_forum_message cascade",
          "drop table IF EXISTS sf_forum_profile cascade",
          "drop table IF EXISTS sf_forum_topic cascade",
      );

      // execute queries
     // $pdo->exec('START TRANSACTION');

      foreach($sqls2 as $sql)
      {
          $pdo->exec($sql);
      }
     // $pdo->exec('COMMIT');

      $this->logSection('clearing', 'done ...');

    
    echo 'done';
   

   
  }
  
	
  
}
