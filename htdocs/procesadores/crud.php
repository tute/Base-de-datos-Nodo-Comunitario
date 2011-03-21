<?php
include('../inc.functions.php');

if (isset($_GET['delete'])) {
	mysql_query("DELETE FROM `procesadores` WHERE `id` = '$_GET[id]}'");
	$msg = (mysql_affected_rows() ? 'Row deleted.' : 'Nothing deleted.');
	header('Location: index.php?msg='.$msg);
}

$id = (isset($_GET['id']) ? $_GET['id'] : 0);
$action = ($id ? 'Editing' : 'Add new') . ' entry';

if (isset($_POST['submitted'])) {
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
	$sql = "REPLACE INTO `procesadores` (`id`, `ingreso`, `funciona`, `paso_test`, `capacidad`, `detalles`) VALUES ('$id', '$_POST[ingreso_year]-$_POST[ingreso_mth]-$_POST[ingreso_day]', '$_POST[funciona]', '$_POST[paso_test]', '$_POST[capacidad]', '$_POST[detalles]');";
	mysql_query($sql) or die(mysql_error());
	$msg = (mysql_affected_rows()) ? 'Edited row.' : 'Nothing changed.';
	header('Location: index.php?msg='.$msg);
}


print_header("NodoComunitario » Procesadores » $action");

$row = mysql_fetch_array ( mysql_query("SELECT * FROM `procesadores` WHERE `id` = '$id' "));
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
  <li><label><span>Paso Test:</span>
    <input type="checkbox" name="paso_test" value="1" <?= (isset($row['paso_test']) && $row['paso_test'] ? 'checked="checked"' : '') ?> /></label></li>
  <li><label><span>Capacidad:</span>
    <input type="text" name="capacidad" value="<?= (isset($row['capacidad']) ? stripslashes($row['capacidad']) : '') ?>" /></label></li>
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