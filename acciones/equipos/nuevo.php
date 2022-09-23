<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$resp = new NuevoResponse();
$resp->IsOk = true;
$cantj =  0;


foreach ($req->ListJugadores as $j) {
    $cantj =  $cantj + 1;
}

if ($cantj < 1 OR $cantj > 5) {
    $resp->IsOk = false;
    $resp->Mensaje = 'El equipo posee ' . $cantj .  ' y debe poseer entre 1 y 5  jugadores';
}

echo json_encode($resp);