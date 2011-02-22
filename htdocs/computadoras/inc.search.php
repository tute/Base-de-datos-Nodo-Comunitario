<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
<fieldset>
<legend><a href="#" onclick="$('#search-form').slideToggle()">Search</a></legend>
<div id="search-form" style="display:none">
<ul>
  <li><label><span>Procesador:</span>
    <?= search_options('procesador', (isset($_GET['procesador_opts']) ? stripslashes($_GET['procesador_opts']) : '')) ?></label>
    <input type="text" name="procesador" value="<?= (isset($_GET['procesador']) ? stripslashes($_GET['procesador']) : '') ?>" /></li>
  <li><label><span>Monitor:</span>
    <?= search_options('monitor', (isset($_GET['monitor_opts']) ? stripslashes($_GET['monitor_opts']) : '')) ?></label>
    <input type="text" name="monitor" value="<?= (isset($_GET['monitor']) ? stripslashes($_GET['monitor']) : '') ?>" /></li>
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
$opts = array('id_opts', 'procesador_opts', 'monitor_opts', 'detalles_opts');
/* Sorround "contains" search term between %% */
foreach ($opts as $o) {
	if (isset($_GET[$o]) && $_GET[$o] == 'like') {
		$v = substr($o, 0, -5);
		$_GET[$v] = '%' . $_GET[$v] . '%';
	}
}

if (search_by('id'))
	$conds .= " AND id {$_GET['id_opts']} '{$_GET['id']}'";
if (search_by('procesador'))
	$conds .= " AND procesador {$_GET['procesador_opts']} '{$_GET['procesador']}'";
if (search_by('monitor'))
	$conds .= " AND monitor {$_GET['monitor_opts']} '{$_GET['monitor']}'";
if (search_by('detalles'))
	$conds .= " AND detalles {$_GET['detalles_opts']} '{$_GET['detalles']}'";
?>