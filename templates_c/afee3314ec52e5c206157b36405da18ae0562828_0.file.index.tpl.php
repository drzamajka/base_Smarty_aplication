<?php
/* Smarty version 3.1.48, created on 2023-06-15 10:22:05
  from 'C:\Users\rpeczek\Desktop\zadania\task_01\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_648aca2d0ae1d5_61081141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afee3314ec52e5c206157b36405da18ae0562828' => 
    array (
      0 => 'C:\\Users\\rpeczek\\Desktop\\zadania\\task_01\\templates\\index.tpl',
      1 => 1686649098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648aca2d0ae1d5_61081141 (Smarty_Internal_Template $_smarty_tpl) {
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
</head>

<body>

    <div id="app">


        <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>

<div class="header">
    <h1>Best Selers</h1>
</div>


<div class="slider-container">

    <button class="slider_button" id="prevButton"><img src="images/prev.svg" alt="prev" /></button>
    <button class="slider_button" id="nextButton"><img src="images/next.svg" alt="prev" /></button>
    <div class="my-slider">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <div class="my-slider">
                <div class="slider-item">
                    <div class="card">                
                        <img src="images/p/<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
.jpg" alt="Profuct <?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                        <p class="card_description"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</p>
                        <div>
                            <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['specific_price'])) && $_smarty_tpl->tpl_vars['product']->value['specific_price'] != false) {?>
                                <a class="price current-price-discount"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['product']->value['specific_price']['priceWithoutReduction']),$_smarty_tpl ) );?>
</a> 
                                <a class="price regular-price" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl ) );?>
</a>
                                <?php } else { ?>
                                <p class="price" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl ) );?>
</p>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>    
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    </div>    
</div>



        


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
>


    var slider = tns({
    container: '.my-slider',
    loop: true,
    items: 4,
    slideBy: 'page',
    nav: false,    
    autoplayButtonOutput: false,
    mouseDrag: true,
    controls: false,


  });

  // Pobierz przyciski z DOM
    var prevButton = document.getElementById('prevButton');
    var nextButton = document.getElementById('nextButton');

    // Dodaj obsługę kliknięcia do przycisków
    prevButton.addEventListener('click', function() {
    slider.goTo('prev');
    });

    nextButton.addEventListener('click', function() {
    slider.goTo('next');
    });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
