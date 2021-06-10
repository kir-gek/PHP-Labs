<?php 

echo "<div class='pagelist'>";
        for($i=1;$i<=$allpage;$i++){
            if (isset($_GET['sort']))
                echo '<a href="?p=viewer&page='.$i.'&sort='.$_GET['sort'].'" class="paginbtn">'.$i.'</a>';
            else 
            echo '<a href="?p='.$_GET['p'].'&page='.$i.'" class="paginbtn">'.$i.'</a>';

        }    
        echo "</div>";

?>