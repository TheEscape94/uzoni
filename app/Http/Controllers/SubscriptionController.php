<?php
namespace App\Http\Controllers;

use App\CompanyDetail;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function choose($lang, $package){
        $user = Auth::user();

        if($user){
            if($user->is_company){
                $company = CompanyDetail::where("company_id", $user->id)->first();

                if($company->has_subscription == 0){
                    $company->has_subscription = $package;
                    $company->save();
                }
            }
        }

        return redirect("/" . $lang . "/pocetna");
    }

    public function set(Request $request, $lang, $package){
        $user = Auth::user();
        $userId = $user->getAuthIdentifier();

        $company = User::find($userId);
        $company->has_subscription = $package;
        $company->save();

        return redirect('/'. $lang . "/pocetna");

    }
}
