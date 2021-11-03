<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;

class HTCController extends Controller
{
    public function HTC()
    {
    	$htcID = Device::where('DeviceName','Htc')->first()->id;
    	$series = Series::where('device_id',$htcID)->get();
    	$footers = FooterContent::all();
    	return view('Frontend.htc_device',compact('series','htcID','footers'));
    }
}

