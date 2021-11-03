<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairService;

class RepairServicesController extends Controller
{
    public function index()
    {
    	$repairs = RepairService::all();
    	return view('Dashboard.RepairServices.repair_services',compact('repairs'));
    }

    public function addRepairService(Request $request)
    {
        $repairs=new RepairService();
        
        $repairs->ServiceName=$request->ServiceName;
        $images = $request->image;

        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/RepairService';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $repairs->image=$images;
        }

        $repairs->ServiceDetail = $request->ServiceDetail;
        
        if($repairs->save()){
            return redirect()->back()->with('success','Repair Service Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Repair Service');
        }
    }

    public function editRepairService(Request $request,$id)
    {
        $repairs=RepairService::findorFail($id);
        
        $repairs->ServiceName=$request->ServiceName;
        $images = $request->image;

        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/RepairService';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $repairs->image=$images;
        }

        $repairs->ServiceDetail = $request->ServiceDetail;
        
        if($repairs->save()){
            return redirect()->back()->with('success','Repair Service updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Repair Service');
        }
    }

    public function deleteRepairService($id)
    {
        $repairs = RepairService::findorFail($id);
        $repairs->delete();
        return redirect()->back()->with('deleted','Repair Service Deleted Successfully');
    }
}
