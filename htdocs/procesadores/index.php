<?php
include('../inc.functions.php');

print_header('NodoComunitario » Procesadores');

if (isset($_GET['msg'])) echo '<p id="msg">'.$_GET['msg'].'</p>';

/* Default search criteria (may be overriden by search form) */
$conds = 'TRUE';
include('inc.search.php');

/* Default paging criteria (may be overriden by paging functions) */
$start     = 0;
$per_page  = 50;
$count_sql = 'SELECT COUNT(id) AS tot FROM `procesadores` WHERE ' . $conds;
include('../inc.paging.php');

/* Get selected entries! */
$sql = "SELECT * FROM `procesadores` WHERE $conds " . get_order('procesadores') . " LIMIT $start,$per_page";

echo '<table>
  <tr>
    <th>Id ' . put_order('id') . '</th>
    <th>Ingreso ' . put_order('ingreso') . '</th>
    <th>Funciona ' . put_order('funciona') . '</th>
    <th>Paso Test ' . put_order('paso_test') . '</th>
    <th>Capacidad ' . put_order('capacidad') . '</th>
    <th>Detalles ' . put_order('detalles') . '</th>
    <th colspan="2" style="text-align:center">Actions</th>
  </tr>
';

$r = mysql_query($sql) or trigger_error(mysql_error());
while($row = mysql_fetch_array($r)) {
	echo '  <tr>
    <td>' . htmlentities($row['id']) . '</td>
    <td>' . htmlentities(humanize($row['ingreso'])) . '</td>
    <td>' . ($row['funciona'] ? 'Yes' : 'No') . '</td>
    <td>' . ($row['paso_test'] ? 'Yes' : 'No') . '</td>
    <td>' . htmlentities($row['capacidad']) . '</td>
    <td>' . htmlentities($row['detalles']) . '</td>
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