<?php

include 'tsp.php';
include 'peta.php';

$tsp = new TSP();
$tsp->setPeta($peta);

$id = $_REQUEST['id'];
// echo json_encode($tsp->start($id));

$data = array('status' => 'OK', 'data' => $tsp->start('sby'));
header('Content-Type: application/json');
echo json_encode($data);
// echo json_encode($tsp->start('cari'));

?>