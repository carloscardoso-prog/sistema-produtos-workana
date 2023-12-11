<?php

require_once  __DIR__ . '/controllers/Controller.php';

$requestUri = $_SERVER['REQUEST_URI'];

$arrayParametersURL = Controller::getParamFromURL(explode('?', $requestUri));

$requestUri = explode('?', $requestUri)[0];

$uriSegments = explode('/', $requestUri);


$controllerName = !empty($uriSegments[1]) ? ucfirst($uriSegments[1]) . 'Controller' : 'Controller';
$methodName = 'index';

if (!empty($uriSegments[2])) {
    $methodName = str_contains($uriSegments[2], 'dados') !== false ? "listarDadoUnico" : $uriSegments[2];
}

$methodName = str_replace("-", "_", $methodName);

$controllerPath = __DIR__ . '/controllers/' . $controllerName . '.php';

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
