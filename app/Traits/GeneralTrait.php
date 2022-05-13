<?php

namespace App\Traits;

trait GeneralTrait

{
    public function returnErrorMessage($msg)
    {
        return response()->json([
            'status'=>false,
            'msg'=>$msg
        ]);
    }


    public function returnSuccessMessage($msg,$key="",$value="")
    {
        return response()->json([
            'status'=>true,
            $key => $value,
            'msg'=>$msg
        ]);
    }


    public function returnData($key, $value ,$msg="")
    {
        return response()->json([
            'status'=>true,
            'msg'=>$msg,
            $key => $value
        ]);
    }

  

    public function returnValidationError($validator){

        return $this->returnErrorMessage( $validator->errors()->first());

    }
}


?>
