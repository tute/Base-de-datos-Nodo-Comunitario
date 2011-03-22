<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
<fieldset>
<legend><a href="#" onclick="$('#search-form').slideToggle()">Search</a></legend>
<div id="search-form" style="display:none">
<ul>
  <li><label><span>Nombre:</span>
    <?= search_options('nombre', (isset($_GET['nombre_opts']) ? stripslashes($_GET['nombre_opts']) : '')) ?></label>
    <input type="text" name="nombre" value="<?= (isset($_GET['nombre']) ? stripslashes($_GET['nombre']) : '') ?>" /></li>
  <li><label><span>Procesador Id:</span>
    <?= search_options('procesador_id', (isset($_GET['procesador_id_opts']) ? stripslashes($_GET['procesador_id_opts']) : '')) ?></label>
    <input type="text" name="procesador_id" value="<?= (isset($_GET['procesador_id']) ? stripslashes($_GET['procesador_id']) : '') ?>" /></li>
  <li><label><span>Disco Rigido:</span>
    <?= search_options('disco_rigido', (isset($_GET['disco_rigido_opts']) ? stripslashes($_GET['disco_rigido_opts']) : '')) ?></label>
    <input type="text" name="disco_rigido" value="<?= (isset($_GET['disco_rigido']) ? stripslashes($_GET['disco_rigido']) : '') ?>" /></li>
  <li><label><span>Memoria:</span>
    <?= search_options('memoria', (isset($_GET['memoria_opts']) ? stripslashes($_GET['memoria_opts']) : '')) ?></label>
    <input type="text" name="memoria" value="<?= (isset($_GET['memoria']) ? stripslashes($_GET['memoria']) : '') ?>" /></li>
  <li><label><span>Descartada:</span>
    <?= search_options('descartada', (isset($_GET['descartada_opts']) ? stripslashes($_GET['descartada_opts']) : '')) ?></label>
    <input type="checkbox" name="descartada" value="1" <?= (isset($_GET['descartada']) && $_GET['descartada'] ? 'checked="checked"' : '') ?> /></li>
  <li><label><span>Detalles:</span>
    <?= search_options('detalles', (isset($_GET['detalles_opts']) ? stripslashes($_GET['detalles_opts']) : '')) ?></label>
    <textarea name="detalles" cols="40" rows="10"><?= (isset($_GET['detalles']) ? stripslashes($_GET['detalles']) : '') ?></textarea></li>
</ul>
<p><input type="hidden" value="1" name="submitted" />
  <input type="submit" value="Search" /></p>
</div>
</fieldset>
</form>

<?php
$opts = array('id_opts', 'nombre_opts', 'procesador_id_opts', 'disco_rigido_opts', 'memoria_opts', 'descartada_opts', 'detalles_opts');
/* Sorround "contains" search term between %% */
foreach ($opts as $o) {
	if (isset($_GET[$o]) && $_GET[$o] == 'like') {
		$v = substr($o, 0, -5);
		$_GET[$v] = '%' . $_GET[$v] . '%';
	}
}

if (search_by('id'))
	$conds .= " AND id {$_GET['id_opts']} '{$_GET['id']}'";
if (search_by('nombre'))
	$conds .= " AND nombre {$_GET['nombre_opts']} '{$_GET['nombre']}'";
if (search_by('procesador_id'))
	$conds .= " AND procesador_id {$_GET['procesador_id_opts']} '{$_GET['procesador_id']}'";
if (search_by('disco_rigido'))
	$conds .= " AND disco_rigido {$_GET['disco_rigido_opts']} '{$_GET['disco_rigido']}'";
if (search_by('memoria'))
	$conds .= " AND memoria {$_GET['memoria_opts']} '{$_GET['memoria']}'";
if (search_by('descartada'))
	$conds .= " AND descartada {$_GET['descartada_opts']} '{$_GET['descartada']}'";
if (search_by('detalles'))
	$conds .= " AND detalles {$_GET['detalles_opts']} '{$_GET['detalles']}'";
?>