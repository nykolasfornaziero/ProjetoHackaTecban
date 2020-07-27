<?php


class Conn
{
    public function getApi($url){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSLCERT => dirname(__FILE__)."/certs/client_certificate.crt",
            CURLOPT_SSLKEY => dirname(__FILE__)."/certs/client_private_key.key",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "x-fapi-financial-id: c3c937c4-ab71-427f-9b59-4099b7c680ab",
                "x-fapi-interaction-id: 1495ad89-0eca-4685-9acd-39051c9133a1",
                "Authorization: Bearer 52e018a6-bd10-47cd-90c7-891da92094d5"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}