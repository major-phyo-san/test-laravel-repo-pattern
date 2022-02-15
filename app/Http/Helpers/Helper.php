<?php

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Storage;

if(!function_exists('Model')){
    function Model($model){
        return Relation::getMorphedModel($model);
    }
}

if(!function_exists('UserData')){
    function UserData(){
        //return  auth('api')->user();
        return  (auth('web')->user())?:auth('api')->user();
    }
}

if(!function_exists('CurrentTime')){
    function CurrentTime(){
        return  now()->format('Y-m-d H:i:s');
    }
}

if(!function_exists('JsonDecode')){
    function JsonDecode($raw_data){
        $input_items = stripslashes($raw_data);
        $json_data = json_decode( $input_items, true );
        if($json_data == null){
            responseStatus('input data is not corrected',402);
        }
        return $json_data;
    }
}

if(!function_exists('FirstWord')){
    function FirstWord($code){
       return intval(substr($code, 0, 1));
    }
}

if(!function_exists('UnsetData')){
    function UnsetData($data,$attributes){
       foreach ($attributes as $attribute){
           unset($data[$attribute]);
       }
       return $data;
    }
}

if(!function_exists('DownloadImage')){
    function DownloadImage($name){
        $exists = Storage::disk('s3')->has('images/'.$name);
        return ($exists)  ?
            Storage::disk('s3')->response('images/' . $name) :
            responseStatus('Image is not found',404);
    }
}

if(!function_exists('UploadImage')){
    function UploadImage($request,$image_name){
        $path =  $request->file($image_name)->store('images', 's3');
        return basename($path);
    }
}

if(!function_exists('DeleteImage')){
    function DeleteImage($image_name){
        Storage::disk('s3')->delete('images/'. $image_name);

    }
}

if(!function_exists('RandomDigits')){
    function RandomDigits(){
        return rand(1111,9999);
    }
}

if(!function_exists('IntendedURL')){
    function IntendedURL($request){
        $request->session()->regenerate();
        return redirect()->intended('/default')->getTargetUrl();
    }
}

