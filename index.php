<?php

require_once('vendor/autoload.php');
require_once('products.php');
require 'AuthController.php';

$smarty = new Smarty();
$requestPath = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Własne mapowanie ścieżek do kontrolerów
switch ($requestPath) {
    case '/login':
        // Przekieruj na kontroler logowania uwzględniając metode wysyłki
        $authController = new AuthController();
        if($method == "GET"){
            $authController->create();
        }
        else{
            $authController->login(); 
        }
        break;

    default:
        $smarty->registerPlugin('function', 'displayPrice', 'display_price');
        $smarty->assign([
            'products' => $products
        ]);
        $smarty->display('index.tpl');
        break;
}





function display_price($params, $smarty, $cur = '€')
{
    $price = $params['price'];

    return number_format($price, 2) . '' . $cur;
}