<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Newsaggregator </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .info {
            padding-left: 20px;
        }
        .info1 {
            padding-top: 60px;

        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            body {
                max-width: 1550px;
                margin:auto;
                color: #fff;
                background-color: rgb(71, 163, 218);
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            }
            .container-form {
                width: 100%;
            }
            .input-titel {
                margin-bottom: 20px;
            }
            .form-textarea {
                height: 300px;
                margin-bottom: 20px;
            }
            .select-form {
                margin-bottom: 20px;
            }
            .display-form {
                display: block;
                border-radius: 5px;
                width: 100%;
            }
            .input-group {   /*добавляем флекс для инпутов в родительский контейнер*/
                display: flex;
                flex-wrap: wrap;
            }
            .input-checkbox { /*добавляем стили для инпутов*/
                margin-bottom: 20px;
                justify-content: baseline;
                width: 20%;
            }

            .submit-save { /*добавляем стили для для кнопки*/
                display: block;
                margin-bottom: 0;
                color: rgb(255, 255, 255);
                background-color: rgb(45, 101, 133);
                border: 1px solid rgb(255, 255, 255);
                width: 33%;
                height: 25px;
                border-radius: 5px;
            }

            .title {
                text-align: center;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">NewsAggregator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Категории</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="/category/list">Список категорий</a></li>
                        <li><a class="dropdown-item" href="/category/delete1">Удалить категорию</a></li>
                        <li><a class="dropdown-item" href="/category/create">Добавить категорию</a></li>
                        <li><a class="dropdown-item" href="/category/update1">Изменить категорию</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Теги</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown02">
                        <li><a class="dropdown-item" href="/tag/list">Список тегов</a></li>
                        <li><a class="dropdown-item" href="/tag/delete1">Удалить тег</a></li>
                        <li><a class="dropdown-item" href="/tag/create">Добавить тег</a></li>
                        <li><a class="dropdown-item" href="/tag/update1">Изменить тег</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Посты</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown02">
                        <li><a class="dropdown-item" href="/post/list">Список постов</a></li>
                        <li><a class="dropdown-item" href="/post/create">Добавить пост</a></li>

                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<main class="container">

    <div class="info1">
        @yield('content')</div>
        @yield('paginator')


</main><!-- /.container -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
