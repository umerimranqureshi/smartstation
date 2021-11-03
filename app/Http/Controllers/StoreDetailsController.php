<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreDetailsController extends Controller
{
    public function index(){

        $stores   = Store::all();
        return view('Dashboard.StoreDetails.storedetail',compact('stores'));
    }

    public function addStore(Request $request)
    {
        $store=Store::create($request->all());
        $store->store_id=$store->id;
        $store->save();


        if($store->save()){
            return redirect()->back()->with('success','Store Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Store');
        }
    }

    public function editStore(Request $request,$id)
    {
        $stores=Store::findorFail($id);
        $stores->update($request->all());
        if($stores->save()){
            return redirect()->back()->with('success','Store updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Store');
        }
    }

    public function deleteStore($id)

    {
        $stores = Store::findorFail($id);
        $stores->delete();
        return redirect()->back()->with('deleted','Store Deleted Successfully');
    }
}
