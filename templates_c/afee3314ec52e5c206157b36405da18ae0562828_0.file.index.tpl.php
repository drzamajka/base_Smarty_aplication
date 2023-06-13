<?php
/* Smarty version 3.1.39, created on 2023-06-13 09:48:08
  from 'C:\Users\rpeczek\Desktop\zadania\task_01\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64881f38e7db71_59002268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afee3314ec52e5c206157b36405da18ae0562828' => 
    array (
      0 => 'C:\\Users\\rpeczek\\Desktop\\zadania\\task_01\\templates\\index.tpl',
      1 => 1686642486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64881f38e7db71_59002268 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="slider">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
    <div class="slider-item">
        <img src="images/p/<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
.jpg" alt="Profuct <?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
        <div><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</div>
        <div><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl ) );?>
</p>
        <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['specific_price']))) {?>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['product']->value['specific_price']['priceWithoutReduction']),$_smarty_tpl ) );?>
</p>
        <?php }?>
        </div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
            container: '.slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            autoplayButtonOutput: false,
            controls: true,
            nav: false
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
