<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Device;
use Image;
use DB;

class SeriesController extends Controller
{
    public function index()
    {
    	// $series = Series::all();
    	 $devices = Device::all();


        $series = DB::table('series')
            ->join('devices', 'devices.id', '=', 'series.device_id')
            ->select('series.*', 'devices.DeviceName')
            ->get();


        return view('Dashboard.ModalSeries.modalseries',compact('series','devices'));
    }
    public function getSeriesAgainstBrand($deviceID)
    {
        $seriesList = Series::where('device_id','=', $deviceID)->get();
        return $seriesList;
    }



    public function addSeries(Request $request)
    {
        $series=new Series();
        $series->device_id=$request->device_name;
        $series->SeriesName=$request->SeriesName;
        $series->SeriesDescription=$request->SeriesDescription;
        $images = $request->image;

        if($file=$request->file('image'))

        {
            $destinationPath =public_path().'/frontend/image/Series';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $series->image=$images;
        }

        if($series->save()){
            return redirect()->back()->with('success','Device Series Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Device Series');
        }
    }

    public function editSeries(Request $request,$id)
    {
        $series=Series::findorFail($id);
        $series->device_id=$request->device_name;
        $series->SeriesName=$request->SeriesName;
        $series->SeriesDescription=$request->SeriesDescription;
        $images = $request->image;

        if($file=$request->file('image'))

        {
            $destinationPath =public_path().'/frontend/image/Series';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $series->image=$images;
        }

        if($series->save()){
            return redirect()->back()->with('success','Device Series updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Device Series');
        }
    }

    public function deleteSeries($id)
    {
        $series = Series::findorFail($id);
        $series->delete();
        return redirect()->back()->with('deleted','Device Series Deleted Successfully');
    }
}
