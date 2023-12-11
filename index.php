<?php
session_start();

require_once  __DIR__ . '/controllers/Controller.php';
require_once  __DIR__ . '/controllers/UsuarioController.php';

$requestUri = $_SERVER['REQUEST_URI'];

$arrayParametersURL = Controller::getParamFromURL(explode('?', $requestUri));

$requestUri = explode('?', $requestUri)[0];

$uriSegments = (!isset($_SESSION['usuarioLoginRecente']))? explode('/', $requestUri) : "";

$controllerName = !empty($uriSegments[1])? ucfirst($uriSegments[1]) . 'Controller' : 'Controller';

if(!empty($uriSegments[1]) && $uriSegments[1] == "index.php"){
    $controllerName = "Controller";
}

$methodName = 'index';

if (!empty($uriSegments[2])) {
    $methodName = str_contains($uriSegments[2], 'dados') !== false ? "listarDadoUnico" : $uriSegments[2];
}

$methodName = str_replace("-", "_", $methodName);

$controllerPath = __DIR__ . '/controllers/' . $controllerName . '.php';

if (!isset($_SESSION['usuario'])) {
    UsuarioController::usuario_login([]);
}

unset($_SESSION['usuarioLoginRecente']);

if (file_exists($controllerPath)) {
    require_once $controllerPath;

    $controllerInstance = new $controllerName();

    if (method_exists($controllerInstance, $methodName)) {
        $controllerInstance->$methodName($arrayParametersURL);
    } else {
        http_response_code(404);
        echo 'Page Not Found';
    }
} else {
    http_response_code(404);
    echo 'Page Not Found';
}
