<?php

class Controller {
    public function index() {

        require_once __DIR__ . '/../views/index.php';
    }

    public static function getParamFromURL(array $data) {
        $return = [];
        $parameterData = explode("&", $data[1]);

        for($i = 0; $i < count($parameterData); $i++){
            if(str_contains($parameterData[$i], "=")){
                $parameterStringExplode = explode("=", $parameterData[$i]);
                $return[$parameterStringExplode[0]] = $parameterStringExplode[1];
            }
        }

        return $return;
    }
}
