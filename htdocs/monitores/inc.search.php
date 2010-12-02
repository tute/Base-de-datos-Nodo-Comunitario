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
  <li><label><span>Resolucion:</span>
    <?= search_options('resolucion', $_GET['resolucion_opts']) ?></label>
    <input type="text" name="resolucion" value="<?= stripslashes($_GET['resolucion']) ?>" /></li>
  <li><label><span>Pulgadas:</span>
    <?= search_options('pulgadas', $_GET['pulgadas_opts']) ?></label>
    <input type="text" name="pulgadas" value="<?= stripslashes($_GET['pulgadas']) ?>" /></li>
  <li><label><span>Marca:</span>
    <?= search_options('marca', $_GET['marca_opts']) ?></label>
    <input type="text" name="marca" value="<?= stripslashes($_GET['marca']) ?>" /></li>
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
$opts = array('id_opts', 'ingreso_opts', 'funciona_opts', 'resolucion_opts', 'pulgadas_opts', 'marca_opts', 'detalles_opts');
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
if (search_by('resolucion'))
	$conds .= " AND resolucion {$_GET['resolucion_opts']} '{$_GET['resolucion']}'";
if (search_by('pulgadas'))
	$conds .= " AND pulgadas {$_GET['pulgadas_opts']} '{$_GET['pulgadas']}'";
if (search_by('marca'))
	$conds .= " AND marca {$_GET['marca_opts']} '{$_GET['marca']}'";
if (search_by('detalles'))
	$conds .= " AND detalles {$_GET['detalles_opts']} '{$_GET['detalles']}'";
?>