<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path('database.sqlite'),
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'hris'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', ''),
            //'charset'   => 'utf8',
            //'collation' => 'utf8_unicode_ci',
            
            'charset' => 'utf8',  
            'collation' => 'utf8_unicode_ci',
            //'port'      => '83306',
            'prefix'    => '',
            'strict'    => false,
            

            //'options'   => array(
            //    PDO::ATTR_PERSISTENT => true,
            //),

            
        ],

        'mysqlCrm' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST_CRM', 'localhost'),
        //    'database'  => env('DB_DATABASE_CRM', 'crm'),
            'database'  => env('DB_DATABASE_CRM', 'empore_platform'),
            'username'  => env('DB_USERNAME_CRM', 'root'),
            'password'  => env('DB_PASSWORD_CRM', ''),
            //'charset'   => 'utf8',
            //'collation' => 'utf8_unicode_ci',
            
            'charset' => 'utf8',  
            'collation' => 'utf8_unicode_ci',
            //'port'      => '83306',
            'prefix'    => '',
            'strict'    => false,
            
            //'options'   => array(
            //    PDO::ATTR_PERSISTENT => true,
            //),
            
        ],

        'mysqlMhr' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST_MHR', 'localhost'),
            'database'  => env('DB_DATABASE_MHR', 'hris'),
            'username'  => env('DB_USERNAME_MHR', 'root'),
            'password'  => env('DB_PASSWORD_MHR', ''),
            //'charset'   => 'utf8',
            //'collation' => 'utf8_unicode_ci',
            
            'charset' => 'utf8',  
            'collation' => 'utf8_unicode_ci',
            //'port'      => '83306',
            'prefix'    => '',
            'strict'    => false,
            
            //'options'   => array(
            //    PDO::ATTR_PERSISTENT => true,
            //),
            
        ],

        'mysqlDemoEmp' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST_DEMOEMP', 'localhost'),
            'database'  => env('DB_DATABASE_DEMOEMP', 'hris'),
            'username'  => env('DB_USERNAME_DEMOEMP', 'root'),
            'password'  => env('DB_PASSWORD_DEMOEMP', ''),
            'charset' => 'utf8',  
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

        'oracle' => [
            'driver'   => 'oracle',
            'host'     => env('DB_HOST', '192.168.204.2'),
            'port'     => env('DB_PORT', '1521'),
            'database' => env('DB_DATABASE', 'xe'),
            'username' => env('DB_USERNAME', 'capital'),
            'password' => env('DB_PASSWORD', 'capital'),
            'charset'  => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'   => env('DB_PREFIX', ''),
        ],
        'mongodb'     => [
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST_MONGO', 'localhost'),
            'port'     => env('DB_PORT_MONGO', '27017'),
            'username' => env('DB_USERNAME_MONGO', ''),
            'password' => env('DB_PASSWORD_MONGO', ''),
            'database' => env('DB_DATABASE_MONGO', 'admin')
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => env('REDIS_HOST', '192.168.204.28'),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DATABASE', 1),
        ],

    ],

];