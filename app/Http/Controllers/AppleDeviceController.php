<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;

class AppleDeviceController extends Controller
{
    public function AppleDevice()
    {
        $appleID = Device::where('DeviceName','Apple')->first()->id;
        $series = Series::where('device_id',$appleID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.apple_device',compact('appleID','series','footers'));
    }
}
