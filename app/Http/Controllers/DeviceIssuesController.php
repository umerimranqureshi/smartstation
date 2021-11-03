<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use Illuminate\Http\Request;
use App\Models\IssueImage;
use App\Models\AllIssueImage;

class DeviceIssuesController extends Controller
{
    public function index($id)
    {
        $modelDetials =  Modal::find($id);
    	$issues = IssueImage::all();
    	$issuess = AllIssueImage::where('model_id',$id)->get();
    	return view('Frontend.all_models_issues',compact('issues', 'modelDetials', 'issuess'));
    }
}
