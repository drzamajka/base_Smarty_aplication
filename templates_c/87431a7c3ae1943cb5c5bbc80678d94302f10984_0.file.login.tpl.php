<?php
/* Smarty version 3.1.39, created on 2023-06-13 15:00:17
  from 'C:\Users\rpeczek\Desktop\zadania\task_01\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6488686179a5e8_75859502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87431a7c3ae1943cb5c5bbc80678d94302f10984' => 
    array (
      0 => 'C:\\Users\\rpeczek\\Desktop\\zadania\\task_01\\templates\\login.tpl',
      1 => 1686661214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6488686179a5e8_75859502 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 01 - Webmaster</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/theme_login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"><?php echo '</script'; ?>
>
</head>

<body>

    <div id="app">

        <img class="logo" src="/images/logo.svg" alt="Logo">

        <form id="loginForm" method="post" class="needs-validation" novalidate>
            <h1>Panel logowania</h1>

            <div class="mb-3">
                <label for="login" class="form-label">E-mail:</label>
                <input type="text" id="login" name="login" class="form-control" required>
                <div class="invalid-feedback">Pole E-mail jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Hasło:</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Pole hasło jest wymagane.</div>
            </div>
            <div class="mb-3">
                <button type="submit" class="login">Zaloguj</button>
            </div>
        </form>

    </div>
    <?php echo '<script'; ?>
 src="/js/jquery-3.6.0.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/tiny-slider.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/theme.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

 (function() {
        'use strict';

        // Walidacja formularza przy użyciu Bootstrapa
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();

    $(document).ready(function() {
        // Obsługa zdarzenia submit formularza logowania
        $('#loginForm').on('submit', function(e) {
            //Obsługa walidacji przez Bootstrapa
            if (!e.isDefaultPrevented()) {
                e.preventDefault();

                // Pobierz dane z formularza
                var login = $('#login').val();
                var password = $('#password').val();

                // Wyślij dane asynchronicznie do kontrolera logowania
                $.ajax({
                    url: 'http://localhost:8000/login',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        login: login,
                        password: password
                    },
                    success: function(response) {
                        if (response.success) {
                            // Zalogowano pomyślnie, przypisz token do elementu wrapującego
                            $('#wrapper').attr('data-token', response.token);
                            alert("Zalogowano pomyślnie");
                            console.log('Zalogowano pomyślnie');
                        } else {
                            // Błąd walidacji, wyświetl komunikat o błędzie
                            alert("Błąd walidacji");
                            console.log('Błąd walidacji: ' + response.message);
                        }
                    },
                    error: function() {
                    // Błąd żądania Ajax
                    alert("Błąd walidacji");
                    console.log('Wystąpił błąd podczas wysyłania żądania');
                }
                });
            }
        });
    });

    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
