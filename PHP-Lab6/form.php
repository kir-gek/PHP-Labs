<form name="Test" method="POST" class="main-form">
	<div class="form-row">
		<label for="fullname">ФИО</label>
		
		<input 
			type="text" 
			name="fullname" 
			required 
			
			value=<?php
				if(isset($_GET['fullname']))
					echo $_GET['fullname'];
			?>
		>
	</div>
	<div class="form-row">
		<label for="number">Номер группы</label>
		
		<input 
			type="text"
			name="number"
			required
			value=<?php
				if(isset($_GET['number']))
				echo $_GET['number'];
			?> 
		>
	</div>
	<div class="form-row">
		<label for="about">Немного о себе</label>
		<textarea name="about"></textarea>
	</div>

	<div class="form-row">
		<label for="A">Значение А:</label>
		<input type="text" name="A"  value=<?php 
		echo "".rand(1,100).""
		 ?> required>
	</div>

	<div class="form-row">
		<label for="B">Значение В:</label> 
		<input type="text" name="B" value=<?php 
		echo "".rand(1,100).""
		 ?> required>
	</div>

	<div class="form-row">
		<label for="C">Значение С:</label> 
		<input type="text" name="C" value=<?php 
		echo "".rand(1,100).""
		 ?> required>
	</div>

	<div class="form-row">
		<label for="method">Метод вычисления</label>
		<select name="method">
			<option>Найти минимум</option>
			<option>Площадь треугольника</option>
			<option>Периметр треугольника</option>
			<option>Среднее арифметическое</option>
			<option>Найти максимум</option>
			<option>Произведение чисел</option>
		</select>
	</div>

	<div class="form-row">
		<label for="answer">Ваш ответ:</label> <input type="text" name="answer">
	</div>

	<div class="form-row">
		<label for="email">Отправить результат на email?</label>
		<input type="checkbox" name="chekemail" id="send">
	</div>

	<div class="form-row form-email">
		<label for="email">Ваш email:</label> <input type="text" name="email">
	</div>

	<div class="form-row">
		<label>Отображение</label>
		<select name="view">
			<option value="print">Версия для печати</option>
			<option value="browser" selected>Версия для просмотра в браузере</option>
		</select> 
	</div>

	<div class="form-row">
		<button type="submit" class="form-btn">Проверить</button>
	</div>
</form>
<script src="script.js"></script>