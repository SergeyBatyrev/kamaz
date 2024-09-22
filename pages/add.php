<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['name'] && $_POST['add']) {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include_once 'db.php';

    $add_model = $_POST['add_model'];
    $add_vin = $link->real_escape_string($_POST['add_vin']);
    $add_timein = $_POST['add_timein'];
    $add_description = $link->real_escape_string($_POST['add_description']);
    $sql = "INSERT INTO auto (`vin`, `id_model`,`enterauto`,`description`) VALUES ('$add_vin', '$add_model','$add_timein','$add_description')";

    if (mysqli_query($link, $sql)) {
        $sqlin = "SELECT id FROM `auto` WHERE vin='$add_vin'";
        $result = mysqli_query($link, $sqlin);

        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $img_id = $arr[0]['id'];

        if ($result->num_rows > 0) {



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






            $add_id = $img_id;
            $_GET['id_add'] = $img_id;
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = explode('?', $url);
            $url = $url[0];
            echo "<script>window.location.replace('{$url}?page=2&id={$add_id}');</script>";


        } else
            echo "иначе";
    } else {
        // echo "Ошибка: " . mysqli_error($link);
    }


    mysqli_close($link);
}
?>


<h1 class="upload_title">ДОБАВИТЬ ТРАНСПОРТ</h1>
<!-- <a class="button" href="/">на главную</a> -->


<div class="add_auto_box">
    <form class="form_add" action="" method="post" id="form_add" enctype="multipart/form-data">
        <div>
            <label for='add_model'>Марка</label>
            <select name="add_model" id="add_model">
                <option value="1">Камаз</option>
                <option value="3">Mersedes</option>
                <option value="2">Sitrak</option>
                <option value="4">Прицеп</option>
                <option value="5">Другое</option>
            </select>
        </div>
        <div>
            <label for='add_vin'>VIN</label>
            <input class="add_vin" type='text' name='add_vin' id='add_vin'>
        </div>
        <div>
            <label for='add_timein'>Время въезда</label>
            <input type='date' name='add_timein' id='add_timein' value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div>
            <label for="add_description">Особые отметки</label>
            <textarea name="add_description" id="add_description" rows="5"></textarea>
        </div>
        <div>

            <div class="input-file-row">
                <label class="input-file">
                    <input type="file" name="file[]" multiple accept="image/*">
                    <span>Выбрать изображение</span>
                </label>
                <div class="input-file-list"></div>
            </div>
        </div>
        <input class="button" type='submit' name='add' id='add' value="Добавить"
            onclick="return confirm('ДОБАВИТЬ ТРАНСПОРТ?');">
    </form>
    <h3 style="display: none;" class="hiddin upload_title">ИДЕТ ЗАГРУЗКА<p>пожалуйста, подождите...</p>
    </h3>
</div>


<script>
    const addform = document.getElementById("form_add");
    const hidden = document.querySelector('.hiddin');
    if (addform) {
        const addInput = document.querySelector('.add_vin');
        addform.addEventListener('submit', function (event) {
            // event.preventDefault();
            const addvin = addform.querySelector('#add_vin');
            if (addvin.value.length == 0) {
                event.preventDefault(); // Останавливаем отправку формы
                addvin.style.border = '1px red solid';
                addvin.placeholder = 'заполните поле!';
            }
            else {
                addvin.style.border = '';
                addform.style.display = 'none';
                hidden.style.display = 'block';

                addform.submit();
            }
        });
    }


</script>







<script>
    var dt = new DataTransfer();

    $('.input-file input[type=file]').on('change', function () {
        let $files_list = $(this).closest('.input-file').next();
        $files_list.empty();

        for (var i = 0; i < this.files.length; i++) {
            let new_file_input = '<div class="input-file-list-item">' +
                '<span class="input-file-list-name">' + this.files.item(i).name + '</span>' +
                '<a href="#" onclick="removeFilesItem(this); return false;" class="input-file-list-remove"> X</a>' +
                '</div>';
            $files_list.append(new_file_input);
            dt.items.add(this.files.item(i));
        };
        this.files = dt.files;
    });

    function removeFilesItem(target) {
        let name = $(target).prev().text();
        let input = $(target).closest('.input-file-row').find('input[type=file]');
        $(target).closest('.input-file-list-item').remove();
        for (let i = 0; i < dt.items.length; i++) {
            if (name === dt.items[i].getAsFile().name) {
                dt.items.remove(i);
            }
        }
        input[0].files = dt.files;
    }
</script>