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

/**
 * -----------------------------------------------------------------------------
 *  Global database settings
 * -----------------------------------------------------------------------------
 *
 *  Set database configurations here to override environment specific
 *  configurations
 *
 */

return [
//    // MySQL ドライバの設定
//    //    'development' => array(
//    'default' => [
//        'type'         => 'mysqli',
//        'connection'   => [
//            'hostname'   => 'mysql',
//            'port'       => '3306',
//            'database'   => 'myfuel',//'fuel_db',
//            'username'   => 'admin',//'your_username',
//            'password'   => 'admin',//'y0uR_p@ssW0rd',
////            'persistent' => false,
////            'compress'   => false,
//        ],
////        'identifier'   => '`',
////        'table_prefix' => '',
////        'charset'      => 'utf8mb4',
////        'enable_cache' => true,
////        'profiling'    => false,
//    ],

//	// PDO ドライバで PostgreSQL を使う設定
//	'production' => array(
//		'type'           => 'pdo',
//		'connection'     => array(
//			'dsn'            => 'pgsql:host=localhost;dbname=fuel_db',
//			'username'       => 'your_username',
//			'password'       => 'y0uR_p@ssW0rd',
//			'persistent'     => false,
//			'compress'       => false,
//		),
//		'identifier'   => '"',
//		'table_prefix'   => '',
//		'charset'        => 'utf8',
//		'enable_cache'   => true,
//		'profiling'      => false,
//	),

    // PDO ドライバで MySQL を使う設定
    'default' => [
        'type'         => 'pdo',
        'connection'   => [
            'dsn'        => 'mysql:host=mysql;dbname=myfuel',
            'username'   => 'admin',
            'password'   => 'admin',
            'persistent' => false,
            'compress'   => false,
        ],
        'identifier'   => '"',
        'table_prefix' => '',
        'charset'      => 'utf8mb4',
        'enable_cache' => true,
        'profiling'    => false,
    ],
];

