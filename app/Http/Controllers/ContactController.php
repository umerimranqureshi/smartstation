<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function saveUser(Request $request)
    {
    	$users=new Contact();
    	$users->UserName=$request->UserName;
        $users->UserPhone=$request->UserPhone;
        $users->UserEmail=$request->UserEmail;
        $users->UserAddress=$request->UserAddress;
        $users->UserMessage=$request->UserMessage;

    	if($users->save()){
    		$data=array('email'=>$users->UserEmail,'name'=>$users->UserName,'number'=>$users->UserPhone,'message'=>$users->UserMessage,'Address'=>$users->UserAddress);
            Mail::send('/emails/contactemail',['data' => $data]
                        , function($message) use ($data)
                    {
                        $message->to('alirazaasad498@gmail.com')->subject('SmartStation Contact Inquiry');
                    });
        	return redirect()->back()->with('success','Thank you for contact With Us');
        }
        else{
        	return redirect()->back()->with('error','You Faced Some Issue');
        }
    }
}
