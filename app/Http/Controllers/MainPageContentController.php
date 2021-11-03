<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;
use Illuminate\Support\Str;

class MainPageContentController extends Controller
{
    public function index(){

        $mainpages   = PageContent::all();
        return view('Dashboard.MainPage.mainpage_content',compact('mainpages'));
    }

    public function addContent(Request $request)
    {
    	$mainpages=new PageContent();
        $mainpages->Description=$request->Description;
    	if($mainpages->save()){
        	return redirect()->back()->with('success','Page Content Added Successfully');
        }
        else{
        	return redirect()->back()->with('error','Error in Added Page Content');
        }
    }

    public function editContent(Request $request,$id)
    {
    	$mainpages=PageContent::findorFail($id);
    	$mainpages->Description=$request->Description;
        if($mainpages->save()){
    		return redirect()->back()->with('success','Page Content updated Successfully');
    	}else{
    		return redirect()->back()->with('error','Error in updating Page Content');
    	}
    }
    
    public function deleteContent($id)
    
    {
    	$mainpages = PageContent::findorFail($id);
    	$mainpages->delete();
    	return redirect()->back()->with('deleted','Page Content Deleted Successfully');
    }
}
