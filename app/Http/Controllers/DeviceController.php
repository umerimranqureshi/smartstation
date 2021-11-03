<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index(){

        $devices   = Device::all();
        return view('Dashboard.Device.device',compact('devices'));
    }

    public function addDevice(Request $request)
    {
    	$devices=new Device();
    	$devices->DeviceName=$request->DeviceName;
        $devices->DeviceDescription=$request->DeviceDescription;
    	if($devices->save()){
        	return redirect()->back()->with('success','Device Added Successfully');
        }
        else{
        	return redirect()->back()->with('error','Error in Added Device');
        }
    }

    public function editDevice(Request $request,$id)
    {
    	$devices=Device::findorFail($id);
    	$devices->DeviceName=$request->DeviceName;
    	$devices->DeviceDescription=$request->DeviceDescription;
        if($devices->save()){
    		return redirect()->back()->with('success','Device updated Successfully');
    	}else{
    		return redirect()->back()->with('error','Error in updating Device');
    	}
    }
    
    public function deleteDevice($id)
    
    {
    	$devices = Device::findorFail($id);
    	$devices->delete();
    	return redirect()->back()->with('deleted','Device Deleted Successfully');
    }
}

