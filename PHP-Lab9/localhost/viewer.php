<?php
    
    // function getFriendsList($type, $page)
    // {
    //     $mysqli = mysqli_connect('host', 'user', 'password', 'database');

    //     if( mysqli_connect_errno() ) // проверяем корректность подключения
    //     return 'Ошибка подключения к БД: '.mysqli_connect_error();
    //     // формируем и выполняем SQL-запрос для определения числа записей
    //     $sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM friends');
    //     // проверяем корректность выполнения запроса и определяем его результат
    //     if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
    //     {   
    //         if( !$TOTAL=$row[0] ) // если в таблице нет записей
    //             return 'В таблице нет данных'; // возвращаем сообщение
    //         $PAGES = ceil($TOTAL/10); // вычисляем общее количество страниц
    //         if( $page>=$TOTAL ) // если указана страница больше максимальной
    //             $page=$TOTAL-1; // будем выводить последнюю страницу
    //     // формируем и выполняем SQL-запрос для выборки записей из БД
    //         $sql='SELECT * FROM friends LIMIT '.$page.', 10'; 
    //         $sql_res=mysqli_query($mysqli, $sql);
    //         $ret='<table>'; // строка с будущим контентом страницы
    //         while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
    //         {
    //             // выводим каждую запись как строку таблицы
    //             $ret.='<tr><td>'.$row['name'].'</td>
    //             <td>'.$row['email'].'</td>
    //             <td>'.$row['phone'].'</td></tr>';
    //         }
    //         $ret.='</table>'; // заканчиваем формирование таблицы с контентом
    //         if( $PAGES>1 ) // если страниц больше одной – добавляем пагинацию
    //         {
    //             $ret.='<div id="pages">'; // блок пагинации
    //             for($i=0; $i<$TOTAL; $i++) // цикл для всех страниц пагинации
    //             if( $i != $page ) // если не текущая страница
    //             $ret.='<a href="?p=viewer&pg='.$i.'">'.($i+1).'</a>';
    //             else // если текущая страница
    //             $ret.='<span>'.($i+1).'</span>';
    //             $ret.='</div>';
    //         }
    //      return $ret; // возвращаем сформированный контент
    //     }
    // // если запрос выполнен некорректно
    // else return 'Неизвестная ошибка'; // возвращаем сообщение
    // }
?>
<div id="viever">
<?php
    function getFriendsList($type, $page)
    {
        $host = 'localhost'; // адрес сервера 
        $database = 'lab9'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = ''; 
        $mysqli = mysqli_connect($host, $user, $password, $database);
        $mysqli->set_charset("utf8mb4");
        mysqli_select_db($mysqli,$database);
        if( mysqli_connect_errno() )
            return 'Ошибка подключения к БД: '.mysqli_connect_error();
        if (!isset($_GET['sort']) || $_GET['sort']=='byid')
            $sql_res=mysqli_query($mysqli, 'SELECT * FROM info');
         
            
        else 
        $sql_res=mysqli_query($mysqli, 'SELECT * FROM info ORDER BY lastName');
        $alldata=array();
        while($row = mysqli_fetch_array($sql_res)){
            $alldata[] = $row;
        }
        $total = count($alldata);
        if ($total == 0 ){
            echo "В таблице нет данных <br>";
            exit;
        }
        $allpage = ceil($total / 10);
        if (!isset($_GET['page']) || ($_GET['page']==1)){
            $start=0;
            if ($total-1<10)
                $end=$total-1;
            else
                $end=9;
        } else {
            $start=($_GET['page']-1)*10;
            if ($start+9<$total-1)
                $end=$start+9;
            else
                $end=$total-1;
        }
        echo '<table>
        <tbody>
            <tr>
            <td>id</td>
            <td>Фамилия</td>
            <td>Имя</td>
            <td>Отчество</td>
            <td>Пол</td>
            <td>Дата рождения</td>
            <td>Номер</td>
            <td>Адрес</td>
            <td>Е-маил</td>
            <td>комментарии</td></tr>';
            
               for($i=$start; $i<=$end; $i++){
                    $nomer = $alldata[$i]['ID'];
                    echo "<tr><td>".$nomer."</td>" ;
                    for($j=0; $j<9; $j++){
                        echo '<td>'.$alldata[$i][$j].'</td>';        
                   }
                   echo "</tr>";
               } 
            
        echo '</tbody></table></div>'   ; 
        if ($total > 10)

        include 'pages.php';
    };

?>

