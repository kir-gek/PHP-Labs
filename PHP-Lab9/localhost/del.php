<div id="del">
<?php 
        $host = 'localhost'; // адрес сервера 
        $database = 'lab9'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = ''; 
        $mysqli = mysqli_connect($host, $user, $password, $database);
        $mysqli->set_charset("utf8mb4");
        mysqli_select_db($mysqli,$database);
        if( mysqli_connect_errno() )
            return 'Ошибка подключения к БД: '.mysqli_connect_error();

        if(isset($_GET['iadel'])){
            if ($_GET['iadel'] != 'all'){
                mysqli_query($mysqli, 'DELETE FROM info WHERE ID='.$_GET['iadel']);
                echo "<div>";
                echo $_GET['fam']." удален  из базы данных";
                echo "</div>";
            }
            else if ($_GET['iadel']=='all'){
                mysqli_query($mysqli, 'TRUNCATE info');
            }
        }

        $sql_res=mysqli_query($mysqli, 'SELECT * FROM info');
        $alldata=array();
        while($row = mysqli_fetch_array($sql_res)){
            $alldata[] = $row;
        }
        if ((!isset($alldata[0]))||($alldata[0] == 0)){
            echo 'В таблице нет данных';
            exit;
        }

        $total = count($alldata);  
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
            <td>комментарии</td>
            <td><a href="?p=del&page='.$_GET['page'].'&iadel=all" class="delbtn">удалить всё</a></td></tr>';
            if ($total<=10){
                foreach($alldata as $i => $i_count){
                    $nomer = $alldata[$i]['ID'];
                    $fam = $alldata[$i]['lastName'];
                    echo "<tr><td>".$nomer."</td>" ;
                        for($j=0; $j<9; $j++)
                            echo '<td>'.$i_count[$j].'</td>';
                    echo '<td><a href="?p=del&page='.$_GET['page'].'&iadel='.$nomer.'&fam='.$fam.'" class="delbtn">удалить</a></td>';
                    echo "</td>";
                }
            } else {
               for($i=$start; $i<=$end; $i++){
                    if (count($alldata)>1)
                        $nomer = $alldata[$i]['ID'];
                    else 
                        $nomer='all';
                    echo "<tr><td>".$alldata[$i]['ID']."</td>" ;
                    $fam = $alldata[$i]['lastName'];
                    for($j=0; $j<9; $j++){
                        echo '<td>'.$alldata[$i][$j].'</td>';        
                   }
                   echo '<td><a href="?p=del&page='.$_GET['page'].'&iadel='.$nomer.'&fam='.$fam.'" class="delbtn">удалить</a></td>';
                   echo "</tr>";
               } 
            }
        echo '</tbody></table></div>'; 
        if ($total > 10)
            include 'pages.php';


?>
