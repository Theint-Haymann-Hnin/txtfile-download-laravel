<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class JSONController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data1 = "Hello World.";
        $data2 = "Hi , Everyone";
        $data = $data1 . "\r\n" . $data2;
        $file = time() . rand() . '_file.txt';
        $destinationPath = public_path() . "/upload/";
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        File::put($destinationPath . $file, $data);
        return response()->download($destinationPath . $file);
    }
    public function test()
    {
        return view("test");
    }
}
