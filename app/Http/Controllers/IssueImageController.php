<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\AllIssueImage;
use App\Imports\IssuesImport;
use Maatwebsite\Excel\Facades\Excel;

class IssueImageController extends Controller
{
    public function Issueimport(Request $request) 
    {
        Excel::import(new IssuesImport(),$request->file);
        
        return redirect()->back()->with('success', 'All good!');
    }

    public function index()
    {
        $models = Modal::all();
        $issues = AllIssueImage::paginate(50);
        return view('Dashboard.Issues.issueimage',compact('models','issues'));
    }

    

    public function addIssueImage(Request $request)
    {
        $issues=AllIssueImage::create($request->all());

        if($issues->save()){
            return redirect()->back()->with('success','Issues Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Issues');
        }
    }

    public function editIssueImage(Request $request,$id)
    {
        $issues=AllIssueImage::findorFail($id);
        $issues->update($request->all());


        if($issues->save()){
            return redirect()->back()->with('success','Issue updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Issue');
        }
    }

    public function deleteIssueImage($id)
    {
        $issues = AllIssueImage::findorFail($id);
        $issues->delete();
        return redirect()->back()->with('deleted','Issue Deleted Successfully');
    }
}
