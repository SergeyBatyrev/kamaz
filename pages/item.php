<div class="lds-roller">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<div class="order_2">



    <?php

    if (isset($_POST['del_submit'])) {
        $namedel = $_POST['del_img'];
        include_once 'db.php';

        $ssq = "DELETE FROM `Capture` WHERE `name`='$namedel'";
        $resimgdel = mysqli_query($link, $ssq);

        echo "</br>";
        unlink('uploads/' . $_POST['del_img']);


    }



    // работа с изображениями!!!
    

    $input_name = 'file';
    $allow = array();
    $deny = array(
        'phtml',
        'php',
        'php3',
        'php4',
        'php5',
        'php6',
        'php7',
        'phps',
        'cgi',
        'pl',
        'asp',
        'aspx',
        'shtml',
        'shtm',
        'htaccess',
        'htpasswd',
        'ini',
        'log',
        'sh',
        'js',
        'html',
        'htm',
        'css',
        'sql',
        'spl',
        'scgi',
        'fcgi'
    );
    $path = dirname(__DIR__, 1) . '/uploads/';

    if (isset($_FILES[$input_name])) {
        include_once 'db.php';
        // Проверим директорию для загрузки.
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
        $files = array();
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach ($_FILES[$input_name] as $k => $l) {
                foreach ($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }
        }

        foreach ($files as $file) {
            $error = $success = '';

            // Проверим на ошибки загрузки.
            if (!empty($file['error']) || empty($file['tmp_name'])) {
                switch (@$file['error']) {
                    case 1:
                    case 2:
                        $error = 'Превышен размер загружаемого файла.';
                        break;
                    case 3:
                        $error = 'Файл был получен только частично.';
                        break;
                    case 4:
                        $error = 'Файл не был загружен.';
                        break;
                    case 6:
                        $error = 'Файл не загружен - отсутствует временная директория.';
                        break;
                    case 7:
                        $error = 'Не удалось записать файл на диск.';
                        break;
                    case 8:
                        $error = 'PHP-расширение остановило загрузку файла.';
                        break;
                    case 9:
                        $error = 'Файл не был загружен - директория не существует.';
                        break;
                    case 10:
                        $error = 'Превышен максимально допустимый размер файла.';
                        break;
                    case 11:
                        $error = 'Данный тип файла запрещен.';
                        break;
                    case 12:
                        $error = 'Ошибка при копировании файла.';
                        break;
                    default:
                        $error = 'Файл не был загружен - неизвестная ошибка.';
                        break;
                }
            } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } else {
                // Оставляем в имени файла только буквы, цифры и некоторые символы.
                $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                $name = mb_eregi_replace($pattern, '-', $file['name']);
                $name = mb_ereg_replace('[-]+', '-', $name);

                // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
                // Сделаем их транслит:
                $converter = array(
                    'а' => 'a',
                    'б' => 'b',
                    'в' => 'v',
                    'г' => 'g',
                    'д' => 'd',
                    'е' => 'e',
                    'ё' => 'e',
                    'ж' => 'zh',
                    'з' => 'z',
                    'и' => 'i',
                    'й' => 'y',
                    'к' => 'k',
                    'л' => 'l',
                    'м' => 'm',
                    'н' => 'n',
                    'о' => 'o',
                    'п' => 'p',
                    'р' => 'r',
                    'с' => 's',
                    'т' => 't',
                    'у' => 'u',
                    'ф' => 'f',
                    'х' => 'h',
                    'ц' => 'c',
                    'ч' => 'ch',
                    'ш' => 'sh',
                    'щ' => 'sch',
                    'ь' => '',
                    'ы' => 'y',
                    'ъ' => '',
                    'э' => 'e',
                    'ю' => 'yu',
                    'я' => 'ya',

                    'А' => 'A',
                    'Б' => 'B',
                    'В' => 'V',
                    'Г' => 'G',
                    'Д' => 'D',
                    'Е' => 'E',
                    'Ё' => 'E',
                    'Ж' => 'Zh',
                    'З' => 'Z',
                    'И' => 'I',
                    'Й' => 'Y',
                    'К' => 'K',
                    'Л' => 'L',
                    'М' => 'M',
                    'Н' => 'N',
                    'О' => 'O',
                    'П' => 'P',
                    'Р' => 'R',
                    'С' => 'S',
                    'Т' => 'T',
                    'У' => 'U',
                    'Ф' => 'F',
                    'Х' => 'H',
                    'Ц' => 'C',
                    'Ч' => 'Ch',
                    'Ш' => 'Sh',
                    'Щ' => 'Sch',
                    'Ь' => '',
                    'Ы' => 'Y',
                    'Ъ' => '',
                    'Э' => 'E',
                    'Ю' => 'Yu',
                    'Я' => 'Ya',
                );

                $name = strtr($name, $converter);
                $parts = pathinfo($name);

                if (empty($name) || empty($parts['extension'])) {
                    $error = 'Недопустимое тип файла';
                } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                    $error = 'Недопустимый тип файла';
                } else {
                    // Чтобы не затереть файл с таким же названием, добавим префикс.
                    $i = 0;
                    $prefix = '';
                    while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                        $prefix = '(' . ++$i . ')';
                    }
                    $name = $parts['filename'] . $prefix . '.' . $parts['extension'];

                    // Перемещаем файл в директорию.
                    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                        // Далее можно сохранить название файла в БД и т.п.
                        $img_id = $_GET['id'];

                        $sqll = "INSERT INTO Capture (`name`, `id_auto`,`path`) VALUES ('$name', '$img_id','$path')";
                        mysqli_query($link, $sqll);

                        $success = 'Файл «' . $name . '» успешно загружен.';
                    } else {
                        $error = 'Не удалось загрузить файл.';
                    }
                }
            }

            // Выводим сообщение о результате загрузки.
            if (!empty($success)) {
                // echo '<p>' . $success . '</p>';
            } else {
                // echo '<p>' . $error . '</p>';
            }
        }

    }
    // Работа с изображениями закончена
    
    ?>


    <div class="top_menu"><a class="button" href="?page=1">на главную</a>
        <?php
        if ($_COOKIE['name'] == 'admin') {
            echo "<a class='button button_admin' href='/?page=3&id=" . $_GET['id'] . "'>Редактировать</a>";
        }
        ?>
    </div>


    <div class="auto_info">
        <?php
        if (isset($_COOKIE['name'])) {
            $id_item = $_GET['id'];
            include_once 'db.php';
            $sql = "SELECT p.id, p.vin, u.model,p.enterauto,p.exitauto,p.description FROM auto AS p  JOIN Model as u  ON p.id_model=u.id WHERE p.id='$id_item'";
            // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id ORDER BY `enterauto` DESC ";
            // $sql = "SELECT * FROM auto AS p JOIN Model as u ON p.id_model=u.id WHERE `exitauto` IS  NULL ORDER BY `enterauto` DESC ";//на будещее формирует все не выехаевшие и можно еще сделать выехаевшие is not null
            $result = mysqli_query($link, $sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='model_info'><h2>" . $row['model'] . "</h2></div>";
                    echo "<div class='vin_info'><p style='padding:20px 0 8px; margin:0'>VIN:</p>
            " . $row['vin'] .
                        "</div>";
                    echo "<div class='time_info'><div class='enter_time'><p>дата заезда:</p>" . $row['enterauto'] . "</div><div class='exit_time'><p>дата выезда:</p>";
                    echo $row['exitauto'] != '' ? $row['exitauto'] : "На парковке";
                    echo "</div></div>";

                    echo "<div class='description_info'><p>Особые отметки:</p>" . $row['description'] . "</div>";
                }

            } else {
                echo "<h1>Данной записи не существует!</h1>";
            }
        }

        ?>

    </div>

    <div class="img_items">
        <?php if ($_COOKIE['name'] == 'admin') { ?>
            <div class='img_item img_item2'>
                <form id="item_img" action="" method="post" enctype="multipart/form-data">
                    <label style="cursor: pointer;">
                        <img src='../img/11.png' alt='' width="100px">
                        <input style="display: none;" type="file" name="file[]" id="file" multiple accept="image/*">
                        <input style="display: none;" type="submit" name="addimg">
                    </label>
                </form>
            </div>
        <?php } ?>
        <?php
        $id_img = $_GET['id'];
        $sqlimg = "SELECT `name`, `id_auto` FROM `Capture` WHERE `id_auto`='$id_img'";
        $resimg = mysqli_query($link, $sqlimg);
        if ($resimg->num_rows > 0) {
            while ($rowimg = $resimg->fetch_assoc()) {
                echo "<div class='img_item'><img src='../uploads/{$rowimg['name']}' alt=''>";
                if ($_COOKIE['name'] == 'admin') {
                    ?>
                    <div class='crash'>
                        <form action="" method="post" class="form_del">
                            <input style='display:none' type='text' name='del_img' value='<?= $rowimg['name'] ?>'>
                            <input type="submit" class="sendsubmit" name="del_submit" onclick="return confirm('УДАЛИТЬ ФОТО?')" />
                        </form>
                    </div>
                <?php }
                echo "</div>";
            }
        }
        ?>
    </div>

</div>
<script>
    const sectorOrder = document.querySelector('.order_2');
    const preload = document.querySelector('.lds-roller');

    sectorOrder.style.opacity = '0';
    preload.style.opacity = '1';


    window.addEventListener('load', function () {
        sectorOrder.style.opacity = '1';
        preload.style.opacity = '0';
    });





    document.getElementById("file").onchange = function () {
        document.getElementById("item_img").submit();
    };
</script>