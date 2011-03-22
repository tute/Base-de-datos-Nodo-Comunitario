<?php
include('../inc.functions.php');

print_header('NodoComunitario » Computadoras');

if (isset($_GET['msg'])) echo '<p id="msg">'.$_GET['msg'].'</p>';

/* Default search criteria (may be overriden by search form) */
$conds = 'TRUE';
include('inc.search.php');

/* Default paging criteria (may be overriden by paging functions) */
$start     = 0;
$per_page  = 50;
$count_sql = 'SELECT COUNT(id) AS tot FROM `computadoras` WHERE ' . $conds;
include('../inc.paging.php');

/* Get selected entries! */
$sql = "SELECT * FROM `computadoras` WHERE $conds " . get_order('computadoras') . " LIMIT $start,$per_page";

echo '<table>
  <tr>
    <th>Id ' . put_order('id') . '</th>
    <th>Nombre ' . put_order('nombre') . '</th>
    <th>Procesador ' . put_order('procesador_id') . '</th>
    <th>Disco Rigido ' . put_order('disco_rigido') . '</th>
    <th>Memoria ' . put_order('memoria') . '</th>
    <th>Descartada ' . put_order('descartada') . '</th>
    <th>Detalles ' . put_order('detalles') . '</th>
    <th colspan="2" style="text-align:center">Actions</th>
  </tr>
';

$r = mysql_query($sql) or trigger_error(mysql_error());
while($row = mysql_fetch_array($r)) {
	echo '  <tr>
    <td>' . htmlentities($row['id']) . '</td>
    <td>' . htmlentities($row['nombre']) . '</td>
    <td>' . get_data('procesadores', 'nombre', $row['procesador_id']) . '</td>
    <td>' . htmlentities($row['disco_rigido']) . '</td>
    <td>' . htmlentities($row['memoria']) . '</td>
    <td>' . ($row['descartada'] ? 'Yes' : 'No') . '</td>
    <td>' . htmlentities(limit_chars(nl2br($row['detalles']))) . '</td>
    <td><a href="crud.php?id=' . $row['id'] . '">Edit</a></td>
    <td><a href="crud.php?delete=1&amp;id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
  </tr>' . "
";
}

echo "</table>\n\n";

include('../inc.paging.php');

echo '<p><a href="crud.php">New entry</a></p>';

print_footer();
?>
