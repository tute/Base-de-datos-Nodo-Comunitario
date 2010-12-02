<form action="" method="get">
<fieldset>
<legend><a href="#" onclick="$('#search-form').slideToggle()">Search</a></legend>
<div id="search-form" style="display:none">
<ul>
  <li><label><span>Ingreso:</span>
    <?= search_options('ingreso', $_GET['ingreso_opts']) ?></label>
    <?= input_date('ingreso', $_GET['ingreso']) ?></li>
  <li><label><span>Funciona:</span>
    <?= search_options('funciona', $_GET['funciona_opts']) ?></label>
    <input type="checkbox" name="funciona" value="1" <?= ($_GET['funciona'] == 1 ? 'checked="checked"' : '') ?> /></li>
  <li><label><span>Paso Test:</span>
    <?= search_options('paso_test', $_GET['paso_test_opts']) ?></label>
    <input type="checkbox" name="paso_test" value="1" <?= ($_GET['paso_test'] == 1 ? 'checked="checked"' : '') ?> /></li>
  <li><label><span>Capacidad:</span>
    <?= search_options('capacidad', $_GET['capacidad_opts']) ?></label>
    <input type="text" name="capacidad" value="<?= stripslashes($_GET['capacidad']) ?>" /></li>
  <li><label><span>Detalles:</span>
    <?= search_options('detalles', $_GET['detalles_opts']) ?></label>
    <input type="text" name="detalles" value="<?= stripslashes($_GET['detalles']) ?>" /></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Search" /></p>
</div>
</fieldset>
</form>

<?php
$opts = array('id_opts', 'ingreso_opts', 'funciona_opts', 'paso_test_opts', 'capacidad_opts', 'detalles_opts');
/* Sorround "contains" search term between %% */
foreach ($opts as $o) {
	if ($_GET[$o] == 'like') {
		$v = substr($o, 0, -5);
		$_GET[$v] = '%' . $_GET[$v] . '%';
	}
}

if (search_by('id'))
	$conds .= " AND id {$_GET['id_opts']} '{$_GET['id']}'";
if (search_by('ingreso'))
	$conds .= " AND ingreso {$_GET['ingreso_opts']} '{$_GET['ingreso']}'";
if (search_by('funciona'))
	$conds .= " AND funciona {$_GET['funciona_opts']} '{$_GET['funciona']}'";
if (search_by('paso_test'))
	$conds .= " AND paso_test {$_GET['paso_test_opts']} '{$_GET['paso_test']}'";
if (search_by('capacidad'))
	$conds .= " AND capacidad {$_GET['capacidad_opts']} '{$_GET['capacidad']}'";
if (search_by('detalles'))
	$conds .= " AND detalles {$_GET['detalles_opts']} '{$_GET['detalles']}'";
?>