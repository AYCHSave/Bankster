<?php

namespace splitbrain\TheBankster;

use splitbrain\TheBankster\Controller\ChartController;
use splitbrain\TheBankster\Controller\HomeController;
use splitbrain\TheBankster\Controller\RuleController;


/**
 * PMI Dashboard App
 */
class App
{

    /**
     * The app
     *
     * @var \Slim\App
     */
    protected $app;

    /**
     * Dependency container
     *
     * @var Container
     */
    protected $container;


    /**
     * Application constructor
     */
    public function __construct()
    {
        $c = Container::getInstance();
        $this->app = new \Slim\App($c);
        $this->container = $this->app->getContainer();
    }

    /**
     * Run application
     */
    public function run()
    {

        $this->app->get('/chart/[{top}]', ChartController::class)->setName('chart');
        $this->app->any('/rule/[{id}]', RuleController::class)->setName('rule');
        $this->app->get('/', HomeController::class)->setName('home');

        $this->app->run();
    }
}