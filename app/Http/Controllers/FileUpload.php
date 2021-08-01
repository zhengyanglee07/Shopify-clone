<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;


class FileUpload extends Controller
{
    public function fileStore(Request $request)
    {
        $upload_path = public_path('images/product-images');
        $file_name = $request->media->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->media->getClientOriginalExtension();
        $request->file->move($upload_path, $generated_new_name);
        
        // $insert['title'] = $file_name;
        
        return response()->json(['success' => 'You have successfully uploaded "' . $request->media . '"']);
    }
}
