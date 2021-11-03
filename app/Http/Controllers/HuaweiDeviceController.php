<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;

class HuaweiDeviceController extends Controller
{
    public function Huawei()
    {
    	$huaweiID = Device::where('DeviceName','Huawei')->first()->id;
    	$series = Series::where('device_id',$huaweiID)->get();
    	$footers = FooterContent::all();
    	return view('Frontend.huawei_device',compact('series','huaweiID','footers'));
    }
}
