<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Issues;
use Illuminate\Support\Facades\DB;
use Image;

class IssueController extends Controller
{
    public function index()
    {
        $models = DB::table('modals')
            ->join('devices', 'devices.id', '=', 'modals.device_id')
            ->join('series', 'series.id', '=', 'modals.series_id')
            ->select('modals.*', 'devices.DeviceName', 'series.SeriesName')
            ->get();

        $issues = Issues::all();
    	return view('Dashboard.Issues.issues',compact('models','issues'));
    }

    public function addIssue(Request $request)
    {
        $issues=new Issues();
        $issues->model_id = $request->model_id;
        $issues->IssueDescription=$request->IssueDescription;

        if($issues->save()){
            return redirect()->back()->with('success','Issues Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Issues');
        }
    }

    public function editIssue(Request $request,$id)
    {
        $issues=Issues::findorFail($id);
        $issues->model_id = $request->model_id;
        $issues->IssueDescription=$request->IssueDescription;

        if($issues->save()){
            return redirect()->back()->with('success','Issue updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Issue');
        }
    }

    public function deleteIssue($id)
    {
        $issues = Issues::findorFail($id);
        $issues->delete();
        return redirect()->back()->with('deleted','Issue Deleted Successfully');
    }
}
