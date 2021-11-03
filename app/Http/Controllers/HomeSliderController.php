<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Image;

class HomeSliderController extends Controller
{
    public function index()
    {
    	$sliders = HomeSlider::all();
        return view('Dashboard.Slider.slider',compact('sliders'));
    }

    public function addSlider(Request $request)
    {
        $sliders=new HomeSlider();
        $sliders->title=$request->title;
        $sliders->subtitle=$request->subtitle;
        $sliders->link=$request->link;
        $images = $request->image;

        if($file=$request->file('image'))
        
        {
            $destinationPath =public_path().'/frontend/image/Slider';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $sliders->image=$images;
        }

        if($sliders->save()){
            return redirect()->back()->with('success','Home Slider Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Error in Added Slider');
        }
    }

    public function editSlider(Request $request,$id)
    {
        $sliders=HomeSlider::findorFail($id);
        $sliders->title=$request->title;
        $sliders->subtitle=$request->subtitle;
        $sliders->link=$request->link;
        $images = $request->image;
        
        if($file=$request->file('image'))
        {
            $destinationPath =public_path().'/frontend/image/Slider';
            $name=$file->getClientOriginalName();
            $file->move($destinationPath,$name);
            $images=$name;
            $sliders->image=$images;
        }
        
        if($sliders->save()){
            return redirect()->back()->with('success','Model updated Successfully');
        }else{
            return redirect()->back()->with('error','Error in updating Model');
        }
    }

    public function deleteSlider($id)
    {
        $sliders = HomeSlider::findorFail($id);
        $sliders->delete();
        return redirect()->back()->with('deleted','Slider Deleted Successfully');
    }
}
