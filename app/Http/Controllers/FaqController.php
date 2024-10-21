<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq');
    }
    
    public function editFaq(){
        $questions = Faq::where('type','general')->get();
        return view('admin.faqs.editFaq',compact('questions'));
    }

    public function storeFaq(Request $request){   
        $questions=$request->question;
        $answers =$request->answer; 
        $statuses =$request->faq_status; 
        $lang = $request->lang;
        if($questions){
            foreach($questions as $key=>$question){
                if($question){
                    $faq=new Faq();
                    $faq->type='general';
                    $faq->question=$question;
                    $faq->answer=$answers[$key];
                    $faq->lang=$lang[$key];
                    $faq->save();
                }
            }
        }
        return back()->with('success',trans('home.your_item_updated_successfully'));
    }
    
    public function updateGeneralFaq(Request $request){
        $faq=Faq::find($request->faq_id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->lang = $request->lang;
        $faq->save();
        return back()->with('success',trans('home.faq_updated_successfully'));
    }
    
    public function removeGeneralFaq(){
        $faqId= $_POST['faq_id'];
        Faq::find($faqId)->delete();
    }
}
