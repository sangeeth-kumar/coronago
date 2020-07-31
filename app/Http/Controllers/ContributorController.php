<?php

namespace App\Http\Controllers;

use App\Region;
use App\Country;
use App\Contributor;
use App\City;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function index() {
    	$countries = Country::get();
    	$regions = Region::select('regions.*')->join('countries', 'countries.id', '=', 'regions.country_id')->where('countries.name', 'India')->get();
        $city = City::select('cities.*')->join('regions', 'regions.id', '=', 'cities.region_id')->where('regions.name', 'Tamil Nadu')->get();
        // dd($city);

    	return view('corona', compact('countries', 'regions','city'));
    }

    public function getRegion($id) {
    	$region = Region::where('country_id', $id)->orderBy('name')->get();
        // dd($region); `
    	return response()->json(['regions' => $region], 200);

    }

    public function getCity($id) {
        $city = City::where('region_id', $id)->orderBy('name')->get();
        // dd($city); 
        return response()->json(['cities' => $city], 200);

    }


    public function store(Request $request) {
        // dd($request);
    	$request->validate([
    		'name' => 'required',
            'email' => 'required',
            'mob' => 'required',
    		'country' => 'required',
    		'region' => 'required',
            'citycode' =>'required',

    	]);
        $name=$request->get('name');
        $emailaddress=$request->get('email');
        $type=$request->get('donation');
        if ($type == "Monetary"){
            Contributor::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mob' => $request->get('mob'),
            'country_id' => $request->get('country'),
            'region_id' => $request->get('region'),
            'city_id' => $request->get('city'),
            'city_code' => $request->get('citycode'),
            'donation_type' =>$request->get('donation'),
            'donation_material' =>'money',
        ]);    
            $mailController=new mailController;
            $mailController->sendEmail($emailaddress,$name);
            return view('solution');
        }
        else
        {
          Contributor::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mob' => $request->get('mob'),
            'country_id' => $request->get('country'),
            'region_id' => $request->get('region'),
            'city_id' => $request->get('city'),
            'city_code' => $request->get('citycode'),
            'donation_type' =>$request->get('donation'),
            'donation_material' =>$request->get('material'),
        ]);    
            $mailController=new mailController;
            $mailController->sendEmail($emailaddress,$name);
          return redirect()->back()->withSuccess('Contribution Added Successfully');
        }
    	

    	// return redirect()->back()->withSuccess('Contribution Added Successfully');
    }

    public function getContributions($countryId, $regionId,$cityId,$citycode) {
    	$contributions = Contributor::where(['country_id' => $countryId, 'region_id' => $regionId, 'city_id' => $cityId,'city_code'=> $citycode, 'donation_type' =>'Non-Monetary'])->with(['country', 'region','city'])->get();
        // dd($contributions);
        
    	return response()->json(['contributions' => $contributions]);
    }
}
