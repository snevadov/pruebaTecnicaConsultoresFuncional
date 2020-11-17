<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$sUrlRest="http://testing.clasificados.com.co/ccma/TramitesVirtuales/TramitesVirtuales.wsa/ConsultarMaestros.html";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sUrlRest);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = simplexml_load_string(curl_exec($ch));
curl_close($ch);

$respuesta = new stdClass();
$respuesta->municipios = isset($res->response->Municipios) ? $res->response->Municipios : null;
$respuesta->paises = isset($res->response->paises) ? $res->response->paises : null;
$respuesta->tiposVia = isset($res->response->tiposVia) ? $res->response->tiposVia : null;
$respuesta->tipos_identificacion = isset($res->response->tipos_identificacion) ? $res->response->tipos_identificacion : null;

echo json_encode($respuesta);