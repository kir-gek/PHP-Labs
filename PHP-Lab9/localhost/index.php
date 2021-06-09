<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Сортировка массивов</title>
</head>

<body>
    <header>
        <a href="../index.html"><img class="header__logo-img"  src="./img/logo.jpg" alt="Mospolytech"></a>	
	    <p class="header__logo">№8 | Гекман Кирилл</p>
    </header>
    <main>
    <?php
    require 'menu.php';
    if( $_GET['p'] == 'viewer' ) // если выбран пункт меню "Просмотр"
    {
    include 'viewer.php'; // подключаем модуль с библиотекой функций
    // если в параметрах не указана текущая страница – выводим самую первую
    if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0;
    // если в параметрах не указан тип сортировки или он недопустим
    if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&
    $_GET['sort']!='born'))
    $_GET['sort']='byid'; // устанавливаем сортировку по умолчанию
    // формируем контент страницы с помощью функции и выводим его
    echo getFriendsList($_GET['sort'], $_GET['pg']);
    }
    // подключаем другие модули с контентом страницы
    elseif ( isset($_GET['p']) ) { include $_GET['p'].'.php'; }


    ?>
    </main>
    <footer>
        <a style="color:white;" href="https://github.com/kir-gek/PHP-Labs/tree/main/PHP-Lab9">
        github.com/kir-gek/PHP-Labs/tree/main/PHP-Lab9</a>
    </footer>
</body>
</html>
