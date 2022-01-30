<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return [
    // Default route URI が指定されなかったときのデフォルトルート。
    '_root_'         => 'welcome/index',

    // Page not found アプリケーションが投げた HttpNotFoundException がキャッチされなかったときに使われるルート。
    '_404_'          => 'welcome/404',

    // Example for Presenter
    // A route for showing page using Presenter
//    'hello(/:name)?' => ['welcome/hello', 'name' => 'hello'],

    'posts'        => 'posts/index',
    'posts/create' => 'posts/create',
    'posts/read'   => 'posts/read',
    'posts/update' => 'posts/update',
    'posts/delete' => 'posts/delete',

    'api/posts'        => 'api/posts/index',
    'api/posts/create' => 'api/posts/create',
    'api/posts/read'   => 'api/posts/read',
    'api/posts/update' => 'api/posts/update',
    'api/posts/delete' => 'api/posts/delete',

    // Page
    'articles'               => 'articles/index',
    'articles/(:num)'        => 'articles/view/$1',
    'articles/add'           => 'articles/add',
    'articles/edit/(:num)'   => 'articles/edit/$1',
    'articles/delete/(:num)' => 'articles/delete/$1',

    // API
    'api/articles'               => 'api/articles/index',
    'api/articles/(:num)'        => 'api/articles/view/$1',
    'api/articles/create'        => 'api/articles/create',
    'api/articles/edit/(:num)'   => 'api/articles/edit/$1',
    'api/articles/delete/(:num)' => 'api/articles/delete/$1',


];
