<?php

require_once('vendor/autoload.php');
// Załądaowania dostępu do pliku env

// Adaptacja do php 5.4.* wymagała zmiany ponizszych linijek
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

class AuthController
{
    public function create()
    {
        $smarty = new Smarty();
        $smarty->display('login.tpl');
    }

    public function login()
    {
        $response = array();

        // Pobierz dane z formularza logowania
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Sprawdź poprawność danych logowania
        $validLogin = $_ENV['LOGIN_USERNAME'];
        $validPassword = $_ENV['LOGIN_PASSWORD'];

        if ($login === $validLogin && $password === $validPassword) {
            // Dane logowania poprawne, generuj token JWT
            $token = bin2hex(random_bytes(16));

            // Zwróć odpowiedź z sukcesem i tokenem
            $response['success'] = true;
            $response['message'] = 'Zalogowano pomyślnie';
            $response['token'] = $token;
        } else {
            // Błąd walidacji
            http_response_code(422);
            $response['success'] = false;
            $response['message'] = 'Błąd walidacji';
        }

        // Zwróć odpowiedź jako JSON
        echo json_encode($response);
    }

}