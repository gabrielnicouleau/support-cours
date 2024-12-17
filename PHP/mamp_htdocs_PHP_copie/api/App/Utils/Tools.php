<?php

namespace App\Utils;

class Tools
{
    public static function JsonResponse(array $data, int $status = 200) : void {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        http_response_code($status);
        echo json_encode($data);
    }

    public static function convertUTF8(string $chaine) : string {
        return mb_convert_encoding(
        $chaine, 
        to_encoding: "UTF-8", 
        from_encoding: mb_detect_encoding($chaine));
    }
}