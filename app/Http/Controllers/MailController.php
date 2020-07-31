<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Mail\sendemail;
use App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function sendEmail($emailaddress,$name){
      // dd($emailaddress);
    	// dd($name);
    	
      // $emailid = $emailaddress;
      $dataArray =$name;
   
        
          # code...
          \Mail::to($emailaddress)->send(new sendemail($dataArray));
      // 		
   
		    
      	
      	

      	
      	
      }


    	// return
    }

 
    

