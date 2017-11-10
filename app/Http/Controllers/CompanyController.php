<?php

namespace App\Http\Controllers;

use App\CompanyDetail;
use App\Http\Controllers\Controller;
use App\SubCategories;
use App\Town;
use App\WorkingHours;
use App\User;
use App\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{

    public function profile(Request $request){
        $user = Auth::user();
        if(!$user) {
            return redirect('/');
        }
        $company = User::find($user->id);

        if(!$company || $company->is_company == 0){
            return redirect('/');
        }

        $companyDetail = CompanyDetail::with('hours')->where('company_id', $user->id)->with('user')->get()->first();
        $optionalImages = ImageModel::where('user_id', $user->id)->get();

        // Using for printing working hours
        $weekdays = ['mon' => 'wy.monday', 'tue'  => 'wy.tuesday', 'wed' => 'wy.wednesday', 'thu' => 'wy.thursday', 'fri' => 'wy.friday', 'sat' => 'wy.saturday', 'sun' => 'wy.sunday'];
        return view('company.profile')->with(compact('companyDetail', 'optionalImages', 'weekdays'));
    }

    public function show($lang, $id){

        $companyDetail = CompanyDetail::with('hours', 'townRelation', 'town2Relation', 'town3Relation', 'categoryRelation', 'category2Relation', 'category3Relation')->where('id', $id)->get();
        $companyDetail = $companyDetail[0];
        $user = Auth::user();

        $optionalImages = ImageModel::where('user_id', $companyDetail->company_id)->get();

         // Using for printing working hours
        $weekdays = ['mon' => 'wy.monday', 'tue'  => 'wy.tuesday', 'wed' => 'wy.wednesday', 'thu' => 'wy.thursday', 'fri' => 'wy.friday', 'sat' => 'wy.saturday', 'sun' => 'wy.sunday'];

        return view('company.profile')->with(compact('companyDetail', 'optionalImages', 'weekdays'));
    }

    public function edit(){
        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        $company = User::find($user->id);
 
        if(!$company || $company->is_company == 0){
            return redirect('/');
        }

        $towns = Town::all();
        $subGroups = SubCategories::all();
        $companyDetail = CompanyDetail::with('hours')->where('company_id', $user->id)->get()->first();

        // Using for printing working hours
        $weekdays = ['mon' => 'wy.monday', 'tue'  => 'wy.tuesday', 'wed' => 'wy.wednesday', 'thu' => 'wy.thursday', 'fri' => 'wy.friday', 'sat' => 'wy.saturday', 'sun' => 'wy.sunday'];

        return view('company.edit')->with(compact('towns', 'subGroups', 'companyDetail', 'weekdays'));
    }

    public function update(Request $request){
        $user = Auth::user();

        if(!$user) {
            return redirect('/');
        }

        $companyDetail = CompanyDetail::with('hours')->where('company_id', $user->id)->get()->first();
        $company = User::find($user->id);

        if(!$company || $company->is_company == 0){
            return redirect('/');
        }

        $companyDetail->company_name = $request->request->get("company_name");
        $companyDetail->category = $request->request->get("category");
        $companyDetail->category_2 = $request->request->get("category_2");
        $companyDetail->category_3 = $request->request->get("category_3");
        $companyDetail->website = $request->request->get("website");
        $companyDetail->facebook = $request->request->get("facebook");
        $companyDetail->twitter = $request->request->get("twitter");
        $companyDetail->working_hours = NULL;
        $companyDetail->description = $request->request->get("description");
        $companyDetail->town = $request->request->get("town");
        $companyDetail->address = $request->request->get("address");
        $companyDetail->phone = $request->request->get("phone");
        $companyDetail->town_2 = $request->request->get("town_2");
        $companyDetail->address_2 = $request->request->get("address_2");
        $companyDetail->phone_2 = $request->request->get("phone_2");
        $companyDetail->town_3 = $request->request->get("town_3");
        $companyDetail->address_3 = $request->request->get("address_3");
        $companyDetail->phone_3 = $request->request->get("phone_3");
        $companyDetail->first_lat = $request->request->get("first_lat");
        $companyDetail->first_lng = $request->request->get("first_lng");
        $companyDetail->second_lat = $request->request->get("second_lat");
        $companyDetail->second_lng = $request->request->get("second_lng");
        $companyDetail->third_lat = $request->request->get("third_lat");
        $companyDetail->third_lng = $request->request->get("third_lng");
        $companyDetail->nonstop = $request->request->get("nonstop") ? 1 : 0;
        $companyDetail->home_delivery = $request->request->get("home_delivery") ? 1 : 0;
        $companyDetail->online_banking = $request->request->get("online_banking") ? 1 : 0;
        if ($request->request->get("youtube_1") != null && $request->request->get("youtube_1") != ""){
            $companyDetail->youtube_1 = "https://www.youtube.com/embed/" . explode("?", explode("?v=", $request->request->get("youtube_1"))[1])[0];
        }
        if ($request->request->get("youtube_2") != null && $request->request->get("youtube_2") != ""){
            $companyDetail->youtube_2 = "https://www.youtube.com/embed/" . explode("?", explode("?v=", $request->request->get("youtube_2"))[1])[0];
        }
        
        $companyDetail->save();

        return redirect('/rs/profil-kompanije');
    }

    /**
     * Save working hours AJAX
     * This function is saving working hours from working-hours-popup
     */
    public function hours(Request $request) {
        $weekday = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

        $user = Auth::user();
        $companyDetail = CompanyDetail::where('company_id', $user->id)->get()->first();
        $company = User::find($user->id);
        $success = true;

        if(!$company || $company->is_company == 0){
            $success = false;
            $message = "You must be logged in!";
            $response = compact('message', 'success');
            return response()
                ->json($response);
        }

        WorkingHours::where('company_det_id', $companyDetail->id)->delete();

        foreach ($weekday as $key) {
            $from = NULL;
            $to = NULL;
            if(!empty($request->request->get($key."-from"))) {
                $from = $request->request->get($key."-from");
            }
            if(!empty($request->request->get($key."-from"))) {
                $to = $request->request->get($key."-to");
            }
            $workingHours = new WorkingHours;
            $workingHours->company_det_id = $companyDetail->id;
            $workingHours->working_from = $from;
            $workingHours->working_to = $to;
            $workingHours->weekday = $key;
            $workingHours->save();
        }

        // Success message working hours are saved
        $message = "Working Hours are saved";
        $response = compact('message', 'success');
        return response()
            ->json($response);
    }

    public function images(Request $request){
        $user = Auth::user();

        $company = User::find($user->id);

        if(!$company || $company->is_company == 0){
            return redirect('/');
        }

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

            $company->user_image = $path;
            $company->save();
        }

        if ($request->optionalImage){

            $path = $request->file('optionalImage')->store('images', 'public');
            $imagePath = storage_path('app/public'). '/' .$path;

            $img = Image::make($imagePath);
            //$img->crop(260, 260);
            $img->insert('img/watermark-1.png', 'bottom-right');
            $img->save($imagePath);

            $image = new ImageModel();

            $image->user_image = $path;
            $image->user_id = $user->id;

            $image->save();
            $request->session()->flash('uploaded_image', 'Image uploaded');
        }

        return redirect('/rs/profil-kompanije');
    }

    public function deleteimage($id){
        $image = ImageModel::find($id);

        if (isset($image)){
            if ($image->delete()){
                return redirect('/rs/profil-kompanije');
            }
        }

        return redirect('/rs/profil-kompanije');
    }
}