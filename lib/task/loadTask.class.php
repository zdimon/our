<?php

class loadTask extends sfBaseTask
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
    $this->name             = 'load';
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


      $this->logSection('imagetransform', 'Reimage...');

   
         $t = new TypeKeywords();
   $t->setTitle('Слова, которые соответствуют Вам','ru');
   $t->setTitle('Describe yourself by Keywords','en');
   $t->save();
   
   
   
   $t = new TypeKeywords();
   $t->setTitle('Слова, которые соответствуют вашему партнеру','ru');
   $t->setTitle('Partner qualities in Keywords','en');
   $t->save();
   
   
   $t = new TypeKeywords();
   $t->setTitle('Ваши интересы','ru');
   $t->setTitle('Interest keywords','en');
   $t->save();
   
  
   
   $k = new Keyword();
   $k->setTitle('Faithful','en');
   $k->setTitle('Верный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   
   $k = new Keyword();
   $k->setTitle('Cheeful','en');
   $k->setTitle('Счастливый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Clever','en');
   $k->setTitle('Умный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Jealous','en');
   $k->setTitle('Завистливый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Sencitive','en');
   $k->setTitle('Чувственный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Friendly','en');
   $k->setTitle('Общительный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Active','en');
   $k->setTitle('Активный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Exlusive','en');
   $k->setTitle('Особенный','ru');
   $k->setTypeKeywordsId(1);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Open mind','en');
   $k->setTitle('Открытый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();    
   
   $k = new Keyword();
   $k->setTitle('Well-balanced','en');
   $k->setTitle('Уравновешенный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Charming','en');
   $k->setTitle('Очаровательный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Amazing','en');
   $k->setTitle('Чудной','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Sence of humor','en');
   $k->setTitle('С чувством юмора','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Understanding','en');
   $k->setTitle('Понимающий','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Tender','en');
   $k->setTitle('Ласковый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Hard working','en');
   $k->setTitle('Трудоголик','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Romantic','en');
   $k->setTitle('Романтический','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Cultured','en');
   $k->setTitle('Культурный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Passionate','en');
   $k->setTitle('Поразительный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();  
   
   
   $k = new Keyword();
   $k->setTitle('Coaxing','en');
   $k->setTitle('Нежный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   $k = new Keyword();
   $k->setTitle('Loyal','en');
   $k->setTitle('Лояльный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Honest','en');
   $k->setTitle('Честный','ru');
   $k->setTypeKeywordsId(1);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Generous','en');
   $k->setTitle('Щедрый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Independent','en');
   $k->setTitle('Независимый','ru');
   $k->setTypeKeywordsId(1);
   $k->save();     
   
   
   
   
   
   
   
   
   $k = new Keyword();
   $k->setTitle('Careful','en');
   $k->setTitle('Осторожный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Honest','en');
   $k->setTitle('Честный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Serious','en');
   $k->setTitle('Серьезный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Quiet','en');
   $k->setTitle('Спокойный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Concerned','en');
   $k->setTitle('Обеспокоенный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Romantic','en');
   $k->setTitle('Романтический','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Kind','en');
   $k->setTitle('Добрый','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Strong','en');
   $k->setTitle('Сильный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Optimistic','en');
   $k->setTitle('Оптимистичный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Cheerful','en');
   $k->setTitle('Счастливый','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Generous','en');
   $k->setTitle('Щедрый','ru');
   $k->setTypeKeywordsId(2);
   $k->save();  
   
   $k = new Keyword();
   $k->setTitle('Surprenant','en');
   $k->setTitle('Чудной','ru');
   $k->setTypeKeywordsId(2);
   $k->save();     
   
   
   $k = new Keyword();
   $k->setTitle('Confident','en');
   $k->setTitle('Уверенный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Relable','en');
   $k->setTitle('Надежный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Virile','en');
   $k->setTitle('Мужественный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Clever','en');
   $k->setTitle('Умный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Faithful','en');
   $k->setTitle('Верный','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Understanding','en');
   $k->setTitle('Понимающий','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Independent','en');
   $k->setTitle('Независимый','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Jealous','en');
   $k->setTitle('Зависливый','ru');
   $k->setTypeKeywordsId(2);
   $k->save();   
   
  
   
   
   
   
   
   
   
   $k = new Keyword();
   $k->setTitle('Music','en');
   $k->setTitle('Музыка','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Computers','en');
   $k->setTitle('Компьютеры','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Trevels','en');
   $k->setTitle('Путешествия','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Cook','en');
   $k->setTitle('Готовить','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Theater','en');
   $k->setTitle('Театр','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Photos','en');
   $k->setTitle('Фото','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Tinker','en');
   $k->setTitle('Спорт','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Pets','en');
   $k->setTitle('Животные','ru');
   $k->setTypeKeywordsId(3);
   $k->save();   
   
   $k = new Keyword();
   $k->setTitle('Art','en');
   $k->setTitle('Искусство','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Culture','en');
   $k->setTitle('Культура','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Gardening','en');
   $k->setTitle('Садоводство','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Literature','en');
   $k->setTitle('Литература','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Communication','en');
   $k->setTitle('Общение','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Dancing','en');
   $k->setTitle('Танцы','ru');
   $k->setTypeKeywordsId(3);
   $k->save();
   
   $k = new Keyword();
   $k->setTitle('Cinema','en');
   $k->setTitle('Кино','ru');
   $k->setTypeKeywordsId(3);
   $k->save();   
      
   
   
   $k = new Keyword();
   $k->setTitle('Meditation','en');
   $k->setTitle('Медитация','ru');
   $k->setTypeKeywordsId(3);
   $k->save();     
   
   
   $k = new Keyword();
   $k->setTitle('Internet','en');
   $k->setTitle('Интернет','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Night clubs','en');
   $k->setTitle('Ночные клубы','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Restaurants','en');
   $k->setTitle('Рестораны','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Decoration','en');
   $k->setTitle('Украшения','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Museum','en');
   $k->setTitle('Музеи','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Television','en');
   $k->setTitle('Телевидение','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Shopping','en');
   $k->setTitle('Покупки','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Astrology','en');
   $k->setTitle('Астрология','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Politic','en');
   $k->setTitle('Политика','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Scince','en');
   $k->setTitle('Наука','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Outdoors','en');
   $k->setTitle('Прогулки','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Religion','en');
   $k->setTitle('Религия','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Singing','en');
   $k->setTitle('Пение','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Mountaineering','en');
   $k->setTitle('Альпинизм','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Cycling','en');
   $k->setTitle('Езда на велосипеде','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Hiking','en');
   $k->setTitle('Пеший туризм','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Swimming','en');
   $k->setTitle('Плавание','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Riding','en');
   $k->setTitle('Чтение','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
   
   $k = new Keyword();
   $k->setTitle('Sailing','en');
   $k->setTitle('Парусный спорт','ru');
   $k->setTypeKeywordsId(3);
   $k->save();    
   
   
   $k = new Keyword();
   $k->setTitle('Fitness','en');
   $k->setTitle('Фитнес','ru');
   $k->setTypeKeywordsId(3);
   $k->save();    
   
   
   $k = new Keyword();
   $k->setTitle('Sking','en');
   $k->setTitle('катание на лыжах','ru');
   $k->setTypeKeywordsId(3);
   $k->save();    
   
   
   $k = new Keyword();
   $k->setTitle('Martial arts','en');
   $k->setTitle('Боевые искусства','ru');
   $k->setTypeKeywordsId(3);
   $k->save();    
   
   
   $k = new Keyword();
   $k->setTitle('Nature','en');
   $k->setTitle('Природа','ru');
   $k->setTypeKeywordsId(3);
   $k->save();    
   
   
   $k = new Keyword();
   $k->setTitle('Different sports','en');
   $k->setTitle('Разный спорт','ru');
   $k->setTypeKeywordsId(3);
   $k->save(); 
      

      $this->logSection('imagetransform', 'done ...');

    
    echo 'done';
   

   
  }
  
	
  
}
