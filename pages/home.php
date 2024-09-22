<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On'); 

// require_once 'PHPExcel.php';
// $objExel=new PHPExcel();
// $objExel->setActiveSheetIndex(0);
// $objWriter=PHPExcel_IOFactory::createWriter($objExel,'Exel5');
// $objWriter->save('test.xls');


include_once 'db.php';
// $user = $_COOKIE['name'];
// $pass = '12345';


if (isset($_POST['submit']) && !$_POST['filtr_sub'] && !isset($_POST['search']) || $_COOKIE['name'] && !isset($_POST['filtr_sub']) && !isset($_POST['search'])) {
    // $sql = "SELECT * FROM `auto` ORDER BY `enterauto` DESC ";
    $sql = "SELECT p.id, p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p  JOIN Model as u ON p.id_model=u.id ORDER BY ISNULL(`exitauto`) DESC,`enterauto` DESC;";
    // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id ORDER BY `enterauto` DESC ";
    // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto` IS  NULL ORDER BY `enterauto` DESC ";//на будещее формирует все не выехаевшие и можно еще сделать выехаевшие is not null
    $result = mysqli_query($link, $sql);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['name'] && isset($_POST['filtr_sub']) && !isset($_POST['search'])) {
    $position = $_POST['position'];
    $modelauto = $_POST['marka'];
    $enterauto = $_POST['enterauto'];
    $exitauto = $_POST['exitauto'];

    if ($position != '' && $modelauto != '' && $enterauto != '' && $exitauto != '') {
        // echo "если все выбрано!";
        // если все выбрано!
        if ($position == 'all' || $position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' AND `exitauto`= '$exitauto'  ORDER BY `enterauto` DESC";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' AND `exitauto` IS  NULL   ORDER BY `enterauto` DESC";
            $result = mysqli_query($link, $sql);
        }
    }
    if ($position != '' && $modelauto == '' && $enterauto == '' && $exitauto == '') {
        // echo "если выбран первый!";
        // если выбран первый!
        if ($position == 'all') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id ORDER BY `enterauto` DESC";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto` IS  NULL ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto` IS NOT  NULL ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }

    }
    if ($position != '' && $modelauto != '' && $enterauto == '' && $exitauto == '') {
        // echo "если выбран второй!";
        // если выбран второй!
        if ($position == 'all') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `exitauto` IS  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `exitauto` IS NOT NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
    }
    if ($position == 'all' && $modelauto == '' && $enterauto != '' && $exitauto == '') {
        // echo "если выбран третий!";
        // если выбран третий!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `enterauto`='$enterauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position == 'all' && $modelauto == '' && $enterauto == '' && $exitauto != '') {
        // echo "если выбран четвертый!";
        // если выбран четвертый!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position == 'all' && $modelauto == '' && $enterauto != '' && $exitauto != '') {
        // echo "если выбраны последние два!";
        // если выбраны последние два!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position != '' && $modelauto != '' && $enterauto != '' && $exitauto == '') {
        // echo "если выбраны первые три!";
        // если выбраны первые три!
        if ($position == 'all') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' AND`exitauto` IS  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' AND`exitauto` IS NOT  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
    }
    if ($position == 'all' && $modelauto != '' && $enterauto != '' && $exitauto != '') {
        // echo "если выбраны последние три!";
        // если выбраны последние три!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' AND `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position != '' && $modelauto == '' && $enterauto == '' && $exitauto != '') {
        // echo "если выбраны 1/4!";
        // если выбраны 1/4!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position == 'all' && $modelauto != '' && $enterauto == '' && $exitauto != '') {
        echo 'если выбраны 2/4';
        // если выбраны 2/4!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position == 'all' && $modelauto != '' && $enterauto != '' && $exitauto == '') {
        // echo 'если выбраны 2/3';
        // если выбраны 2/3!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `enterauto`='$enterauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    if ($position != '' && $modelauto == '' && $enterauto != '' && $exitauto == '') {
        // echo 'если выбраны 1/3';
        // если выбраны 1/3!
        if ($position == 'all') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `enterauto`='$enterauto' ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE  `enterauto`='$enterauto' AND`exitauto` IS  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE  `enterauto`='$enterauto' AND`exitauto` IS NOT  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
    }
    if ($position != '' && $modelauto == '' && $enterauto != '' && $exitauto != '') {
        // echo 'если выбраны 1/3/4';
        // если выбраны 1/3/4!
        // схож с последними двумя

        if ($position == 'all') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `enterauto`='$enterauto' AND `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'here') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `enterauto`='$enterauto' AND `exitauto` IS  NULL  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
        if ($position == 'there') {
            $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `enterauto`='$enterauto' AND `exitauto`='$exitauto'  ORDER BY `enterauto` DESC ";
            $result = mysqli_query($link, $sql);
        }
    }
    if ($position != '' && $modelauto != '' && $enterauto == '' && $exitauto != '') {
        // echo 'если выбраны 1/2/4';
        // если выбраны 1/2/4!
        $sql = "SELECT p.id ,p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `id_model`='$modelauto' AND `exitauto`='$exitauto' ORDER BY `enterauto` DESC ";
        $result = mysqli_query($link, $sql);
    }
    // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE id_model='1'";
    // $result = mysqli_query($link, $sql);
}




// закрываем соединение с базой
//  mysqli_close($link);
?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['name'] && $_POST['search']) {
    echo "<h1 class='upload_title' style='text-align:center;'>РЕЗУЛЬТАТ ПОИСКА</h1>";
} else {
    echo "<h1 class='upload_title' style='text-align:center;'>СПИСОК АВТОМОБИЛЕЙ</h1>";
}
?>
<div class="order_auto">
    <div class="item_auto novisible">
        <div class="model" style="height: 45px;font-size:18px;min-width:28px">TM</div>
        <div class="vin" style="height: 45px;font-size:18px;">VIN</div>
        <div class="enter" style="height: 45px;font-size:18px;">заезд</div>
        <div class="exit" style="height: 45px;font-size:18px;">выезд</div>
        <div class="admin" style="height: 45px;font-size:18px;position:relative">
            <div class="filtr"></div>
            <div class="filtr_change block_modal2">
                <div class="butclose butclose_change"></div>
                <h4 style="line-height:16px;">Поиск по vin</h4>
                <div class="search_container">
                    <form action="" method="post">
                        <input type="text" name="search_text">
                        <div>
                            <input class="button" type="submit" name="search" value="найти">
                        </div>
                    </form>
                </div>

                <h4>Фильтрация</h4>
                <form action="" method="post" id="form_filtr">
                    <div>
                        <label for="position">Выбрать статус</label>
                        <select name="position" id="position">
                            <option value="all">все</option>
                            <option value="here">на парковке</option>
                            <option value="there">убыли</option>
                        </select>
                    </div>

                    <div>
                        <label for="marka">Марка авто</label>
                        <select name="marka" id="marka">
                            <option value=""></option>
                            <option value="1">Камаз</option>
                            <option value="3">Mersedes</option>
                            <option value="2">Sitrak</option>
                            <option value="4">Прицеп</option>
                            <option value="5">Другое</option>
                        </select>
                    </div>
                    <div>
                        <label for="enterauto">Дата заезда</label>
                        <input type="date" name="enterauto" id="">
                    </div>
                    <div>
                        <label for="exitauto">Дата выезда</label>
                        <input type="date" name="exitauto" id="">
                    </div>

                    <input class="button button_change" type="submit" name="filtr_sub" value="применить">
                </form>


            </div>
        </div>
    </div>





    <?php if (($_COOKIE['name'] == 'user' || $_COOKIE['name'] == 'admin') && !isset($_POST['filtr_sub']) && !isset($_POST['search']))
        // echo $_COOKIE['name'];
        while ($row = $result->fetch_assoc()) {
            echo "<a class='item_auto novisible ";
            if ($row['exitauto'] == '') {
                echo 'autonoexit';
            }
            ;
            echo "' href='/?page=2&id=" . $row['id'] . "'>
           ";
            echo "<div class='model'style='height: 45px;font-size:18px;min-width:28px'>";
            echo mb_substr($row['model'], 0, 1);
            echo "</div>";
            echo "<div class='vin'>";
            echo $row['vin'];
            echo "</div>";
            echo "<div class='enter'>";
            // echo $row['enterauto'];
            $str = $row['enterauto'];
            // $str = mb_substr($row['enterauto'], 0, $numstr);
            $array = explode('-', $str);
            $year = mb_substr($array[0], 2);
            echo $array[2] . "/";//день
            echo $array[1] . "/";//месяц
            // echo $array[0];//год
            echo $year;//год
            // mb_substr($str, 0, mb_strpos($str, ' - '));
            echo "</div>";
            echo "<div class='exit'>";
            if ($row['exitauto'] != '') {
                $str = $row['exitauto'];
                // $str = mb_substr($row['exitauto'], 0, $numstr);
                $array = explode('-', $str);
                $year = mb_substr($array[0], 2);
                echo $array[2] . "/";//день
                echo $array[1] . "/";//месяц
                // echo $array[0];//год
                echo $year;//год
            } else
                echo "парковка";
            echo "</div>";
            echo "<div class='admin'>";
            echo $_COOKIE['name'] == 'admin' ? "<object><a href='/?page=3&id=" . $row['id'] . "'><img src='./img/pan.png' alt='' width='28px'></object>" : "X";
            echo "</div></a>";
        }

    ?>


    <?php
    if (($_COOKIE['name'] == 'user' || $_COOKIE['name'] == 'admin') && isset($_POST['filtr_sub']) && !isset($_POST['search']))
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<a class='item_auto novisible ";
                if ($row['exitauto'] == '') {
                    echo 'autonoexit';
                }
                ;
                echo "' href='/?page=2&id=" . $row['id'] . "'>
       ";
                echo "<div class='model'style='height: 45px;font-size:18px;min-width:28px'>";
                echo mb_substr($row['model'], 0, 1);
                echo "</div>";
                echo "<div class='vin'>";
                echo $row['vin'];
                echo "</div>";
                echo "<div class='enter'>";
                // echo $row['enterauto'];
                $str = $row['enterauto'];
                // $str = mb_substr($row['enterauto'], 0, $numstr);
                $array = explode('-', $str);
                $year = mb_substr($array[0], 2);
                echo $array[2] . "/";//день
                echo $array[1] . "/";//месяц
                // echo $array[0];//год
                echo $year;//год
                // mb_substr($str, 0, mb_strpos($str, ' - '));
                echo "</div>";
                echo "<div class='exit'>";
                if ($row['exitauto'] != '') {
                    $str = $row['exitauto'];
                    // $str = mb_substr($row['exitauto'], 0, $numstr);
                    $array = explode('-', $str);
                    $year = mb_substr($array[0], 2);
                    echo $array[2] . "/";//день
                    echo $array[1] . "/";//месяц
                    // echo $array[0];//год
                    echo $year;//год
                } else
                    echo "парковка";
                echo "</div>";
                echo "<div class='admin'>";
                echo $_COOKIE['name'] == 'admin' ? "<object><a href='/?page=3&id=" . $row['id'] . "'><img src='./img/pan.png' alt='' width='28px'></object>" : "X";
                echo "</div></a>";
            }
        } else {
            echo "<h3>Ничего не найдено! Попробуйте поменять пораметры фильтрации!</h3>";
        }







    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['name'] && $_POST['search']) {
        $textsearch = $_POST['search_text'];
        $sql = "SELECT p.id, p.vin, u.model,p.enterauto,p.exitauto FROM auto AS p  JOIN Model as u ON p.id_model=u.id WHERE p.vin LIKE'%$textsearch%' ORDER BY `enterauto` DESC";
        // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id ORDER BY `enterauto` DESC ";
        // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto` IS  NULL ORDER BY `enterauto` DESC ";//на будещее формирует все не выехаевшие и можно еще сделать выехаевшие is not null
        $result = mysqli_query($link, $sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<a class='item_auto novisible ";
                if ($row['exitauto'] == '') {
                    echo 'autonoexit';
                }
                ;
                echo "' href='/?page=2&id=" . $row['id'] . "'>
           ";
                echo "<div class='model'style='height: 45px;font-size:18px;min-width:28px'>";
                echo mb_substr($row['model'], 0, 1);
                echo "</div>";
                echo "<div class='vin'>";
                echo $row['vin'];
                echo "</div>";
                echo "<div class='enter'>";
                // echo $row['enterauto'];
                $str = $row['enterauto'];
                // $str = mb_substr($row['enterauto'], 0, $numstr);
                $array = explode('-', $str);
                $year = mb_substr($array[0], 2);
                echo $array[2] . "/";//день
                echo $array[1] . "/";//месяц
                // echo $array[0];//год
                echo $year;//год
                // mb_substr($str, 0, mb_strpos($str, ' - '));
                echo "</div>";
                echo "<div class='exit'>";
                if ($row['exitauto'] != '') {
                    $str = $row['exitauto'];
                    // $str = mb_substr($row['exitauto'], 0, $numstr);
                    $array = explode('-', $str);
                    $year = mb_substr($array[0], 2);
                    echo $array[2] . "/";//день
                    echo $array[1] . "/";//месяц
                    // echo $array[0];//год
                    echo $year;//год
                } else
                    echo "парковка";
                echo "</div>";
                echo "<div class='admin'>";
                echo $_COOKIE['name'] == 'admin' ? "<object><a href='/?page=3&id=" . $row['id'] . "'><img src='./img/pan.png' alt='' width='28px'></object>" : "X";
                echo "</div></a>";
            }
        } else {
            echo "<h3>Ничего не найдено! Попробуйте поменять пораметры поиска!</h3>";
        }
    }
    ?>

    
</div>

<?php
    if ($_COOKIE['name'] == 'admin') { ?>
        <a href="/?page=4"><img class="add_auto" src="./img/plus3.png" alt=""></a>
        <?php
    }
    ?>

<div class="show"><button type="button" class="ShowMore">ПОКАЗАТЬ ЕЩЕ</button></div>