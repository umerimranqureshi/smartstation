<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;


class LGDeviceController extends Controller
{
    public function index()
    {
    	$lgID = Device::where('DeviceName','LG')->first()->id;
    	$series = Series::where('device_id',$lgID)->get();
    	$footers = FooterContent::all();
    	return view('Frontend.lg_device',compact('series','lgID','footers'));
    }
}
