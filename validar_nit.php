<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$sUrlRest="http://testing.clasificados.com.co/ccma/TramitesVirtuales/TramitesVirtuales.wsa/ConsultarEmpresaRegistro.html";
$nitEmpresa = $_REQUEST['nit'];

$data_array =  array(
    "Identificacion" => $nitEmpresa
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_array));
curl_setopt($curl, CURLOPT_URL, $sUrlRest);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);
curl_close($curl);

$response = json_decode($result, true);

$respuesta = new stdClass();
$respuesta->codigo = $response['response']['codigo'];
$respuesta->mensaje = $response['response']['mensaje'];
$respuesta->TipoIdentificacion = isset($response['response']['resultados'][0]['TipoIdentificacion']) ? $response['response']['resultados'][0]['TipoIdentificacion'] : null;
$respuesta->Identificacion = isset($response['response']['resultados'][0]['Identificacion']) ? $response['response']['resultados'][0]['Identificacion'] : null;
$respuesta->DireccionEmpresa = isset($response['response']['resultados'][0]['DireccionEmpresa']) ? $response['response']['resultados'][0]['DireccionEmpresa'] : null;
$respuesta->Pais = isset($response['response']['resultados'][0]['Pais']) ? $response['response']['resultados'][0]['Pais'] : null;
$respuesta->Departamento = isset($response['response']['resultados'][0]['Departamento']) ? $response['response']['resultados'][0]['Departamento'] : null;
$respuesta->Municipio = isset($response['response']['resultados'][0]['Municipio']) ? $response['response']['resultados'][0]['Municipio'] : null;
$respuesta->NombreEmpresa = isset($response['response']['resultados'][0]['NombreEmpresa']) ? $response['response']['resultados'][0]['NombreEmpresa'] : null;
$respuesta->PrimerNombre = isset($response['response']['resultados'][0]['PrimerNombreUsuario']) ? $response['response']['resultados'][0]['PrimerNombreUsuario'] : null;
$respuesta->SegundoNombre = isset($response['response']['resultados'][0]['SegundoNombreUsuario']) ? $response['response']['resultados'][0]['SegundoNombreUsuario'] : null;
$respuesta->PrimerApellido = isset($response['response']['resultados'][0]['PrimerApellidoUsuario']) ? $response['response']['resultados'][0]['PrimerApellidoUsuario'] : null;
$respuesta->SegundoApellido = isset($response['response']['resultados'][0]['SegundoApellidoUsuario']) ? $response['response']['resultados'][0]['SegundoApellidoUsuario'] : null;
$respuesta->TipoVia = isset($response['response']['resultados'][0]['TipoVia']) ? $response['response']['resultados'][0]['TipoVia'] : null;
$respuesta->NumeroVia = isset($response['response']['resultados'][0]['NumeroVia']) ? $response['response']['resultados'][0]['NumeroVia'] : null;
$respuesta->AdicionalVia = isset($response['response']['resultados'][0]['AdicionalVia']) ? $response['response']['resultados'][0]['AdicionalVia'] : null;
$respuesta->NumeroCruce = isset($response['response']['resultados'][0]['NumeroCruce']) ? $response['response']['resultados'][0]['NumeroCruce'] : null;
$respuesta->Ubicacion = isset($response['response']['resultados'][0]['Ubicacion']) ? $response['response']['resultados'][0]['Ubicacion'] : null;
$respuesta->Telefono = isset($response['response']['resultados'][0]['Telefono']) ? $response['response']['resultados'][0]['Telefono'] : null;
$respuesta->AutorizaEnvioEmail = isset($response['response']['resultados'][0]['AutorizaEnvioEmail']) ? $response['response']['resultados'][0]['AutorizaEnvioEmail'] : null;
$respuesta->AutorizaEnvioSMS = isset($response['response']['resultados'][0]['AutorizaEnvioSMS']) ? $response['response']['resultados'][0]['AutorizaEnvioSMS'] : null;
$respuesta->EmailNotificacionEmpresa = isset($response['response']['resultados'][0]['EmailNotificacionEmpresa']) ? $response['response']['resultados'][0]['EmailNotificacionEmpresa'] : null;
echo json_encode($respuesta);