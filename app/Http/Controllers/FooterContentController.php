<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterContent;

class FooterContentController extends Controller
{
    public function index()
    {
    	$footers = FooterContent::all();
    	return view('Dashboard.FooterContent.footercontent',compact('footers'));
    }

    public function addFooter(Request $request)
    {
        $footers=new FooterContent();
        $footers->LogoDescription=$request->LogoDescription;
        $footers->email=$request->email;
        $footers->PhoneNumber=$request->PhoneNumber;
        $footers->Address=$request->Address;
        $images = $request->image;

        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/FooterImage';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $footers->image=$images;
        }

        $footers->Description = $request->Description;
        
        if($footers->save()){
            return redirect()->back()->with('success','Footer Content Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Footer Content');
        }
    }

    public function editFooter(Request $request,$id)
    {
        $footers=FooterContent::findorFail($id);
        $footers->LogoDescription=$request->LogoDescription;
        $footers->email=$request->email;
        $footers->PhoneNumber=$request->PhoneNumber;
        $footers->Address=$request->Address;
        $images = $request->image;
        
        if($file=$request->file('image'))
        {
            $destinationPath =public_path().'/frontend/image/FooterImage';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $footers->image=$images;
        }

        $footers->Description = $request->Description;
        
        if($footers->save()){
            return redirect()->back()->with('success','Footer Content updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Footer Content');
        }
    }

    public function deleteFooter($id)
    {
        $footers = FooterContent::findorFail($id);
        $footers->delete();
        return redirect()->back()->with('deleted','Footer Content Deleted Successfully');
    }
}
