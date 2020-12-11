<?php
include 'config.php';

$commonCT = count($common);
$commons = [];
function commonCounter($database)
{
	global $common, $commonCT;
	for ($i=0; $i < $commonCT ; $i++)
	{
		$commons[] = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$common[$i]' AND TABLE_SCHEMA = '$database';";

	}
	return implode(" ", $commons);
}

// print_r(commonCounter($database1));

$dbc1 = createDBInstance($database1);
$query1 = commonCounter($database1);
// commonCounter($database1);
$columnCN1 = $dbc1 -> query($query1) -> fetchAll(PDO::FETCH_ASSOC);
$count1= count($columnCN1);

$dbc2 = createDBInstance($database2);
$query2 = commonCounter($database2);
$columnCN2 = $dbc2 -> query($query2) -> fetchAll(PDO::FETCH_ASSOC);
$count2= count($columnCN2);

$columns = [];
function columnsCounter($count, $columnCN)
{
	for ($i=0; $i < $count ; $i++)
	{ 
		$columns[] = array_values($columnCN[$i]);
	}
	return $columns;
}

$columnsDB1 = columnsCounter($count1, $columnCN1);
$columnsDB2 = columnsCounter($count2, $columnCN2);
$columnsIntersect = array_values(array_intersect($columnsDB1, $columnsDB2));
echo "Ortak Columnlar ==>><pre>";
print_r($columnsIntersect);
echo "</pre>";

function columnDiff($columnsDB1, $columnsDB2)
{
  $diff = array();
  foreach ($columnsDB1 as $value)
  {
    $diff[$value] = 1;
  }
  foreach ($columnsDB2 as $value)
  {
    unset($diff[$value]);
  }
  return array_keys($diff);
}

$columnsDiff1 = columnDiff($columnsDB1, $columnsDB2);
echo "<pre>";
echo "db1 de olup db2 de olmayanlar ==>>";

print_r($columnsDiff1);
echo "</pre><br>";

$columnsDiff2 = columnDiff($columnsDB2, $columnsDB1);
echo "<pre>";
echo "db2 de olup db1 de olmayanlar ==>>";

print_r($columnsDiff2);
echo "</pre>";

?>