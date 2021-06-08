<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sort</title>
</head>
<body>
<?php
    for ( $i=0; $i< $_POST['arrLength']; $i++){
    
        if($_POST['element'.$i]=='') 
            {
                echo 'Массив не задан, сортировка невозможна'; 
                exit();
            }  
        if(!is_numeric($_POST['element'.$i])) {
            echo 'Элемент массива "'. $_POST['element'.$i].'" – не число';
            exit();
        }   
    }
    echo 'Исходный массив<br>----------------------------<br>';
    for($i=0; $i<$_POST['arrLength']; $i++) 
    {
        echo '<div class="arr_element">'.$i.': '.
        $_POST['element'.$i].'</div>'; 
        $arr[] = $_POST['element'.$i]; 
    } 

    echo '<br>----------------------------<br>Массив проверен, сортировка возможна';

    echo '<div style="font-size: 40px">'.$_POST['opt'].'</div>';
    switch ($_POST['opt']) {
        case 'Сортировка выбором':
            sortingСhoice($arr);
            break;
        case 'Пузырьковый алгоритм':
            BubbleSort($arr);
            break;
        case 'Алгоритм Шелла':
            Shel($arr);
            break;
        case 'Алгоритм садового гнома':
            gnomeSort($arr);
            break;
        case 'Быстрая сортировка':
            quickSort($arr, 0, count($arr)-1);
            echo '<br>Количество итераций '.$n;
            break;  
        case 'Встроенная функция PHP для сортировки списков по значению':
            inPhpSort($arr);
            break;                  
        default:
            
            break;
    }
    function bubbleSort(array $arr) {
        $count = count($arr);
        $countIterations=0;
        if ($count <= 1) {
            return $arr;
        }

        $p = 1;

        for ($i = 0; $i < $count; $i++) {
            $p += 1;

            for ($j = $count - 1; $j > $i; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $tmp;
                    $countIterations+=1;
            echo '<div>Итерация №'.$countIterations;
            foreach ($arr as $key => $value) {
                echo ' '.$value.' ';
            }
            echo "</div>";
                }
            }

            
        }
        echo 'Количество итераций: ' . $countIterations;

        return $arr;
    }
    
    function gnomeSort($arr)
{
    $countIterations=0;
 $i=1; // начинаем со второго элемента массива
 $j=2;
 while( $i<count($arr) ) // пока не достигнут последний элемент - цикл
 {
 // если первый элемент массива (предыдущего нет)
// или текущий элемент больше предыдущего
 if( !$i || $arr[$i-1]<=$arr[$i] )
 {
 $i=$j; // возвращаемся к месту
 $j++; // до которого уже дошли
 }
 else // иначе
 {
 $temp = $arr[$i]; // меняем элементы местами
 $arr[$i] = $arr[$i-1];
 $arr[$i-1] = $temp;
 $i--; // шагаем назад
 $countIterations+=1;
            echo '<div>Итерация №'.$countIterations;
            foreach ($arr as $key => $value) {
                echo ' '.$value.' ';
            }
            echo "</div>";
 }
 }
 echo 'Количество итераций '.$countIterations;
} 
function quickSort(&$arr, $low, $high) {
    Global $n;
    $i = $low;
    $j = $high;
    $middle = $arr[ ( $low + $high ) / 2 ];  // middle — опорный элемент; в нашей реализации он находится посередине между low и high
    do {
        while($arr[$i] < $middle){
            ++$i;  // ищем элементы для правой части
        }
        while($arr[$j] > $middle){
            --$j;  // ищем элементы для левой части
        }
        if($i <= $j){
            // перебрасываем элементы
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            // следующая итерация
            $i++; $j--;
        }

        $n += 1;
        echo '<br>Итерация #'.$n.' '; 
        foreach ($arr as $item) {
            echo " " .$item;
        } 
    } 
    while($i < $j);

    if($low < $j){
      // рекурсивно вызываем сортировку для левой части
      quickSort($arr, $low, $j);
    } 

    if($i < $high){
      // рекурсивно вызываем сортировку для правой части
      quickSort($arr, $i, $high);
    }
}
    function inPhpSort($arr){
        sort($arr);
        echo '<div>Итерация №1';
        foreach ($arr as $key => $value) {
            echo ' '.$value.' ';
        }
        echo '</div>Количество итераций 1';
    }
    function sortingСhoice($arr){
        $countIterations=0;
        for($i=0; $i<count($arr)-1; $i++) 
        {
            
            echo '</div>';
            $min=1;
            
            for($j=$i+1; $j<count($arr); $j++) 
                if( $arr[$i]>$arr[$j] )
                    $min=$j; 
            if( $min > $i ) 
            { 
                $countIterations+=1;
                $element = $arr[$i]; 
                $arr[$i]=$arr[$min];
                $arr[$min] = $element;
                echo '<div>Итерация №'.$countIterations;
                foreach ($arr as $key => $value) {
                    echo ' '.$value.' ';
                }
                echo "</div>";
            }
        }
        
        echo 'Количество итераций '.$countIterations;
    }
    function Shel(&$a)
    {
	$sort_length = count($a) - 1;
	$step = ceil(($sort_length + 1)/2);
	// переделать на массив чисел!
    $countIterations=0;
	do
	{
	   $i = ceil($step);
	   do
	   {
	     $j=$i-$step;
	     $c=1;
	     do
	     {
	       if($a[$j]<=$a[$j+$step])
	       {
		  	$c=0;
	       }
	       else
		   {
		      $tmp=$a[$j];
		      $a[$j]=$a[$j+$step];
		      $a[$j+$step]=$tmp;
              $countIterations+=1;
              echo '<div>Итерация №'.$countIterations;
                foreach ($a as $key => $value) {
                    echo ' '.$value.' ';
                }
                echo "</div>";
		   }
		$j=$j-1;
	     }
	     while($j>=0 && ($c==1));
	      $i = $i+1;
	    }
	    while($i<=$sort_length);
	    $step = $step/2;
    }
	while($step>0);
    echo 'Количество итераций '.$countIterations;
    } 
    ?>
</body>
</html>