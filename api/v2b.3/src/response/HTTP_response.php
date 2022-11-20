<?php

namespace App\response;

class HTTP_response
{

    public static function json(int $code, $data)
    {
        $response = array();

        switch (gettype($data)) {
            case 'object':
                $response = $data->jsonSerialize();
                break;
            case 'array':
                foreach ($data as $dto) {
                    $response[] = $dto->jsonSerialize();
                }
                break;
            case 'string':
                $response = [
                    'Message' => $data,
                    'Status' => $code
                ];
                break;
            default:
                break;
        }
        http_response_code($code);
        echo json_encode($response);
    }
}
