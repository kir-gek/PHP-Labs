<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet"> 
    <title>
        <?php
        $title='Lab2 Пульфт 201-322-5';
        echo $title;
        ?>
    </title>
    
</head>
<body>
    <header>
       <img src="./logo.jpg" alt="">
    </header>
    <section class="introduce">
        <div class="wrapper">
        <?php
        $firstvalue=-10;
        $maxvalue=25;
        $step=1;
        $type="D";
        $maxvalueY=3000;
        $minY=3000;
        $maxY=-1000;
        $sum=0;
        $j=0;
        $i=0;
        
        for ($x=$firstvalue; $x<$maxvalue;){
            
            if ($x<=10)
                $y=3*$x+9;
            elseif ($x>10 && $x<20){
                $y=($x+3)/($x*$x-120);
            }
            else $y=$x*$x*4-11;
            $y=round($y,3);
            if ($y>$maxvalueY)
            continue;
            if($y<$minY) $minY=$y;
            if ($y>$maxY) $maxY=$y;
            $sum=$sum+$y;
            $j=$j+1;
            switch ($type) {
                case "A":
                    echo '<p>f(',$x,')=',$y,'</p><br>';
                    break;

                case "B":
                    if($x==$firstvalue)
                        echo '<ul>';
                    echo '<li>f(',$x,')=',$y,'</li>';
                    if(($maxvalue-$x)<$step)
                        echo '</ul>';

                    break;

                case "C":
                    if($x==$firstvalue)
                        echo '<ol>';
                    echo '<li>f(',$x,')=',$y,'</li>';
                    if(($maxvalue-$x)<$step)
                        echo '</ol>';

                    break;

                case "D":
                    if($x==$firstvalue)
                        echo '<div><table>';
                    $i=$i+1;    
                    echo '<tr>
                            <td >',$i,'</td>
                            <td>',$x,'</td>
                            <td>',$y,'</td>
                        </tr>';
                    if(($maxvalue-$x)<$step)
                        echo '</table></div>';

                    break;   
                    
                case "E":
                    if($x==$firstvalue)
                        echo '<div class="menurow">';
                    echo '<div class="card_row">f(',$x,')=',$y,'</div>';
                    if(($maxvalue-$x)<$step)
                        echo ' </div>';
                    

                    break;
                    
            }
            
            $x=$x+$step;
        
            
        }
        echo '<div><p>min=',$minY,'</p>';
        echo '<p>max=',$maxY,'</p>';
        echo '<p>sum=',$sum,'</p>';
        echo '<p>average=',$sum/$j,'</p></div>';
        ?>

            
        </div>
    </section>
 
    
    <footer>
        <?php
        
        echo '<p>Тип верстки: ',$type,'</p>';
        ?>
    </footer>
</body>
</html>