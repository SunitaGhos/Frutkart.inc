<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class SellerController extends Controller
{
    //
    public function profile(){
        return view('seller.profile');
    }
    public function updateProfile(Request $request){
        //dd($request);
        $request->validate([
            
            'profile_photo' => 'nullable|image|max:2048',
        ]);
        if($request->hasFile('profile_photo')){
            $old_image=Auth()->user()->profile_photo;

            $filename  = time().'.'.$request->profile_photo->getClientOriginalName();
            $request->profile_photo->storeAs('uploads',$filename,'public');
            
            Auth()->user()->update(['profile_photo'=>$filename,'description'=>$request->description]);
            
            
            if(File::exists(public_path('storage/uploads/'.$old_image))){
                File::delete(public_path('storage/uploads/'.$old_image));
            }
        }else{
            Auth()->user()->update(['description'=>$request->description]);
        }
        return redirect()->back()->with('success','Profile Updated Successfully');
        
    }
}
