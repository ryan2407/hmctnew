<?php


class UploadController extends \BaseController {


    function __construct()
    {
    }

    public function upload()
    {
        $file = Input::file('productImages');
        $filename  = str_random(16);
        $extension = $file->getClientOriginalExtension();
        $size      = $file->getSize();
        $fullName  = $filename.'.'.$extension;
        $upload_success = $file->move('uploads', $fullName);
        if( $upload_success ) {
            return Response::json(['name' => $fullName, 'size' => $size], 200);
        } else {
            return Response::json('error', 400);
        }
    }


}
