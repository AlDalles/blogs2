<?php
require_once 'dotenv.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

/*$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'newsagregator',
    'username'  => 'root',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);*/


$capsule->addConnection([
    'driver' => getenv('DATABASE_DRIVER'),
    'host' => getenv('DATABASE_HOST'),
    'database' => getenv('DATABASE_DB'),
    'username' => getenv('DATABASE_USERNAME'),
    'password' => getenv('DATABASE_PASSWORD'),
    'charset' => getenv('DATABASE_CHARSET'),
    'collation' => getenv('DATABASE_COLLATION'),
    'prefix' => getenv('DATABASE_PREFIX'),
]);
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

\Illuminate\Pagination\Paginator::currentPageResolver(fn() => $_GET['page'] ?? 1);


