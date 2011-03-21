<?php
include('../inc.functions.php');

if (isset($_GET['delete'])) {
	mysql_query("DELETE FROM `computadoras` WHERE `id` = '$_GET[id]}'");
	$msg = (mysql_affected_rows() ? 'Row deleted.' : 'Nothing deleted.');
	header('Location: index.php?msg='.$msg);
}

$id = (isset($_GET['id']) ? $_GET['id'] : 0);
$action = ($id ? 'Editing' : 'Add new') . ' entry';

if (isset($_POST['submitted'])) {
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
	$sql = "REPLACE INTO `computadoras` (`id`, `detalles`, `procesador`, `monitor`) VALUES ('$id', '$_POST[detalles]', '$_POST[procesador]', '$_POST[monitor]');";
	mysql_query($sql) or die(mysql_error());
	$msg = (mysql_affected_rows()) ? 'Edited row.' : 'Nothing changed.';
	header('Location: index.php?msg='.$msg);
}


print_header("NodoComunitario » Computadoras » $action");

$row = mysql_fetch_array ( mysql_query("SELECT * FROM `computadoras` WHERE `id` = '$id' "));
?>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
<fieldset>
<legend>Add / Edit</legend>
<div>
<ul>
  <li><label><span>Detalles:</span>
    <textarea name="detalles" cols="40" rows="10"><?= (isset($row['detalles']) ? stripslashes($row['detalles']) : '') ?></textarea></label></li>
  <li><label><span>Procesador:</span>
    <input type="text" name="procesador" value="<?= (isset($row['procesador']) ? stripslashes($row['procesador']) : '') ?>" /></label></li>
  <li><label><span>Monitor:</span>
    <input type="text" name="monitor" value="<?= (isset($row['monitor']) ? stripslashes($row['monitor']) : '') ?>" /></label></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Add / Edit" /></p>
</div>
</fieldset>
</form>
<?
print_footer();
?>