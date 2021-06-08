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
        $title='Lab1 1 ПУЛьФТ';
        echo $title;
        ?>
    </title>
    
</head>
<body>
    <header>
        <?php
        $add1="index.php";
        $add2="about.php";
        $add3="contact.php";    
        $bool=1;    
        ?>
        <nav>
            <?php 
            
            if ($bool==1)
                $class="menu_item active";
            else 
                $class="menu_item";

            echo '<a href="',$add1,'" class="',$class,'"';             
            echo '>Home</a>';

            $bool=0;
            if ($bool==1)
                $class="menu_item active";
            else 
                $class="menu_item";
            echo '<a href=',$add2,' class=',$class;             
            echo '>About</a>';
            echo '<a href=',$add3,' class=',$class;
           
            echo'>Contact</a>';
            ?>
        </nav>
    </header>
    <section class="introduce">
        <div class="wrapper">
            <h1 class="main_title">We make your future waste-free!</h1>
            <div class="flex_wrapper">
                <h2 class="sub_title">Scroll bellow</h2>
                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><path d="M6 8l18 32L42 8H6zm6.75 4h22.5L24 32 12.75 12z" fill='white'/></svg>
            </div>
        </div>
    </section>
    <section class="services_wrapper">
        <h2>What we can do?</h2>
        <div class="services">
            <div class="services__card">
                <img src="
                    <?php
                        if (date("s")%2==1) 
                            $img='./img/1.jpg';
                        else 
                            $img='./img/2.jpg';
                        echo $img;
                    ?>
                " alt="">
                <p class="service_title">We take out the garbage around the clock</p>
                <p>You can order a bunker truck at any convenient time of the day or night.</p>
            </div>
            <div class="services__card">
                <img src="./img/2.jpg" alt="">
                <p class="service_title">Professional movers</p>
                <p>We have only professional movers. You will always get quality help.</p>
            </div>
            <div class="services__card">
                <img src="./img/3.jpg" alt="">
                <p class="service_title">All your garbage will be recycled</p>
                <p>Your garbage will be recycled into something new with a 100% probability</p>
            </div>
        </div>
    </section>
    <section class="prices">
        <table>
            <?php 
                echo '<tr>
                    <td>Order price</td>
                    <td>Price per hour</td>
                    <td>Price for recycling</td>
                </tr>';
            ?>
            <tr>
                <td><?php echo "20$"; ?></td>
                <td><?php echo "10$"; ?></td>
                <td><?php echo "100$"; ?></td>
            </tr>
        </table>
        <br>
        <table>
            <?php
            for ($i = 1; $i <= 10; $i++) {
               echo'<tr>
                    <td>',$i,'</td>
                    <td>',$i*20,'</td>
                </tr>';
            }
            ?>
        </table>

    </section>
    <footer>
        <?php
        $today = date("Сформировано d.m.Y в H-i:s", time()+7200); 
        echo '<p>',$today,'</p>';
        ?>
    </footer>
</body>
</html>