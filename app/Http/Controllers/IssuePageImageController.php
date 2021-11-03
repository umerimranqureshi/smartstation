<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssueImage;

class IssuePageImageController extends Controller
{
    public function index()
    {
    	$issues = IssueImage::all();
    	return view('Dashboard.IssuePageImages.issuepageimages',compact('issues'));
    }

    public function addIssueImage(Request $request)
    {
        $issues=new IssueImage();
        $images = $request->image;
        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/IssuePage';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $issues->image=$images;
        }
        
        if($issues->save()){
            return redirect()->back()->with('success','Issues Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Issues');
        }
    }

    public function editIssueImage(Request $request,$id)
    {
        $issues=IssueImage::findorFail($id);
        $images = $request->image;
        
        if($file=$request->file('image'))
        {
            $destinationPath =public_path().'/frontend/image/IssuePage';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $issues->image=$images;
        }
        
        if($issues->save()){
            return redirect()->back()->with('success','Issue updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Issue');
        }
    }

    public function deleteIssueImage($id)
    {
        $issues = IssueImage::findorFail($id);
        $issues->delete();
        return redirect()->back()->with('deleted','Issue Deleted Successfully');
    }
}
