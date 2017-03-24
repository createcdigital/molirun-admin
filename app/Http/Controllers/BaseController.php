<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use View;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BaseController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Base Controller
      |--------------------------------------------------------------------------
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->setApp();
    }

    /**
     * initialize
     */
    public function setApp() {

        // session user
        View::share('user', Auth::user());
    }


    /**
     * upload file
     *
     * @param $name
     * @return mixed
     */
    public function getPhotoUrl($name){

        $file = $this->request->file($name);

        $fileName = uniqid().md5_file($file);
        Storage::put($fileName, file_get_contents($file->getRealPath()));

        return Config::get('piccdn.url') . '/'.$fileName;
    }

    /**
     * @param $img_base64
     * @return string
     */
    public function getPictureUrlByBase64($img_base64)
    {
        $url = "";
        if(strpos($img_base64, "data:image") !== false)
        {
            if(isset($img_base64))
            {
                $fileName = md5_file($img_base64);
                Image::make($img_base64)->save(storage_path("app")."/".$fileName);

                $url = Config::get('piccdn.url') . '/'.$fileName;
            }
        }

        return $url;
    }
}
