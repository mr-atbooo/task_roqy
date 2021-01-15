<?php

namespace App\Traits;

Trait  GeneralTrait
{
     function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time() . rand(1, 99999) . rand(1, 99) .'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }
    /* start slug function */
    function make_slug($string = null, $separator = "-")
    {
        if (is_null($string)) {
            return "";
        }

        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Lower case everything
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
        $string = mb_strtolower($string, "UTF-8");;

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
//        $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
    /* end slug function */
    public function returnData($key, $value,$ncount, $msg = "")
    {
        return response()->json([
            'status' => true,
            'Num' => $ncount,
            'msg' => $msg,
            $key => $value
        ]);
    }
    public function returnError( $msg)
    {
        return response()->json([
            'status' => false,
            'msg' => $msg
        ]);
    }


}
