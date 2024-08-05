<?php 
namespace App\Traits;

trait ApiResponses
{

    protected function ok($message, $data = null, $code = 200){
        return $this->success($message, $data, $code);
    }


    public function success($message, $data = null, $code = 200)
    {
        return response()->json([
            'status' => '200',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function error($message, $code = 400)
    {
        return response()->json([
            'status' => '401',
            'message' => $message
        ], $code);
    }
}