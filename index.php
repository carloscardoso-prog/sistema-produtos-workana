<?php

require_once  __DIR__ . '/controllers/Controller.php';

// Get the current request's URI
$requestUri = $_SERVER['REQUEST_URI'];

$arrayParametersURL = Controller::getParamFromURL(explode('?', $requestUri));

// Remove the query string from the URI (if present)
$requestUri = explode('?', $requestUri)[0];

// Split the URI into segments using the slash as a delimiter
$uriSegments = explode('/', $requestUri);

// Obtain the controller and method names from the URI segments
$controllerName = isset($uriSegments[1]) ? ucfirst($uriSegments[1]) . 'Controller' : 'HomeController';
$methodName = isset($uriSegments[2]) ? $uriSegments[2] : 'index';
$methodName = str_contains($uriSegments[2], 'dados') !== false ? "listarDadoUnico" : $methodName; 

// Path to the controllers
$controllerPath = __DIR__ . '/controllers/' . $controllerName . '.php';

// Check if the controller file exists
if (file_exists($controllerPath)) {
    // Include the controller file
    require_once $controllerPath;

    // Create an instance of the controller
    $controllerInstance = new $controllerName();

    // Check if the method exists in the controller
    if (method_exists($controllerInstance, $methodName)) {
        // Call the corresponding method in the controller
        $controllerInstance->$methodName($arrayParametersURL);
    } else {
        // Method not found, redirect to a page not found (404)
        http_response_code(404);
        echo 'Page Not Found';
    }
} else {
    // Controller not found, redirect to a page not found (404)
    http_response_code(404);
    echo 'Page Not Found';
}