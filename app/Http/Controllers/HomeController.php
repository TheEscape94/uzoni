<?php

namespace App\Http\Controllers;

use App\CompanyDetail;
use App\Town;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = App::getLocale();
        $user = Auth::user();

        if($user){
            if($user->is_company){
                $company = CompanyDetail::where("company_id", $user->id)->first();
                if($company->has_subscription == 0){
                    return redirect($lang . '/paketi');
                }
            }
        }

        $towns = Town::all();

        return view('home')->with(compact('towns'));
    }

    /**
     * Navigate to Terms and Conditions page.
     * TODO:: terms and conditions English version
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('otherPages.terms');
    }
}
