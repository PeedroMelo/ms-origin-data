<?php

namespace App\Helpers;

class QueryParametersSerializer
{
    public static function serializeParams($queryParams = [])
    {
        $serialized_params = [];

        $queryParams = explode('?', $queryParams);
        if (!isset($queryParams[1])) return $queryParams;

        $queryParams = explode('&', $queryParams[1]);
        foreach ($queryParams as $params) {
            $key_val = explode('=', $params);
            $serialized_params[$key_val[0]] = $key_val[1];
        }

        return $serialized_params;
    }
}
