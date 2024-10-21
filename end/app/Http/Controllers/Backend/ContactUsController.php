<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-us');
    }

    public function index()
    {
        $contactUsMessages = ContactUs::orderBy('id','DESC')->get();
        return view('backend.contactus.contactus_all',compact('contactUsMessages'));
    }
    public function edit($id)
    {
        $contactUsMessage=ContactUs::findOrFail($id);
        if($contactUsMessage){
            return view('backend.contactus.contactUsMessage_details',compact('contactUsMessage'));
        }else{
            abort('404');
        }
    }
    public function destroy($id){
        $contactUsMessage = ContactUs::findOrFail($id);
        $contactUsMessage->delete();
        $notification = array(
            'message' => 'contactUsMessage Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
