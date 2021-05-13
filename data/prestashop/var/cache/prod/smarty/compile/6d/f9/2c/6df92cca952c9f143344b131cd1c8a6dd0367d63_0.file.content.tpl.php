<?php
/* Smarty version 3.1.39, created on 2021-05-13 00:14:13
  from '/var/www/html/administrador/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609ca795e3b7a3_04834250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6df92cca952c9f143344b131cd1c8a6dd0367d63' => 
    array (
      0 => '/var/www/html/administrador/themes/new-theme/template/content.tpl',
      1 => 1619601862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609ca795e3b7a3_04834250 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
