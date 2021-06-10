<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Сортировка массивов</title>
</head>

<body>
    <header>
        <a href="../index.html"><img class="header__logo-img"  src="./img/logo.jpg" alt="Mospolytech"></a>	
		<p class="header__logo">№8 | Гекман Кирилл</p>
    </header>

    <main>
        <form name="result" method="POST" action="home.html"> 
            <div class="main-div"><b>Исходный текст</b><textarea style="font-style: italic; text-indent:-40px;">
            <?php echo $_POST['data'];
            ?>
            </textarea></div>
            <div class="div-break"><p>Информация о тексте.</p></div>
            <div class="div-result">
            <?php

                if( isset($_POST['data']) && $_POST['data']) // если передан текст для анализа
                    {
                    echo '<div class="src_text">'.$_POST['data'].'</div>'; // выводим текст
                    test_it(iconv("utf-8", "cp1251", $_POST['data'])); // анализируем текст
                    }
                else // если текста нет или он пустой
                    echo '<div class="src_error">Нет текста для анализа</div>';

                function test_it( $text )
                    {
                        echo 'Количество символов: '.strlen($text).'<br>'; // количество символов в тексте определяется функцией размера текста
                        $cifra=array( '0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true,// определяем ассоциированный массив с цифрами
                        '5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true );
                        $Punctuation=array( '`'=>true, '~'=>true, '!'=>true, '@'=>true, '"'=>true,
                        '№'=>true, '#'=>true, '$'=>true, ';'=>true, '%'=>true, '^'=>true, ':'=>true, '?'=>true
                        , '&'=>true, '*'=>true, '('=>true, ')'=>true, '-'=>true, '_'=>true, '+'=>true, '='=>true
                        , "'"=>true, '}'=>true, '{'=>true, '['=>true, ']'=>true, '/'=>true, '"\"'=>true, '|'=>true, '.'=>true, ','=>true );     // вводим переменные для хранения информации о:
                        $cifra_amount=0; // количество цифр в тексте
                        $word=''; // текущее слово
                        $countPunctuation=0 ;
                        $words=array(); // список всех слов
                        $countSpace=0;

                        for($i=0; $i<strlen($text); $i++) // перебираем все символы текста
                            {           
    
                            if( array_key_exists($text[$i], $cifra) ) // если встретилась цифра
                                $cifra_amount++; // увеличиваем счетчик цифр
                            // если в тексте встретился пробел или текст закончился
                            if( array_key_exists($text[$i], $Punctuation) ) // если встретилась цифра
                                $countPunctuation++;
                            if( $text[$i]==' ' || array_key_exists($text[$i], $Punctuation) || $i == strlen($text)-1)
                                {
                                if ($text==' ')
                                    {
                                    $countSpace+=1;
                                    }
                                if( $word ) // если есть текущее слово
                                    {       
                            // если текущее слово сохранено в списке слов
                                    if( isset($words[$word]) )
                                        {
                                        $words[ $word ]++; // увеличиваем число его повторов
                
                                        }
                                    else
                                    $words[ $word ]=1; // первый повтор слова
                                    }
                                $word=''; // сбрасываем текущее слово
                                }
                            else // если слово продолжается
                                $word.=$text[$i]; //добавляем в текущее слово новый символ
                            }
                            // выводим количество цифр в тексте
                        echo 'Количество цифр: '.$cifra_amount.'<br>';
                            // выводим количество слов в тексте
                        iconv("cp1251", "utf-8", $text); 
                        $coutwords=1;
                        foreach($words as $item => $item_count)
                            $coutwords+=1*$item_count;
                        echo 'Количество слов: '.$coutwords.'<br>';
                        echo 'Количество знаков препинания: '.$countPunctuation.'<br>';
                        echo 'Количество использования букв<br>';
                        $redi=asArrayLeters($text, $cifra ,$Punctuation);
                        echo 'Количество знаков верхнего регистра: '.$redi[0].'<br>';
                        echo 'Количество знаков нижнего регистра: '.$redi[1].'<br>';
                        echo 'Количество пробелов: '.$redi[2].'<br>';
                        $countLetter=$redi[0]+$redi[1];
                        echo 'Количество букв: '.$countLetter,'<br>';
                        echo 'Количество использования слов<br>';
                        writeWord($text, $Punctuation,$cifra);
    

                    }

                    //&& ($text[$i]!=0) && ($text[$i]!=1) && ($text[$i]!=2) && ($text[$i]!=3) && ($text[$i]!=4) && ($text[$i]!=5) && ($text[$i]!=6) && ($text[$i]!=7) && ($text[$i]!=8) && ($text[$i]!=9)
                function writeWord($text, $Punctuation,$cifra){
                    $word = '';
                    $countSpace=0;
                    for($i=0; $i<strlen($text); $i++) // перебираем все символы текста
                        {
                            
                            if( $text[$i]==' ' || array_key_exists($text[$i], $Punctuation) ||  $i == strlen($text)-1 || array_key_exists($text[$i], $cifra)==true )
                            {
                                if (($text==' ')){
                                    $countSpace+=1;
                                }
                                if(($i == strlen($text)-1) && array_key_exists($text[$i], $cifra)==false ) {
                                    $word.=$text[$i];
                                }
                                if( $word ) // если есть текущее слово
                                {
                                    // если текущее слово сохранено в списке слов
                                    if( isset($words[$word]) ){
                                        $words[ $word ]++; // увеличиваем число его повторов
                                        
                                    }
                                    else
                                        $words[ $word ]=1; // первый повтор слова
                                }
                                $word=''; // сбрасываем текущее слово
                            }
                            else // если слово продолжается
                                $word.=$text[$i]; //добавляем в текущее слово новый символ
                        }
                    ksort($words);
                    foreach($words as $item => $item_count)
                    echo iconv("cp1251", "utf-8", $item) . "=" . $item_count.'<br>';
                } 

                function asArrayLeters($text, $cifra, $Punctuation){
                    $asArray=array();
                    $up=0;
                    $low=0;
                    $sapce=0;
                    // foreach($text as $key => $index_count){
                    //     if( !(array_key_exists($index_count, $cifra) || array_key_exists($index_count, $Punctuation) || $index_count==' ')){
                    //         if(ctype_upper($index_count))
                    //             $up++;
                    //         else 
                    //             $low++;
                    //     }
                    // }
                    for($i=0; $i<strlen($text); $i++){
                        if( !(array_key_exists($text[$i], $cifra) || array_key_exists($text[$i], $Punctuation) || $text[$i]==' ')){
                            if(ctype_upper($text[$i]) || strpos(iconv("utf-8", "cp1251", "ЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ"), $text[$i]) !== false)
                                $up++;
                            else 
                                $low++;
                        }
                        $text[$i]=strtolower($text[$i]);
                        if( !(array_key_exists($text[$i], $cifra)) && !(array_key_exists($text[$i], $Punctuation)) && $text[$i]!=' '){
                            if(!isset($asArray[$text[$i]]))
                                $asArray[$text[$i]] = 1;
                            else 
                                $asArray[$text[$i]] +=1;
                        }
                        if ($text[$i]==' '){
                            $sapce+=1;
                        }
                    }
                    ksort($asArray);
                    foreach($asArray as $item => $item_count) {
                        echo iconv("cp1251", "utf-8", $item) . "=" . $item_count.'<br>';
                    };
                    return [$up, $low, $sapce];
                } 
            ?>            
                <input class="form-btn" type="button" onclick="history.back();" value="Другой анализ"/>
            </div>
        </form>
    </main>
</body>
</html>






