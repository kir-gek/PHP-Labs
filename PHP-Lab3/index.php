<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_2.css">
    <title>Виртуальная клавиатура Пульфт</title>
</head>
<body>
    <header>
        <img src="./Mospolytech_logo.jpg" alt="Mospolytech">
    </header>

    <?php // начало PHP-программы
    if( !isset($_GET['count']) ) // если НЕ передано предыдущее значение
    $_GET['count'] = 0; 
if( !isset($_GET['store']) ) // если НЕ передано предыдущее значение
$_GET['store'] = ''; // создаем пустое хранилище
else // иначе
if( isset($_GET['key']) ){ // если кнопка была нажата
    $_GET['store'].= $_GET['key']; // сохранить цифру в хранилище
    $_GET['count']=$_GET['count']+1;
}
// выводим содержимое хранилища
// echo '<div class="result">'.$_GET['store'].'</div>';
?> 
    <main>
        <div class = "calculator">
           <div class = "result"><?php echo $_GET['store'];?></div> 
            
		<div class = "keyboard">
        <a href="?key=1&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">1</a>
        <a href="?key=2&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">2</a>
        <a href="?key=3&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">3</a>
        <a href="?key=4&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">4</a>
        <a href="?key=5&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">5</a>
        <a href="?key=6&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">6</a>
        <a href="?key=7&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">7</a>
        <a href="?key=8&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">8</a>
        <a href="?key=9&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">9</a>
        <a href="?key=0&store=<?php echo $_GET['store'].'&count='.$_GET['count']; ?>">0</a>
           
        <a class = "reset" href = <?php $_GET['count']=$_GET['count']+1;
             echo '?count='.$_GET['count']; ?>>СБРОС</a>
        </div>
        </div>
	
    </main>
    <footer>
    <p><?php echo 'общее количество нажатий кнопок='.$_GET['count'];?></P>
    </footer>
</body>
</html>