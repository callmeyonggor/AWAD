<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function store(Request $request)
    {
        if ( $request-> hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/storage/image' . $folder, $filename);
            
            return $folder;
        };

        return 1;
    }
}
