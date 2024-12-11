<?php 

namespace Chatgpt;

class ApiGPT {
    // Función para realizar una solicitud a la API
    public static function callApi($url, $api_key, $request_data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $api_key",
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));
    
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        if ($http_code !== 200) {
            return ["status" => "error", "details" => $response];
        }
    
        return ["status" => "success", "response" => json_decode($response, true)];
    }

}

?>