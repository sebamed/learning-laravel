<?php

    use Illuminate\Http\Exceptions\HttpResponseException;

    function throwException($status = 400, $message = "", $path = "/") {
        throw new HttpResponseException(response()->json([
            'error_message' => $message,
            'status_code' => $status,
            'requested_path' => $path
        ]), $status);
    }