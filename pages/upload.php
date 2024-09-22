<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['name'] && $_POST['upload']) {
    include_once 'db.php';

    $id = $link->real_escape_string($_GET['id']);
    $model = $link->real_escape_string($_POST['up_model']);
    $vin = $link->real_escape_string($_POST['up_vin']);
    $time_in = $link->real_escape_string($_POST['timein']);
    $time_out = $link->real_escape_string($_POST['timeout']);
    $description = $link->real_escape_string($_POST['description']);

    if ($time_out == '') {
        $sql = "UPDATE auto SET `vin` = '$vin', `id_model` = '$model',`enterauto`='$time_in',`description`='$description' WHERE `id` = '$id'";
        $result = mysqli_query($link, $sql);
    }
    if ($time_out != '') {
        $sql = "UPDATE auto SET `vin` = '$vin', `id_model` = '$model',`enterauto`='$time_in',`exitauto`='$time_out',`description`='$description' WHERE `id` = '$id'";
        $result = mysqli_query($link, $sql);
    }



} else { ?>

    <h1 class="upload_title">РЕДАКТОР</h1>
    <div class="upload_box">

        <?php
        if ($_COOKIE['name'] == 'admin' && !isset($_POST['update'])) {
            $id_item = $_GET['id'];
            include_once 'db.php';
            $sql = "SELECT p.id, p.id_model, p.vin, u.model,p.enterauto,p.exitauto,p.description FROM auto AS p  JOIN Model as u ON p.id_model=u.id WHERE p.id='$id_item'";

            $result = mysqli_query($link, $sql);
        }



        if ($result->num_rows > 0) {
            if (!isset($_POST['upload'])) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <form class='upload_form' action='' method='post' id="upform">
                        <div>
                            <label for='up_model'>Марка</label>
                            <select name="up_model" id="up_model">
                                <?php
                                if ($row['id_model'] == '1') { ?>
                                    <option value="1">Камаз</option>
                                    <option value="3">Mersedes</option>
                                    <option value="2">Sitrak</option>
                                    <option value="4">Прицеп</option>
                                    <option value="5">Другое</option>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($row['id_model'] == '2') { ?>
                                    <option value="2">Sitrak</option>
                                    <option value="1">Камаз</option>
                                    <option value="3">Mersedes</option>
                                    <option value="4">Прицеп</option>
                                    <option value="5">Другое</option>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($row['id_model'] == '3') { ?>
                                    <option value="3">Mersedes</option>
                                    <option value="2">Sitrak</option>
                                    <option value="1">Камаз</option>
                                    <option value="4">Прицеп</option>
                                    <option value="5">Другое</option>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($row['id_model'] == '4') { ?>
                                    <option value="4">Прицеп</option>
                                    <option value="3">Mersedes</option>
                                    <option value="2">Sitrak</option>
                                    <option value="1">Камаз</option>
                                    <option value="5">Другое</option>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($row['id_model'] == '5') { ?>
                                    <option value="5">Другое</option>
                                    <option value="4">Прицеп</option>
                                    <option value="3">Mersedes</option>
                                    <option value="2">Sitrak</option>
                                    <option value="1">Камаз</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for='up_vin'>VIN</label>
                            <input class="up_vin" type='text' name='up_vin' id='up_vin' value="<?= $row['vin'] ?>">
                        </div>
                        <div>
                            <label for='timein'>Время въезда</label>
                            <input type='date' name='timein' id='timein' value="<?= $row['enterauto'] ?>">
                        </div>
                        <div>
                            <label for='timeout'>Время выезда</label>
                            <input type='date' name='timeout' id='timeout' value="<?= $row['exitauto'] ?>">
                        </div>
                        <div>
                            <label for="description">Особые отметки</label>
                            <textarea name="description" id="description" rows="8"><?= $row['description'] ?></textarea>
                        </div>
                        <!-- <input name="kk" type="date" value="2023-04-01"> -->
                        <input class="button" type='submit' name='upload' id='upload' value="Редактировать" onclick="return confirm('Вы уверены что хотите внести изменения?');">
                    </form>
                    <?php
                }
            } else {
                echo 'SFSGSDFSFSFSF';
                echo $_POST['kk'];
            }

        } else {
            echo "<h1>ошибка подключения к базе данных!</h1>";
        }
        ?>




    </div>
    </div>




    <?php
}
?>


<script>
    const upform = document.getElementById("upform");
    if (upform) {
        const vinInput = document.querySelector('.up_vin');
        upform.addEventListener('submit', function (event) {
            const vin = upform.querySelector('#up_vin');
            if (vin.value.length == 0) {
                event.preventDefault(); // Останавливаем отправку формы
                vin.style.border = '1px red solid';
                vin.placeholder = 'заполните поле!';
            }
            else {
                vin.style.border = '';
                form.submit();
            }
        });
    }

</script>