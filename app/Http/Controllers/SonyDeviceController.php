<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;

class SonyDeviceController extends Controller
{
   	public function Sony()
   	{
   		$sonyID = Device::where('DeviceName','Sony')->first()->id;
   		$series = Series::where('device_id',$sonyID)->get();
   		$footers = FooterContent::all();
   		return view('Frontend.sony_device',compact('series','sonyID','footers'));
   	}
}
