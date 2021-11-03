<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;



class SamsungDeviceController extends Controller
{
    public function Samsung()
    {

    	$samsungID = Device::where('DeviceName','Samsung')->first()->id;
    	$series = Series::where('device_id',$samsungID)->get();
    	$footers = FooterContent::all();
    	return view('Frontend.samsung_device',compact('series', 'samsungID','footers'));
    }
}
