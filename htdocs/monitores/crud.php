<?php
include('../inc.functions.php');

if (isset($_GET['delete'])) {
	mysql_query("DELETE FROM `monitores` WHERE `id` = '$_GET[id]}'");
	$msg = (mysql_affected_rows() ? 'Row deleted.' : 'Nothing deleted.');
	header('Location: index.php?msg='.$msg);
}

$id = (isset($_GET['id']) ? $_GET['id'] : 0);
$action = ($id ? 'Editing' : 'Add new') . ' entry';

if (isset($_POST['submitted'])) {
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
	$sql = "REPLACE INTO `monitores` (`id`, `ingreso`, `funciona`, `resolucion`, `pulgadas`, `marca`, `detalles`) VALUES ('$id', '$_POST[ingreso_year]-$_POST[ingreso_mth]-$_POST[ingreso_day]', '$_POST[funciona]', '$_POST[resolucion]', '$_POST[pulgadas]', '$_POST[marca]', '$_POST[detalles]');";
	mysql_query($sql) or die(mysql_error());
	$msg = (mysql_affected_rows()) ? 'Edited row.' : 'Nothing changed.';
	header('Location: index.php?msg='.$msg);
}


print_header("NodoComunitario » Monitores » $action");

$row = mysql_fetch_array ( mysql_query("SELECT * FROM `monitores` WHERE `id` = '$id' "));
?>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
<fieldset>
<legend>Add / Edit</legend>
<div>
<ul>
  <li><label><span>Ingreso:</span>
    <?= input_date('ingreso', (isset($row['ingreso']) ? stripslashes($row['ingreso']) : '')) ?></label></li>
  <li><label><span>Funciona:</span>
    <input type="checkbox" name="funciona" value="1" <?= (isset($row['funciona']) && $row['funciona'] ? 'checked="checked"' : '') ?> /></label></li>
  <li><label><span>Resolucion:</span>
    <input type="text" name="resolucion" value="<?= (isset($row['resolucion']) ? stripslashes($row['resolucion']) : '') ?>" /></label></li>
  <li><label><span>Pulgadas:</span>
    <input type="text" name="pulgadas" value="<?= (isset($row['pulgadas']) ? stripslashes($row['pulgadas']) : '') ?>" /></label></li>
  <li><label><span>Marca:</span>
    <input type="text" name="marca" value="<?= (isset($row['marca']) ? stripslashes($row['marca']) : '') ?>" /></label></li>
  <li><label><span>Detalles:</span>
    <input type="text" name="detalles" value="<?= (isset($row['detalles']) ? stripslashes($row['detalles']) : '') ?>" /></label></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Add / Edit" /></p>
</div>
</fieldset>
</form>
<?
print_footer();
?>