<div id="edit">

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
    $arraColumn=['ID','lastName', 'firstName', 'madleName', 'gender', 'dataBirth', 'phone', 'adrex', 'email', 'comment'];
    if($_POST['button'] != ""){
        $ar = explode(' ', $_POST['button']);
        $idRout = $ar[2];
        for ($i=1; $i<10;$i++){
            $id = (int) $idRout;
            $update_query = 'UPDATE `info` SET '.$arraColumn[$i].'="'.$_POST[$arraColumn[$i].''.$id].'" WHERE ID='.$id.'';
            mysqli_query($mysqli, $update_query);
        }
        echo "Данные с ID=".$id." были изменены";
        
    }
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM info');
    $alldata=array();
    while($row = mysqli_fetch_array($sql_res)){
        $alldata[] = $row;
    }
    if ($alldata[0] == 0){
        echo 'В таблице нет данных';
        exit;
    }
    $total=count($alldata);
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
    echo ' <form name="form_add" method="post" action="?p=edit&editid='.$alldata[$i]['ID'].'">
    <table>
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
        <td></td></tr>';
        
        for($i=$start; $i<=$end; $i++){
                $nomer = $alldata[$i]['ID'];
                echo "<tr><td><input readonly type='text' name='ID".$alldata[$i]['ID']."' ID='ID' value='".$alldata[$i]['ID']."' class='editinput'></td>" ;
                for($j=0; $j<9; $j++){
                    echo '<td><input type="text" name="'.$arraColumn[$j].''.$alldata[$i]['ID'].'" ID="name" value="'.$alldata[$i][$j].'" class="editinput"></td>';        
                }
                echo '<td><input type="submit" name="button" class="editbtn" value="Изменить запись '.$alldata[$i]['ID'].'"></td>';
            echo "</tr>";
        } 
        
    echo '</tbody></table></form></div>'   ; 
    if ($total > 10)
    include "pages.php";
?>

