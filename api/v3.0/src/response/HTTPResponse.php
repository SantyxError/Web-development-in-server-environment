<?php

namespace App\response;

class HTTPResponse
{

    public static function json(int $codigo, $data)
    {
        $response = null;

        switch (gettype($data)) {
            case 'array':
                foreach ($data as $dto) {
                    $response[] = $dto->jsonSerialize();
                }
                break;
            case 'object':
                $response = $data->jsonSerialize();
                break;
            case 'string':
                $response = ['message' => $data, 'status' => $codigo];
                break;

            default:
                # code...
                break;
        }

        http_response_code($codigo);
        echo json_encode($response);
    }
}
