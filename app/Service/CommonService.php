<?php

/**
 * @author : Tarek Monjur
 * @email : tarekmonjur@gmail.com
 * @copyright : codevelsoft.com
 */

namespace App\Service\Setup;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CommonService
{

    /**
     * @description set the ajax response message
     * @param array $message
     * @return \Illuminate\Http\JsonResponse
     * @author Tarek Monjur
     */
    protected function setReturnMessage($data,$status,$type,$code,$title,$message){
        $sendData['data'] = $data;
        $sendData['status'] = $status;
        $sendData['statusType'] = $type;
        $sendData['code'] = $code;
        $sendData['title'] = $title;
        $sendData['message'] = $message;
        return response()->json($sendData,$code);
    }


}
