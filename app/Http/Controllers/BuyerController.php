<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class BuyerController extends Controller
{
    //
    public function rateChart(){
         
        $sellers = User::where('role',1)->paginate(config::get('constants.pagination.pagination_per_page'));
        return view('buyer.sellerList',compact('sellers'));
    }

    public function viewSellerProfile($id){
       $seller= User::where('id',$id)->with('rateChart')->first();
    
       return view('buyer.sellerProfile',compact('seller'));
    }
}
