<?php
declare(strict_types=1);

namespace App\Controller;

/***
 * Class BaseController
 * @package App\Controller
 */
class BaseController
{

    /**
     * @var DI\Container
     */
    protected $container;

    /**
     * Допущение: создание DI контейнера и инициализацию зависимостей мы делаем уровнем выше
     * BaseController constructor.
     */
    public function __construct(DI\Container $container)
    {
        $this->container = $container;
    }

}