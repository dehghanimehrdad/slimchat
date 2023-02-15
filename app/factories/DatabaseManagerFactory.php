<?php
namespace App\Factories;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Psr\Container\ContainerInterface;

class DatabaseManagerFactory
{
    public $capsule;

    public function __construct(ContainerInterface $container)
    {
         // this would usually be in your dependency settings or on a safe place within 
         // your application. This is purely for explanatory reasons that is has been placed here

        $settings = $container->get(SettingsInterface::class);

        $dbSettings = $settings->get('db');
        
        $manager = new Manager;
        $manager->addConnection($dbSettings);

        $manager->getConnection()->enableQueryLog();

        $manager->setEventDispatcher(new Dispatcher(new Container()));

        $manager->setAsGlobal();
        $manager->bootEloquent();

        $this->capsule = $manager;
    }
}