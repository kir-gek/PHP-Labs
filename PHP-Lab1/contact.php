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
        $title='Contact';
        echo $title;
        ?>
    </title>
</head>
<body>
    <header>
        <nav>
            <a href=<?php echo'"index.php"';?> class=<?php echo '"menu_item">Home';?></a>
            <a href=<?php echo'"about.php"';?> class=<?php echo'"menu_item">About';?></a>
            <a href=<?php echo'"contact.php"';?> class=<?php echo'"menu_item active">Contact';?></a>
        </nav>
    </header>
    <section class="contact">
        <h2 class="title">contact</h2>
        <form class="main_form">
            <input type="text" name="name" id="name" placeholder="Your name">
            <textarea name="message" id="message" placeholder="Your message"></textarea>
            <button>Send</button>
        </form>
    </section>
    <footer>
        <p>Copyright © 2020 All Rights Reserved</p>
    </footer>
</body>
</html>