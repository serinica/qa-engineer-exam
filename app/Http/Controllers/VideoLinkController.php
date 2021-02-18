<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
class VideoLinkController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }
    public function index(){
        return view('video');
    }
    public function saveVideoURL(Request $request){
      $request->validate([
          'video' => 'required|file'
      ]);

      $path = $request->file('video')->store('videos');

      return response()->json($path,200);
    }
    public function getVideoURL(){
        $files = Storage::allFiles('videos');
        $fileURL =[];
        foreach($files as $file){
            $file = asset($file);
            array_push($fileURL,$file);
        }
        return $fileURL;

    }
    public function getSingleVideo($request){
        $file = Storage::allFiles('videos');
        $file = Storage::get("videos/".$request);
        return $file;

    }
    public function passParam(){

    }
}
