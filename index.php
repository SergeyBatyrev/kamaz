<?php
if (!isset($_POST['submit'])) {
    // echo 'вы не вошли';
} else {
    include_once ('./db.php');
    include_once ('./login.php');
}
// setcookie("name", $user, time() - 3600 * 24 * 365);


if (isset($_POST['exit'])) {
    include_once ('./db.php');
    include_once ('./login.php');
    // setcookie("name", $user, time() - 3600 * 24 * 365);
    // setcookie("fffff", $user, time() + 3600 * 24 * 365);
}

if (isset($_POST['upload'])) {
    $page_2 = $_GET['page'];
    $id_2 = $_GET['id'];
    header("Location: /?page=2&id={$id_2}");
}

// if(isset($_POST['add'])){

//     header("Location: /?page=2&id=4");
// }
?>






<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./img/лого-механик-01.png">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <title>Kamaz_Mehanic</title>
</head>

<body>

   

    <div class="container">


        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 229 300" width="48px">
                    <path class="logo_igo" fill="#221e1f"
                        d="M173.76 234.71q-4.34 1.11.24 1.08l53.87-.3q.63-.01.63.63v6.38q0 .75-.75.75H1a.75.75 0 0 1-.75-.75v-6.02a.71.7 0 0 1 .71-.7l164.34-.1a.4.4 0 0 0 .39-.47l-2.22-12.73a.49.48 83 0 0-.52-.41c-2.32.16-12.04 1.88-9.4-3.46a.4.4 0 0 0-.62-.48q-4.13 3.58-9.69 3.66a1.23 1.22 79.5 0 1-1.16-.8c-1.78-4.9-2.83-11.43-6.16-15.39-3.77-4.5-4.43-8.89-9.39-13.07q-5.43-4.57-9.07-10.7-.28-.47-.81-.54-9.85-1.34-18.66-5.92a.43.42 89.8 0 0-.57.58c1.59 3.04 3.09 6.51 6.17 8.38 5.02 3.05 7.78 14.35 11.52 19.54q.26.37.65.14l.28-.16q.29-.18.14-.49l-1.84-3.68q-.25-.51.27-.73c8.05-3.37 12.86 5.89 10.7 12.64-3.03 9.46-15.05 6.08-16.52-2.82q-.08-.5-.46-.84c-5.43-4.79-13.74-6.39-18.08-11.79-2.3-2.86-2.98-6.46-5.29-9.07-4.45-5.03-12.26-8.62-13.7-15.89q-1.67-8.49-7.77-14.39c-5.08-4.91-8.36-10.31-8.99-17.3q-.98-10.78-.06-25.04.26-4.11 1.65-8.63 7.29-23.78 10.49-48.5.06-.51.4-.9c2.01-2.34 4.42-6.98.49-8.43a1.16 1.16 0 0 1-.45-1.88C72.24 40.53 79.51 32.95 79.8 25q.02-.52.44-.82c6.74-4.65 13.04-5.93 14.48-15.2.31-1.99 5.31-6.54 6.81-8.39q.45-.54.43.16l-.2 9.33a.91.9-2.8 0 0 1.01.91l8.48-.93q.83-.09.74.74l-.3 2.52a1.02 1.02 0 0 0 .89 1.13c11.25 1.28 22.36 3.09 33.67 4.01 3.1.26 3.53 5.89 5.32 8 7.41 8.71-10.61 3.58-11.89 9.12q-.11.45.23.76c2.12 2 11.27-.38 9.69 3.42q-.18.44-.59.69l-1.51.92q-.42.25-.58.71c-1.33 3.8-4.88 3.99-7.68 1.62q-.43-.36-.99-.33l-11.19.59q-.56.03-.97.41c-4.58 4.15-7.22 3.55-12.17 4.51q-.59.12-.63.72l-1.67 26.84a1.88 1.88 0 0 0 2.21 1.96q5.17-.95 9.66-1.64c3.25-.49 5.79.81 8.81 1.74q.49.15.94-.08c11.49-5.82 18.69-7.62 32.33-7 14.86.67 29.55 1.86 44.42.13a.25.25 0 0 1 .23.39c-3.08 4.4-8.61 5.48-13.37 7.18a.77.77 0 0 0 .13 1.49l3.11.55a.67.66-60.2 0 1 .31 1.16c-5.79 4.97-12.12 5.02-18.88 7.2q-.48.15-.73.58c-1.24 2.13 1.86 2.32 2.92 2.14a.56.56 0 0 1 .52.91c-8.58 10.16-27.22-2.58-37.58.6a1.4 1.4 0 0 0-.89 1.84q5.62 14.33 4.31 29.57c-.15 1.68.08 4.57.73 6.14 4.94 11.86 5.77 21 7.24 31.96 1.06 7.82 6.01 13.57 7.41 21.18q.92 4.99 1.87 9.96c.84 4.36 3.44 7.75 5.45 11.62q1.24 2.4 2.57 6.54 2.66 8.21 7.48 15.1a1.37 1.36-41.1 0 1-.12 1.71q-3.74 4.02-8.94 5.34ZM120.41 19.63c-1.09-1.77-3.58-1.66-5.21-.72a.78.78 0 0 0-.18 1.21q1.8 1.95 4.43 1.56a1.36 1.35-20.1 0 0 .96-2.05Zm22.78 2.41a.86.86 0 0 0-.26 1.56c5.53 3.64 6.89-3.21.26-1.56Zm-42.04 70.47q1.45-20.54 6.04-40.6c1.01-4.4-.76-7.35-4.79-8.93a.99.98-76.8 0 0-1.34.84c-1.35 17.47-3.58 35.32-1.41 52.89q.06.48.54.48c1.13 0 .89-3.73.96-4.68Zm26.47-6.88c-4.01-1.13-11.06-4.35-15.49-3.34q-.55.12-.6.68c-.81 8.89-.19 19.88 5.54 27.21 6.32 8.08 10.46 13.18 11.49 22.4q.06.55-.45.78c-2.03.89-5.83 2.9-3.29 4.97q.4.33.88.14c7.99-3.16 9.67 10.71 16.16 3.8q.42-.45.17-.99l-3.24-7q-.27-.58-.88-.78l-2.54-.82q-.51-.17-.8-.62c-1.46-2.23 3.38-3.39 5.67-4.09q.5-.16.72-.63c5.42-11.39 1.77-27.68-3.98-38.31q-2.67-4.93-8.07-6.18-.77-.17-.67.61l.19 1.47q.13.96-.81.7Zm-18.36 44.42c3.64 3.89 3.15 9.71-2.24 11.55q-.51.18-.49.73c.14 4.29 4.23 3.02 6.54 1.84q.51-.26.69-.8 2.34-6.93 7.69-11.93.36-.34.34-.83c-.14-3.72-1.53-8.6-5.53-9.9-2.97-.96-12.72-3.09-12.17 2.79.39 4.19 3.05 4.28 5.17 6.55ZM94 144.11c-3.42-1.65-7.15-.09-7.24-5.72q-.01-.56-.44-.93l-10.63-9.1q-.47-.41-1.06-.2l-4.05 1.41q-.84.29-.61 1.15l3.39 12.68q.17.61.7.95l8.12 5.14q.48.3 1.05.26 7.53-.46 14.49 2.2c2.53.97 4.15.35 5.97-1.35a1.28 1.28 0 0 0-.35-2.1q-4.53-2.07-9.34-4.39Zm60.41 40.53q.32 4.09 3.22 7.25c1.73 1.89 3.84 1.28 4.1-1.31q.43-4.44-1.85-7.81c-3.25-4.79-8.44-15.3-7.57-21.07q.09-.57-.2-1.07-3.15-5.52-8.59-8.8-.45-.27-.95-.12-1.96.58-3.05 2.25-.31.48-.18 1.03c1.25 5.33 3.16 10.48 7.8 13.67 2.84 1.96 5.43 8.23 6.57 11.43q.45 1.27.7 4.55Zm-10.4 11.62q2.52 7.01 8.77 11.12a.33.32-73.1 0 0 .5-.27c.02-5.08-.98-8.46-3.35-13.48-3.01-6.37-2.88-12.81-6.5-18.62q-.38-.62-5.24-6.19c-1.91-2.19-6.56-10.68-9.27-11.06q-.46-.07-.86.18c-3.29 2.04-9.14 9.79-4 12.51 3.32 1.77 6.09 2.55 7.36 6.23 2.69 7.76 4.29 13.66 11.98 18.79q.43.29.61.79Zm-64.55-28.5c7.04 6.59 11.98 13.59 16.75 21.86q.24.4.71.4 1.71-.01 2.79-1.37a1.41 1.4 45.6 0 0 .01-1.74q-6.77-8.77-9.49-19.61-.52-2.06-2.79-3.7c-3.41-2.46-6.81-.03-8.17 3.27q-.21.51.19.89Zm84.17 41.06 1.26 12a.45.44 80.8 0 0 .54.39q3.36-.75 5.77-3.19a1.6 1.59-33.6 0 0 .35-1.73q-3.09-7.69-8.46-14-.49-.58-.91.06-1.65 2.55-1.39 5.67.06.65.69.49l1.26-.31q.8-.2.89.62Z" />
                    <path class="logo_igo" fill="#221e1f"
                        d="M192.825 234.44a8.7 7.93 90.1 0 1-7.915-8.714 8.7 7.93 90.1 0 1 7.945-8.686 8.7 7.93 90.1 0 1 7.915 8.714 8.7 7.93 90.1 0 1-7.945 8.686Zm.094-1.38a7.26 6.22 89.3 0 0 6.13-7.336 7.26 6.22 89.3 0 0-6.308-7.183 7.26 6.22 89.3 0 0-6.13 7.335 7.26 6.22 89.3 0 0 6.308 7.184Z" />
                    <path class="logo_igo" fill="#221e1f"
                        d="m193.02 226.49-.8.15q-.72.14-.72.87v1.74q0 .56-.53.73c-2.02.64-1.19-7.1-1.1-8.13q.06-.7.75-.66l4.08.21q.66.03.94.63.74 1.61-.03 3.09-.19.37-.15.78l.37 3.42q.07.66-.59.76c-1.35.2-1.18-2.23-1.34-3.01q-.16-.72-.88-.58Zm-1.46-3.35v1.64a.49.49 0 0 0 .49.49h.62a1.83 1.21-.1 0 0 1.83-1.21v-.2a1.83 1.21-.1 0 0-1.83-1.21h-.62a.49.49 0 0 0-.49.49ZM18.44 267.72a.3.3 0 0 0 .49.24l19.38-15.63q.41-.33.93-.33h7.01q1.85 0 .45 1.2l-12.75 10.96q-.45.39-.24.94l12.83 33.01a.88.84 5 0 0 .37.42q.84.48 1.23-.43 9.75-22.85 19.78-45.59.22-.51.78-.51h5.97q.65 0 .89.61l17.61 46.15q.28.74-.5.74H75.7a.94.94 0 0 1-.88-.61l-1.77-4.62q-.2-.52-.76-.52H56.55q-.51 0-.71.48l-1.89 4.65q-.25.59-.89.59l-23.85.04q-.57 0-.77-.53l-8.81-22.18a.62.62 0 0 0-1.05-.17c-.84.99-.34 19.62-.38 22.38q-.01.49-.49.49H1.75q-.75 0-.75-.75v-46q0-.75.75-.75h16.04q.73 0 .73.73l-.08 14.99Zm40.26 19.22a.34.34 0 0 0 .31.48l11.23.15a.34.34 0 0 0 .32-.46l-5.43-13.57a.34.34 0 0 0-.63-.01l-5.8 13.41ZM117.31 299.51l-5.19-.02a.33.33 0 0 1-.3-.2l-11.28-26.58a.33.33 0 0 0-.63.13l.14 26.38a.33.33 0 0 1-.34.33l-5.35-.15a.33.33 0 0 1-.32-.33l-.06-46.74a.33.33 0 0 1 .33-.33h16.36a.33.33 0 0 1 .3.21l9.09 23.06a.33.33 0 0 0 .6.02l10.69-23.1a.33.33 0 0 1 .3-.19h15.27a.33.33 0 0 1 .33.33v45.88a.33.33 0 0 0 .63.13l19.7-46.14a.33.33 0 0 1 .31-.2h6.01a.33.33 0 0 1 .31.21l17.6 46.59a.33.33 0 0 0 .63-.03l11.41-38.14a.33.33 0 0 0-.32-.43l-10.95.07a.33.33 0 0 1-.33-.33v-7.11a.33.33 0 0 1 .33-.33h35.14a.33.33 0 0 1 .32.42l-11.5 39.22a.33.33 0 0 0 .32.43l10.31-.11a.33.33 0 0 1 .33.33v6.38a.33.33 0 0 1-.33.33h-52.6a.33.33 0 0 1-.31-.22l-2.01-5.56a.33.33 0 0 0-.31-.22H156.2a.33.33 0 0 0-.31.2l-2.43 5.6a.33.33 0 0 1-.31.2h-22.84a.33.33 0 0 1-.33-.33l.06-26.52a.33.33 0 0 0-.64-.14l-11.78 26.8a.33.33 0 0 1-.31.2Zm41.31-12.54a.32.32 0 0 0 .29.44l10.31.18a.32.32 0 0 0 .31-.43l-4.93-13.12a.32.32 0 0 0-.6-.01l-5.38 12.94Z" />
                </svg>
            </div>
            <div class="logo_meh"><a href="/"><img src="./img/лого-механик-01.png" alt="" width="86px"></a></div>
            <div class="autorization">
                <div class="img_user"><img src="./img/user.png" alt="" width="30px"></div>
                <div class="user_row">
                    <svg width="24" height="13" viewBox="0 0 24 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="auth" d="M12 12.025L0.764744 0.00332949L23.2814 0.0466585L12 12.025Z" />
                    </svg>
                </div>
                <?php if ((!$resault && !$_COOKIE['name']) || ($resault->num_rows == 0 && !$_COOKIE['name']) || ($_POST['exit'])) {
                    echo "
                <div class='auto_block block_modal '>
                 <div class='butclose'></div>
                    <h3>Вход</h3>
                    <form class='autoriz' action='' method='post' id='form'>
                        <div>
                            <label for='login'>Login</label>
                            <input class='form__item-input' type='text' name='login' id='username'>
                        </div>
                        <div>
                            <label for='password'>Password</label>
                            <input class='form__item-input' type='password' name='password' id='password'
                                autocomplete='on'>
                        </div>
                        <div>
                        <input class='button' type='submit' name='submit' value='Войти'>
                        </div>
                       ";
                    ?>
                    <?php

                    if ($resault) {
                        if ($resault->num_rows > 0) {
                            // while ($row2 = $resault->fetch_assoc()) {
                            //     echo "------" . $row2['name'];
                            //     echo "</br>";
                            //     echo "------" . $row2['password'];
                            //     echo "</br>";
                            //     echo "------" . $row2['addmin'];
                            //     echo "</br>";
                            // }
                            // echo $_COOKIE["name"];
                            // echo "asdfasdfas";
                        } else {
                            echo "<div style='color:red; margin-top:8px;'>не верный логин или пароль!</div>";
                        }
                    } else {
                        // echo 'resault=' . var_dump($resault);
                    }
                    ?>
                    <?php
                    echo "</form></div>";
                } else {
                    // $row = $resault->fetch_assoc();
                    if ($_COOKIE['name']) {
                        echo "<p class='name_user'>" . strtoupper($_COOKIE['name']) . "</p>";
                    } else if (!$_COOKIE['name']) {

                        echo "<p class='name_user'>" . strtoupper($row['name']) . "</p>";
                    }

                    echo "
                    <div class='auto_block_exit  block_modal close'>
                    <div class='butclose'></div>
                    <h3>Пользователь</h3>
                    ";
                    if ($_COOKIE['name']) {
                        echo "<p class='name_user'>" . strtoupper($_COOKIE['name']) . "</p>";
                    } else if (!$_COOKIE['name']) {
                        // $row = $resault->fetch_assoc();
                        echo "<p class='name_user'>" . strtoupper($row['name']) . "</p>";
                    }
                    echo "
                    <form class='form_exit' action='' method='post' id='form_exit'>
                    <input class='button' type='submit' name='exit' value='Выйти'>
                    </form>
                    </div>
            ";
                }
                ?>
            </div>
        </div>


        <?php

        ?>
        <section class="order">
            <?php
            if ((isset($_GET['page']) && $_COOKIE['name']) || $_COOKIE['name']) {
                $page = $_GET['page'];
                if (($page == 1 && $_COOKIE['name']) || ($_COOKIE['name'] && !$page))
                    include_once ('pages/home.php');
                if ($page == 2 && $_COOKIE['name'])
                    include_once ('pages/item.php');
                if ($page == 3 && $_COOKIE['name'] == 'admin')
                    include_once ('pages/upload.php');
                if ($page == 4 && $_COOKIE['name'] == 'admin')
                    include_once ('pages/add.php');
            } else {
                echo "<h3 class='description'>Авторизируйтесь чтобы пользоваться приложением!</h3>";
            }
            ?>
        </section>







    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        const form = document.getElementById("form");
        const formInput = document.querySelectorAll('.form__item-input');
        if (form) {
            form.addEventListener('submit', function (event) {
                const username = form.querySelector('#username');
                const passform = form.querySelector('#password');
                if (username.value.length == 0 || passform.value.length == 0) {
                    event.preventDefault(); // Останавливаем отправку формы
                    formInput.forEach(function (item) {
                        if (item.value == '') {
                            item.style.border = '1px red solid';
                            item.placeholder = 'заполните поле!';
                        }
                        else {
                            item.style.border = '';
                        }
                    });
                    // var results = document.cookie.match(/name=(.+?)(;|$)/);
                    // console.log(results[1]); // user
                }
                else {
                    form.submit();
                    form.reset();
                }
            });
        }

        let but_close = document.querySelector('.butclose');
        let row = document.querySelector('.user_row');
        let block_modal = document.querySelector('.block_modal');
        row.addEventListener('click', () => {
            block_modal.classList.toggle('close');
        });
        but_close.addEventListener('click', () => {
            block_modal.classList.toggle('close');
        });
    </script>



    <script type="text/javascript" defer>
        let catalogContainer = document.querySelector('.order_auto');
        if (catalogContainer) {
            let item = 20;
            let showMore = document.querySelector(".ShowMore");
            let productLenght = document.querySelectorAll('.item_auto').length;

            // если товаров на странице меньше 12 кнопка показать еще не доступна

            if (productLenght < 20) {
                showMore.style.display = 'none';
            };
            // если товаров на странице больше 12 кнопка показать еще доступна

            for (i = 0; i < 20; i++) {
                document.querySelector('.order_auto').children[i].classList.add('visible');
            }

            const array = Array.from(document.querySelector('.order_auto').children);
            showMore.addEventListener('click', (e) => {
                item += 20;
                const visItems = array.slice(0, item);
                visItems.forEach(el => el.classList.add('visible'));

                if (visItems.length === productLenght) {
                    showMore.style.display = 'none';
                }
            });


        }


    </script>

    <script>
        let but_close2 = document.querySelector('.butclose_change');
        if (but_close2) {
            let row2 = document.querySelector('.filtr');
            let block_modal2 = document.querySelector('.block_modal2');
            row2.addEventListener('click', () => {
                block_modal2.classList.toggle('open');
            });
            but_close2.addEventListener('click', () => {
                block_modal2.classList.toggle('open');
            });
        }




        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</body>

</html>






































<!-- <script>
        let content = document.querySelector('#form').innerHTML;
        form.addEventListener("submit", formSend);
        async function formSend(event) {
            event.preventDefault();
            let error = 0;
            let formData = new FormData(form);


            if (error == 0) {
                // form.classList.add('is-valid');

                let response = await fetch('./prover.php', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    let result = await response.json();

                    if (result.message) {
                        // alert(result.message);
                        console.log(result.message.name);
                        form.reset();
                        // form.classList.remove('is-valid');
                        /* потом присваиваем назад */
                        // let test =  document.querySelector('#form').innerHTML = content; 
                    }
                    else {
                        alert(result.message);
                        // form.classList.remove('is-valid');
                    }
                }
                else {
                    alert("Ошибка HTTP!!!: " + response.status);
                    // form.classList.remove('is-valid');
                }
            }
            else {
                alert('заполните обязательные поля');
            }
        }


        function formValidate(form) {
            let error = 0;
            let formReq = document.querySelectorAll(".req");
            for (let i = 0; i < formReq.length; i++) {
                const input = formReq[i];
                formRemoveError(input);

                //   else {
                if (input.value == "") {
                    formAddError(input);
                    error++;
                }
            }
            // }
            return error;
        }

        function formAddError(input) {
            // input.parentElement.classList.add("is-invalid");
            input.classList.add("is-invalid");
        }
        function formRemoveError(input) {
            // input.parentElement.classList.remove("is-invalid");
            input.classList.remove("is-invalid");
        }
    </script> -->