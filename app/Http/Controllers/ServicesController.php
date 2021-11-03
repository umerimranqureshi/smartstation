<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Response;
use Image;

class ServicesController extends Controller
{
    public function index()
    {
    	$services = Service::all();
        return view('Dashboard.services.services',compact('services'));
    }

    public function addService(Request $request)
    {
        $services=new Service();
        $services->ServiceTitle=$request->ServiceTitle;
        $services->ServiceDescription=$request->ServiceDescription;
        $images = $request->image;

        if($file=$request->file('image'))
        {
            $destinationPath =public_path().'/frontend/image/Services';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $services->image=$images;
        }
        if($services->save()){
            return redirect()->back()->with('success','Service Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Service');
        }
    }

    public function editService(Request $request,$id)
    {
        $services=Service::findorFail($id);
        $services->ServiceTitle=$request->ServiceTitle;
        
        $images = $request->ServiceImage;
        
        if($file=$request->file('ServiceImage'))
        {
            $destinationPath =public_path().'/frontend/image/Services';
                $name=$file->getClientOriginalName();
                $file->move($destinationPath,$name);
                $images=$name;
                $services->ServiceImage=$images;
        }
        
        $services->ServiceDescription=$request->ServiceDescription;
        
        if($services->save()){
            return redirect()->back()->with('success','Service updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Service');
        }
    }

    public function deleteService($id)
    {
        $services = Service::findorFail($id);
        $services->delete();
        return redirect()->back()->with('deleted','Service Deleted Successfully');
    }
}
