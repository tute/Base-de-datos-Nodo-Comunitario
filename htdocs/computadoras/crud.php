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
	$sql = "REPLACE INTO `computadoras` (`id`, `nombre`, `procesador_id`, `disco_rigido`, `memoria`, `descartada`, `detalles`) VALUES ('$id', '$_POST[nombre]', '$_POST[procesador_id]', '$_POST[disco_rigido]', '$_POST[memoria]', '$_POST[descartada]', '$_POST[detalles]');";
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
  <li><label><span>Nombre:</span>
    <input type="text" name="nombre" value="<?= (isset($row['nombre']) ? stripslashes($row['nombre']) : '') ?>" /></label></li>
  <li><label><span>Procesador Id:</span>
    <?= build_options('procesadores', 'nombre', 'procesadores_id', (isset($row['procesador_id']) ? stripslashes($row['procesador_id']) : '')) ?></label></li>
  <li><label><span>Disco Rigido:</span>
    <input type="text" name="disco_rigido" value="<?= (isset($row['disco_rigido']) ? stripslashes($row['disco_rigido']) : '') ?>" /></label></li>
  <li><label><span>Memoria:</span>
    <input type="text" name="memoria" value="<?= (isset($row['memoria']) ? stripslashes($row['memoria']) : '') ?>" /></label></li>
  <li><label><span>Descartada:</span>
    <input type="checkbox" name="descartada" value="1" <?= (isset($row['descartada']) && $row['descartada'] ? 'checked="checked"' : '') ?> /></label></li>
  <li><label><span>Detalles:</span>
    <textarea name="detalles" cols="40" rows="10"><?= (isset($row['detalles']) ? stripslashes($row['detalles']) : '') ?></textarea></label></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Add / Edit" /></p>
</div>
</fieldset>
</form>
<?
print_footer();
?>
