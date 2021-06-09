<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- <form name="form_add" method="post" action="?p=add">
<input type="text" name="name" id="name" placeholder="Имя">
<textarea name="comment" placeholder="Краткий комментарий"></textarea>
<input type="submit" name="button" value="Добавить запись">
</form>
<?php
// если были переданы данные для добавления в БД
// if( isset($_POST['button']) && $_POST['button']== 'Добавить запись')
// {
//     $mysqli = mysqli_connect('localhost', 'moosbeere', '12345678', 'friends');
//     if( mysqli_connect_errno() ) // проверяем корректность подключения
//     echo 'Ошибка подключения к БД: '.mysqli_connect_error();
//     // формируем и выполняем SQL-запрос для добавления записи
//     $sql_res=mysqli_query($mysqli, 'INSERT INTO friends (name) VALUES ("vova")');
//     // если при выполнении запроса произошла ошибка – выводим сообщение
//     if( mysqli_errno($mysqli) )
//         echo '<div class="error">Запись не добавлена</div>';
//     else // если все прошло нормально – выводим сообщение
//         echo '<div class="ok">Запись добавлена</div>';
// }
?> -->

<div id="add">
<form name="form_add" method="POST" action="#">
    <input type="text" name="lastName" id="name" placeholder="Фамилия">
    <input type="text" name="firstName" id="name" placeholder="Имя">
    <input type="text" name="midleName" id="name" placeholder="Отчество">
    <select name="gender" id="name" class="sel"> 
    <option value="мужской" selected>мужской</option>
    <option value="женский">женский</option>
    </select>
    <input type="date" name="dataB" id="name" placeholder="Дата рождения">
    <input type="text" name="phone" id="name" placeholder="Номер +7xxxxxxxxxx">
    <input type="text" name="adres" id="name" placeholder="Адрес">
    <input type="text" name="email" id="name" placeholder="Email">
    <textarea name="comment" placeholder="Краткий комментарий"></textarea>
    <input type="submit" name="button" value="Добавить запись">
</form>

<?php
    $host = 'localhost'; // адрес сервера 
    $database = 'lab9'; // имя базы данных
    $user = 'root'; // имя пользователя
    $password = ''; 
    // осуществляем подключение к базе данных
    $mysqli = mysqli_connect($host, $user, $password, $database);
    $mysqli->set_charset("utf8mb4");
    mysqli_select_db($mysqli,$database);

    if( mysqli_connect_errno() ) 
    {
        echo 'Ошибка подключения к БД: '.mysqli_connect_error();
        exit();
    }
    // Название кодировки подключения к БД
    // printf("Изначальная кодировка: %s\n", $mysqli->character_set_name());
    if( isset($_POST['button']) && $_POST['button'] == 'Добавить запись')
    {
        if ($_POST['lastName']!='' && $_POST['firstName']!='' && $_POST['midleName']!='' && $_POST['gender']!='' && $_POST['dataB']!='' && $_POST['phone']!='' && $_POST['adres']!='' && $_POST['email']!=''){               
            $textSQL= "INSERT INTO info (lastName, firstName, madleName, gender, dataBirth, phone, adrex, email, comment)
            VALUES ('".$_POST['lastName']."','".$_POST['firstName']."','".$_POST['midleName']."','".$_POST['gender']."','".$_POST['dataB']."','".$_POST['phone']."','".$_POST['adres']."','".$_POST['email']."','".$_POST['comment']."')";
            // Тестовый запрос
            // if (true){
            //     $textSQL= "INSERT INTO info (lastName)
            //     VALUES ('Тестовое Имя')";
            
            If(mysqli_query($mysqli,$textSQL))
                echo "<div>Данные записаны</div>";
            else 
                echo "Error:".mysqli_error($mysqli); 
        } else {
            echo "<div>Данные не записаны. Не все поля заполнены </div>";
        }
    }
?>
</div>


</body>
</html>