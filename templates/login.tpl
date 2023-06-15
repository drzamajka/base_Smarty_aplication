<!DOCTYPE html>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div id="app">

        <img class="logo" src="/images/logo.svg" alt="Logo">

        <form id="loginForm" method="post" class="needs-validation" novalidate>
            <h1>Panel logowania</h1>

            <div class="form-outline">
                <label for="login" class="form-label">E-mail:</label>
                <input type="text" id="login" name="login" class="form-control" required>
                <div class="invalid-feedback">Pole E-mail jest wymagane.</div>
            </div>
            <div cclass="form-outline">
                <label for="password" class="form-label">Hasło:</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Pole hasło jest wymagane.</div>
            </div>
            <div class="mb-3">
                <button type="submit" class="login">Zaloguj</button>
            </div>
        </form>

    </div>
    <script src="/js/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/tiny-slider.js"></script>
    <script src="/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

    (function() {

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

    </script>
</body>

</html>