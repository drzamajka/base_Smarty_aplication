<?php

require_once('vendor/autoload.php');
require_once('products.php');

$smarty = new Smarty();

$smarty->registerPlugin('function', 'displayPrice', 'display_price');
$smarty->assign([
    'products' => $products
]);
$smarty->display('index.tpl');

function display_price($params, $smarty, $cur = '€')
{
    $price = $params['price'];

    return number_format($price, 2) . '' . $cur;
}