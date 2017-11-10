<?php

namespace App\Http\Controllers;

use App\CompanyDetail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
{
    public function packages(){
        $user = Auth::user();
        $lang = App::getLocale();

        if($user){
            if($user->is_company){
                $company = CompanyDetail::where("company_id", $user->id)->first();

                if($company->has_subscription == 0){
                    return view('otherPages.packages');
                }
            }
        }

        return redirect($lang . '/pocetna');
    }
}
