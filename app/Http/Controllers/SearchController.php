<?php

namespace App\Http\Controllers;


use App\CompanyDetail;
use App\MainCategories;
use App\Town;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function subcategory($lang, $subgroup){
        $towns = Town::all();

        $query = CompanyDetail::with('user', 'hours')->where('category', $subgroup);
        $query = $query->orWhere('category_2', $subgroup);
        $query = $query->orWhere('category_3', $subgroup);

        $data = $query->get();
        $day = strtolower(date('D'));
        $time = date('H:i'); 

        return view('otherPages.search')->with(compact('data', 'towns', 'day', 'time'));
    }

    public function category($lang, $group){
        $towns = Town::all();

        $subgroups = MainCategories::with('subGroups')->where('id', $group)->get();
        $subgroups = $subgroups[0]->subgroups;

        $query = CompanyDetail::with('user', 'hours');

        for ($i = 0; $i < count($subgroups); $i++){
            if ($i == 0){
                $query->where('category', $subgroups[$i]->id);
                $query->orWhere('category_2', $subgroups[$i]->id);
                $query->orWhere('category_3', $subgroups[$i]->id);
            }
            else {
                $query->orWhere('category', $subgroups[$i]->id);
                $query->orWhere('category_2', $subgroups[$i]->id);
                $query->orWhere('category_3', $subgroups[$i]->id);
            }
        }

        $day = strtolower(date('D'));
        $time = date('H:i'); 

//        dd($query->toSql());
        $data = $query->get();

        return view('otherPages.search')->with(compact('data', 'towns', 'day', 'time'));
    }

    public function basic($lang){
        $params = array();
        $search    = Input::get('search');
        $town      = Input::get('town');
        $day = strtolower(date('D'));
        $time = date('H:i'); 

        if (isset($search) && $search != ""){
            $params[] = array("company_name", "like", "%" . $search . "%");
        }

        if (isset($town) && $town != ""){
            $params[] = array("town", "=", $town);
        }

        $data = CompanyDetail::with('user', 'townRelation')->where($params)->get();

        $towns = Town::all();

        return view('otherPages.search')->with(compact('data', 'towns', 'day', 'time'));
    }

    public function advanced(){
        $params = array();
        $category       = Input::get('category');
        $town           = Input::get('town');
        $nonstop        = Input::get('nonstop');
        $delivery       = Input::get('delivery');
        $online         = Input::get('online');
        $distSort       = Input::get('distSort');
        $distFilter     = Input::get('distFilter');
        $lat            = Input::get('lat');
        $lng            = Input::get('lng');

        if($category != ""){
            $params[] = array("category", "=", $category);
        }

        if($town != ""){
            $params[] = array("town", "=", $town);
        }

        if($nonstop != "false"){
            $params[] = array("nonstop", "=", true);
        }

        if($delivery != "false"){
            $params[] = array("home_delivery", "=", true);
        }

//        if($online != "false"){
//            $params[] = array("online_banking", "=", true);
//        }

        $query = CompanyDetail::with('user', 'townRelation')->where($params);

        if($distFilter != "0" && $distFilter != "500"){
            $maxLat = $lat + rad2deg($distFilter / 1000 / 6371);
            $minLat = $lat - rad2deg($distFilter / 1000 / 6371);
            $maxLng = $lng + rad2deg($distFilter / 1000 / 6371 / cos(deg2rad($lat)));
            $minLng = $lng - rad2deg($distFilter / 1000 / 6371 / cos(deg2rad($lat)));
            $query = $query->whereBetween('first_lat', [$minLat, $maxLat])
                           ->whereBetween('first_lng', [$minLng, $maxLng]);
        }

        if($distSort != "false"){
            $query = $query->orderBy("first_lat", "asc")->orderBy("first_lng", "asc");
        }

        $data = $query->get();
        $day = strtolower(date('D'));
        $time = date('H:i'); 
        $towns = Town::all();

        return view('otherPages.search')->with(compact('data', 'towns', 'day', 'time'));
    }
}