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
         
            
        else {
            if( $_GET['sort']=='born')
             $sql_res=mysqli_query($mysqli, 'SELECT * FROM info ORDER BY dataBirth');

            else
            $sql_res=mysqli_query($mysqli, 'SELECT * FROM info ORDER BY lastName');
        }
            $alldata=array();
        var_dump($sql_res);
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

