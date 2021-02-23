<?php

use Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();

function request(){
    global $request;
    return $request;

}

$dispather = new Dispatcher();

$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispather,$container);
function router(){
    global $router;
    return $router;
    }

    $router->get('/','\Hillel\Controller\PostController@index');

    $router->get('/category/list','\Hillel\Controller\CategoryController@index');   //вывод таблицы категорий
    $router->get('/category/create','\Hillel\Controller\CategoryController@create'); // создание категории из пункта меню
    $router->post('/category/create','\Hillel\Controller\CategoryController@store'); // сохранение категории после создания

    $router->get('/category/{id}/update','\Hillel\Controller\CategoryController@edit'); // редактирование категории после выбора из таблицы
    $router->post('/category/{id}/update','\Hillel\Controller\CategoryController@update'); // сохранение отредактированной категории после выбора из таблицы


$router->get('/category/{id}/delete','\Hillel\Controller\CategoryController@destroy'); //  удаление категории из таблицы

    $router->get('/category/delete1','\Hillel\Controller\CategoryController@delete_many'); // вывод списка категорий для удаления из пункта меню
    $router->get('/category/delete_many','\Hillel\Controller\CategoryController@destroy_many'); // удаление категорий после выбора из списка ( после выбора из списка)


    $router->get('/category/update1','\Hillel\Controller\CategoryController@edit_select'); // вывод списка категорий для редактирования из пункта меню
    $router->post('/category/update','\Hillel\Controller\CategoryController@edit1'); // редактирование категории после выбора из пункта меню


$router->get('/tag/list','\Hillel\Controller\TagController@index');   //вывод таблицы категорий
$router->get('/tag/create','\Hillel\Controller\TagController@create'); // создание тега из пункта меню
$router->post('/tag/create','\Hillel\Controller\TagController@store'); // сохранение тега после создания


$router->get('/tag/{id}/delete','\Hillel\Controller\TagController@destroy'); //  удаление тега из таблицы

$router->get('/tag/delete1','\Hillel\Controller\TagController@delete_many'); // вывод списка тегов для удаления из пункта меню
$router->get('/tag/delete_many','\Hillel\Controller\TagController@destroy_many'); // удаление тегов после выбора из списка ( после выбора из списка)

$router->get('/tag/{id}/update','\Hillel\Controller\TagController@edit'); // редактирование тега после выбора из таблицы
$router->post('/tag/{id}/update','\Hillel\Controller\TagController@update'); // сохранение отредактированной тега после выбора из таблицы

$router->get('/tag/update1','\Hillel\Controller\TagController@edit_select'); // вывод списка тегов для редактирования из пункта меню
$router->post('/tag/update','\Hillel\Controller\TagController@edit1'); // редактирование тегов после выбора из пункта меню

$router->get('/post/list','\Hillel\Controller\PostController@index');   //вывод постов
$router->get('/post/{id}/list/tag','\Hillel\Controller\PostController@posts_tag');//ввывод постов по тегу
$router->get('/post/{id}/list/cat','\Hillel\Controller\PostController@posts_category'); //вывод постов по категории
//$router->get('/post/list/cat/','\Hillel\Controller\PostController@posts_category'); //вывод постов по категории
$router->get('/post/create','\Hillel\Controller\PostController@create');//создание нового поста
$router->post('/post/create','\Hillel\Controller\PostController@store');//сохранение поста после добавления
$router->get('/post/{id}/edit','\Hillel\Controller\PostController@edit');//передача поста на редактирование
$router->post('/post/{id}/edit','\Hillel\Controller\PostController@update');// редактирование поста
$router->get('/post/{id}/delete','\Hillel\Controller\PostController@destroy'); //  удаление поста из таблицы