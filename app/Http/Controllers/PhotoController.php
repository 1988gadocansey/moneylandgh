<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgrammeModel;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PhotoController extends Controller
{

    /**
     * Create a new controller instance.
     *

     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function uploadPhoto(Request $request){
        $this->validate($request, [
            //'picture' => 'required|image|image_size:240,180|image_aspect:1',
            //'picture' => 'required|image|image_size:240,180',

        ]);
        $valid_exts = array('jpeg', 'jpg'); // valid extensions
        $max_size = 400000; // max file size
        $file = $request->file('picture');
        $ext = strtolower($request->file('picture')->getClientOriginalExtension());
        $applicantID = @\Auth::user()->id;
        $applicantNO = @\Auth::user()->username;
        if (in_array($ext, $valid_exts)) {
            if (!empty($file)) {

                if ($_FILES['picture']['size'] <= $max_size) {

                    $savepath = 'public/albums/students/';


                        $path = $savepath . $applicantNO . '.' . $ext;


                    if ($request->file('picture')->move($savepath, $path)) {
                        $applicantPhoto=@\Auth::user()->username;
                        // open file a image resource
                        if($applicantPhoto>0){
                            $img = \Image::make('public/albums/students/'.$applicantPhoto.'.jpg');


                            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
                            $img->fit(240, 180);

                            // crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
                            $img->fit(200);

                            // add callback functionality to retain maximal original image size
                            $img->fit(800, 600, function ($constraint) {
                                $constraint->upsize();
                            });

                        }

                        return redirect()->back()->with("success", " <span style='font-weight:bold;font-size:13px;'>Ayekoo photo uploaded succesfully</span> ");
                    }
                } else {
                    return redirect()->back()->with("error", " <span style='font-weight:bold;font-size:13px;'>Please upload only photos with size less than or equal to 500kb!!!!</span> ");
                }
            }else {
                return redirect()->back()->with("error", " <span style='font-weight:bold;font-size:13px;'>Please select photo to upload!!!!</span> ");
            }
        } else {
            return redirect()->back()->with("error", " <span style='font-weight:bold;font-size:13px;'>Only .jpg or .jpeg photo format is allowed  !</span> ");
        }
    }
}