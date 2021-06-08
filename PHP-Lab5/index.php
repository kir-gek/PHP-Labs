<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Лабораторная работа 5 Гекман322</title>
</head>
<body>
    <header>        
		<a href="../index.html"><img src="./img/Mospolytech_logo.jpg" alt="Mospolytech"></a>
        
        <div id="horizontal_menu"><?php
		
        	echo '<a href="?html_type=TABLE'; // начало ссылки ТАБЛИЧНАЯ ВЕРСТКА
        
        	if( isset($_GET['content']) ) // если параметр content был передан в скрипт
        		echo '&content='.$_GET['content']; // добавляем в ссылку второй параметр
        
        	echo '"'; // завершаем формирование адреса ссылки и закрываем кавычку
        	
        	// если в скрипт был передан параметр html_type и параметр равен TABLE
        	if( array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'TABLE' ) {
        		echo ' class="menu_item menu_active"'; // ссылка выделяется через CSS-класс
        	} else {
        		echo ' class="menu_item"'; // ссылка не выделяется через CSS-класс
        	}
        	echo '>Табличная верстка</a>'; // конец ссылки ТАБЛИЧНАЯ ВЕРСТКА
        
        	echo '<a href="?html_type=DIV'; // начало ссылки БЛОЧНАЯ ВЕРСТКА
        
            if( isset($_GET['content']) ) // если параметр content был передан в скрипт
        		echo '&content='.$_GET['content']; // добавляем в ссылку второй параметр
        
        	echo '"'; // завершаем формирование адреса ссылки и закрываем кавычку
        	
        	// если в скрипт был передан параметр html_type и параметр равен DIV
        	if( array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV' ) {
        		echo ' class="menu_active menu_item"'; // ссылка выделяется через CSS-класс
        	} else {
        		echo ' class="menu_item"'; // ссылка не выделяется через CSS-класс
        	}
        	echo '>Блочная верстка</a>'; // конец ссылки БЛОЧНАЯ ВЕРСТКА
        ?></div>
    </header>
    <main>
        <!-- левая часть страницы -->

        <div id="vertical_menu" class="div_column"><?php

            echo '<a href="'.((dirname($_SERVER['PHP_SELF']) != '/') ? dirname($_SERVER['PHP_SELF']) : '').'/"'; // начало ссылки ВСЯ ТАБЛИЦА УМНОЖНЕНИЯ
			if( !isset($_GET['content']) ) // если в скрипт НЕ был передан параметр content
			{
				echo ' class="main-menu a selected"'; // ссылка выделяется через CSS-класс
			} else {
				echo ' class="main-menu a"'; // ссылка не выделяется через CSS-класс
        	}
			echo '>Вся таблица умножения</a>'; // конец ссылки
			
			$link='?html_type=TABLE'; 
			if( array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV' ) 
				$link='?html_type=DIV';
			
            for( $i=2; $i<=9; $i++ ) // цикл со счетчиком от 2 до 9 включительно
            {
            	echo '<a href="'.$link.'&content='.$i.'"'; // начало ссылки
            
            	// если в скрипт был передан параметр content
            	// и параметр равен значению счетчика
            	if( isset($_GET['content']) && $_GET['content'] == $i ) {
					echo ' class="main-menu a selected"'; // ссылка выделяется через CSS-класс
				} else {
					echo ' class="main-menu a"'; // ссылка не выделяется через CSS-класс
        		}
        		echo '>Таблица умножения на '.$i.'</a>'; // конец ссылки
			}
        ?></div>
        <!-- основная часть страницы -->
        <div class="div_result">
            <?php 
                if ( !isset($_GET['html_type']) || $_GET['html_type'] == 'TABLE' ) 
					outTableForm(); // выводим таблицу умножения в табличной форме
				else 
					outDivForm(); // выводим таблицу умножения в блочной форме
            ?>
        </div>
        


     <?php
       function outNumAsLink( $x ) // функция ВЫВОДИТ ЧИСЛО КАК ССЫЛКУ
       {
       	if( $x<=9 ) 
				echo '<a href="?content='.$x.'">'.$x.'</a>';
			else 
				echo $x; 
        }
       // функция ВЫВОДИТ СТОЛБЕЦ ТАБЛИЦЫ УМНОЖЕНИЯ
       function outRow ( $n ) {
       	for($i=2; $i<=9; $i++) // цикл со счетчиком от 2 до 9
       	{
       		outNumAsLink($n);
       		echo 'x';
       		outNumAsLink($i);
       		echo '=';
       		outNumAsLink($i*$n);
       		echo '<br>';
       	}
        }
       //Функция для формирования таблиц 
        function outTableForm (){
        	// если параметр content не был передан в программу
        	if( !isset($_GET['content']) ) {
        		for($i=2; $i<10; $i++) // цикл со счетчиком от 2 до 9
        		{
        			echo '<table class="ttRow">'; // оформляем таблицу в табличной форме
        			echo '<tr>';
        			echo '<td>';
        			outRow( $i ); // вызывем функцию, формирующую содержание
        							// столбца умножения на $i (на 4, если $i==4)
			        echo '</td>';
	        		echo '</tr>';
        			echo '</table>';
        		}
        	} else {
        		echo '<table class="ttSingleRow">'; // оформляем таблицу в табличной форме
        		echo '<tr>';
        		echo '<td>';
        		outRow( $_GET['content'] ); // выводим выбранный в меню столбец
        		echo '</td>';
        		echo '</tr>';
        		echo '</table>';
        	}
        }
       //Функция для формирования блоков
        function outDivForm (){
        	// если параметр content не был передан в программу
        	if( !isset($_GET['content']) ) {
        		for($i=2; $i<10; $i++) // цикл со счетчиком от 2 до 9
        		{
        			echo '<div class="ttRow">'; // оформляем таблицу в блочной форме
        			outRow( $i ); // вызывем функцию, формирующую содержание
        							// столбца умножения на $i (на 4, если $i==4)
        			echo '</div>';
        		}
        	} else {
        		echo '<div class="ttSingleRow">'; // оформляем таблицу в блочной форме
        		outRow( $_GET['content'] ); // выводим выбранный в меню столбец
        		echo '</div>';
        	}
		}
    ?>   
           
    </main>
    <footer>
        <p><?php
        	if( !isset($_GET['html_type']) || $_GET['html_type'] == 'TABLE' ) 
				$s='Табличная верстка.&nbsp'; // строка с информацией
			else 
				$s='Блочная верстка.&nbsp';
            
            if( !isset($_GET['content']) ) 
				$s.='Вся таблица умножения.&nbsp';
			else 
				$s.='Столбец таблицы умножения на '.$_GET['content']. '.&nbsp';
            date_default_timezone_set("Europe/Moscow");
            echo $s.date('Дата: d.m.y Время: H:i');?>

        </p>
    </footer>
</body>
</html>