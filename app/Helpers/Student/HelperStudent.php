<?php

namespace App\Helpers\Student;
use Auth;
use App\User;

class HelperStudent
{
    public static function studentInfoHandler($id)
    {
        $data = User::where('id',$id)->first();
        return $data;
    }
    
}

?>