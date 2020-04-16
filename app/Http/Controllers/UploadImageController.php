<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs;

class UploadImageController extends Controller
{
    public function upload(Request $request)
    {
        $name = $request->file('file');
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $file->move('uploads',$file->getClientOriginalName());
            $details['url'] = 'uploads/'.$file->getClientOriginalName();
            $res = dispatch(new \App\Jobs\UploadImage($details));
            if($res){
                return redirect('/image-uploading');
            } 
            else
            {
                return redirect('/image-uploading');
            }
        } 
        else
        {
            return redirect('/image-uploading');
        }


    }
}
