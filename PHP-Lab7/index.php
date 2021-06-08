<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lab7_Gekman</title>
</head>
<body>
<header class="header">
        <a href="../index.html"><img class="header__logo-img"  src="./img/logo.jpg" alt="Mospolytech"></a>	
		<p class="header__logo">№7 | Гекман Кирилл</p>
	</header>

    <main>
    <form name="Test" method="POST" class="main-form" action="sort.php" target="_blank">   
        <div>
            <h3>Таблица элементов</h3> 
            <table id="elements">
                <tr>
                    <td><label>№1</label></td>
                    <td class="element-row"><input type="text" name="element0"></td>
                </tr>
            </table>
            <input type="hidden" name="arrLength" id="arrLength" value="1">
        </div>
        <div style="text-align: right;">
            <button type="button" name="add" class="form-btn" onclick="addElement('elements');">Добавить еще один элемент</button>
        </div>
        
        <div>
            <h3>Cпособ сортировки</h3>
            <select name="opt">
                <option>Сортировка выбором</option>
                <option>Пузырьковый алгоритм</option>
                <option>Алгоритм Шелла</option>
                <option>Алгоритм садового гнома</option>
                <option>Быстрая сортировка</option>
                <option>Встроенная функция PHP для сортировки списков по значению</option>
            </select>
        </div>
        <div class="btn-sort">
            <button type="submit" name="sort" id="idsort" class="form-btn">Сортировать массив</button>
        </div>
    </form>
</main>
<footer><a style="color:white;" href="https://github.com/kir-gek/PHP-Labs/tree/main/PHP-Lab7" >github.com/kir-gek/PHP-Labs/tree/main/PHP-Lab7</a></footer>
<script src="script.js"></script>
    
</body>
</html>