<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use App\Models\FooterContent;


class OtherDeviceController extends Controller
{
    public function index()
    {
        $footers = FooterContent::all();
    	return view('Frontend.otherDevice',compact('footers'));
    }
    public function macbook()
    {
        $macbookID = Device::where('DeviceName','MacBook')->first()->id;
        $series = Series::where('device_id',$macbookID)->get();
        $footers = FooterContent::all();
        return view('Frontend.macbook',compact('series','macbookID','footers'));
    }

    public function oneplus()
    {
    	$oneplusID = Device::where('DeviceName','OnePlus')->first()->id;
    	$series = Series::where('device_id',$oneplusID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.oneplus_device',compact('series','oneplusID','footers'));
    }

    public function vivo()
    {
    	$vivoID = Device::where('DeviceName','Vivo')->first()->id;
    	$series = Series::where('device_id',$vivoID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.vivo_device',compact('series','vivoID','footers'));
    }

    public function asus()
    {
    	$asusID = Device::where('DeviceName','Asus')->first()->id;
    	$series = Series::where('device_id',$asusID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.asus_device',compact('series','asusID','footers'));
    }

    public function oppo()
    {
    	$oppoID = Device::where('DeviceName','Oppo')->first()->id;
    	$series = Series::where('device_id',$oppoID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.oppo_device',compact('series','oppoID','footers'));
    }

    public function nokia()
    {
    	$nokiaID = Device::where('DeviceName','Nokia')->first()->id;
    	$series = Series::where('device_id',$nokiaID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.nokia_device',compact('series','nokiaID','footers'));
    }

    public function xiaomi()
    {
    	$xiaomiID = Device::where('DeviceName','Xiaomi')->first()->id;
    	$series = Series::where('device_id',$xiaomiID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.xiaomi_device',compact('series','xiaomiID','footers'));
    }

    public function google()
    {
    	$googleID = Device::where('DeviceName','Google')->first()->id;
    	$series = Series::where('device_id',$googleID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.google_device',compact('series','googleID','footers'));
    }

    public function blackberry()
    {
    	$blackberryID = Device::where('DeviceName','BlackBerry')->first()->id;
    	$series = Series::where('device_id',$blackberryID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.blackberry_device',compact('series','blackberryID','footers'));
    }

    public function motorola()
    {
    	$motorolaID = Device::where('DeviceName','Motorola')->first()->id;
    	$series = Series::where('device_id',$motorolaID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.motorola_device',compact('series','motorolaID','footers'));
    }

    public function samsungTab()
    {
    	$samsungTabID = Device::where('DeviceName','SamsungTab')->first()->id;
    	$series = Series::where('device_id',$samsungTabID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.samsungTab',compact('series','samsungTabID','footers'));
    }

    public function microsoft()
    {
    	$microsoftID = Device::where('DeviceName','Microsoft')->first()->id;
    	$series = Series::where('device_id',$microsoftID)->get();
        $footers = FooterContent::all();
    	return view('Frontend.microsoft_device',compact('series','microsoftID','footers'));
    }

    public function zte()
    {
        $zteID = Device::where('DeviceName','Zte')->first()->id;
        $series = Series::where('device_id',$zteID)->get();
        $footers = FooterContent::all();
        return view('Frontend.zte_device',compact('series','zteID','footers'));
    }
}
