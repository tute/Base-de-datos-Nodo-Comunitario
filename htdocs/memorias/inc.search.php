<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
<fieldset>
<legend><a href="#" onclick="$('#search-form').slideToggle()">Search</a></legend>
<div id="search-form" style="display:none">
<ul>
  <li><label><span>Ingreso:</span>
    <?= search_options('ingreso', (isset($_GET['ingreso_opts']) ? stripslashes($_GET['ingreso_opts']) : '')) ?></label>
    <?= input_date('ingreso', (isset($_GET['ingreso']) ? stripslashes($_GET['ingreso']) : '')) ?></li>
  <li><label><span>Funciona:</span>
    <?= search_options('funciona', (isset($_GET['funciona_opts']) ? stripslashes($_GET['funciona_opts']) : '')) ?></label>
    <input type="checkbox" name="funciona" value="1" <?= (isset($_GET['funciona']) && $_GET['funciona'] ? 'checked="checked"' : '') ?> /></li>
  <li><label><span>Paso Test:</span>
    <?= search_options('paso_test', (isset($_GET['paso_test_opts']) ? stripslashes($_GET['paso_test_opts']) : '')) ?></label>
    <input type="checkbox" name="paso_test" value="1" <?= (isset($_GET['paso_test']) && $_GET['paso_test'] ? 'checked="checked"' : '') ?> /></li>
  <li><label><span>Capacidad:</span>
    <?= search_options('capacidad', (isset($_GET['capacidad_opts']) ? stripslashes($_GET['capacidad_opts']) : '')) ?></label>
    <input type="text" name="capacidad" value="<?= (isset($_GET['capacidad']) ? stripslashes($_GET['capacidad']) : '') ?>" /></li>
  <li><label><span>Detalles:</span>
    <?= search_options('detalles', (isset($_GET['detalles_opts']) ? stripslashes($_GET['detalles_opts']) : '')) ?></label>
    <input type="text" name="detalles" value="<?= (isset($_GET['detalles']) ? stripslashes($_GET['detalles']) : '') ?>" /></li>
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
	if (isset($_GET[$o]) && $_GET[$o] == 'like') {
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