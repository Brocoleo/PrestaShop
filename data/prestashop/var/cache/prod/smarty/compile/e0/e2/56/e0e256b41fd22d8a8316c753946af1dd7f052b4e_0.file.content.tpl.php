<?php
/* Smarty version 3.1.39, created on 2021-05-13 15:46:59
  from '/var/www/html/adminleo/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609d823314d634_64056302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0e256b41fd22d8a8316c753946af1dd7f052b4e' => 
    array (
      0 => '/var/www/html/adminleo/themes/default/template/content.tpl',
      1 => 1619601862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609d823314d634_64056302 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
