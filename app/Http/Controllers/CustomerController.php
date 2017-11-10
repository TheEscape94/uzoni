<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function profile(Request $request){
        $user = User::find(Auth::user()->id);

        if ($request->userImage){

            $path = $request->file('userImage')->store('images', 'public');
            $imagePath = storage_path('app/public'). '/' .$path;

            $img = Image::make($imagePath);

            if ($img->width() > $img->height()){
                $img->fit($img->height());
            }

            if ($img->height() > $img->width()){
                $img->fit($img->width());
            }

            $img->resize(96, 96);
            $img->save($imagePath);

            $user->user_image = $path;
            $user->save();
        }

        return view('customer.profile')->with(compact('user'));
    }

    public function messages(){

        return view('customer.messages');
    }
}