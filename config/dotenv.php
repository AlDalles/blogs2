<?php


$repository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\EnvConstAdapter::class)
    ->addWriter(Dotenv\Repository\Adapter\PutenvAdapter::class)
    ->immutable()
    ->make();


$dotenv = Dotenv\Dotenv::create($repository, realpath('../'));
$dotenv->load();


/*function dotenv(){

    global $dotenv;
    return $dotenv;
}*/
//dd(getenv('DATABASE_DRIVER'));