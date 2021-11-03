<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Device;
use App\Models\Series;
use Image;
use DB;

class ModelController extends Controller
{
    public function index()
    {
        // $models = Modal::all();
        $devices = Device::all();
        $series = Series::all();        


        $models = DB::table('modals')
            ->join('devices', 'devices.id', '=', 'modals.device_id')
            ->join('series', 'series.id', '=', 'modals.series_id')
            ->select('modals.*', 'devices.DeviceName', 'series.SeriesName')
            ->paginate(50);

        return view('Dashboard.Models.models',compact('models','devices','series'));
    }

    public function addModel(Request $request)
    {
        $models=new Modal();
        $models->device_id=$request->device_name;
        $models->series_id=$request->series_name;
        $models->ModelName=$request->ModelName;
        $images = $request->image;

        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/Model';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $models->image=$images;
        }

        $models->ModelDescription = $request->ModelDescription;
        
        if($models->save()){
            return redirect()->back()->with('success','Models Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Model');
        }
    }

    public function editModel(Request $request,$id)
    {
        $models=Modal::findorFail($id);
        $models->device_id=$request->device_name;
        $models->series_id=$request->series_name;
        $models->ModelName=$request->ModelName;
        $images = $request->image;
        
        if($file=$request->file('image'))
        {
            $destinationPath =public_path().'/frontend/image/Model';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $models->image=$images;
        }

        $models->ModelDescription = $request->ModelDescription;
        
        if($models->save()){
            return redirect()->back()->with('success','Model updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Model');
        }
    }

    public function deleteModel($id)
    {
        $models = Modal::findorFail($id);
        $models->delete();
        return redirect()->back()->with('deleted','Model Deleted Successfully');
    }











    public function getSeriesModal($seriesID, $deviceID)
    {

         $result = Modal::where('series_id','=', $seriesID)->where('device_id','=', $deviceID)->get();
         

          return $result;


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
