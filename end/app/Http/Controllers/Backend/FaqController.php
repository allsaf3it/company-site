<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq');
    }
    public function index()
    {
        //
        $faqs = Faq::get();
        return view('backend.faqs.faqs_all',compact('faqs'));

    }//end method
    public function create()
    {
        //
        return view('backend.faqs.faq_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'question_en' => 'nullable|string',
            'question_ar' => 'string|nullable',
            'answer_en' => 'string|nullable',
            'answer_ar' => 'string|nullable',
        ]);
        $add = new Faq();
        $add->question_en = $request->question_en;
        $add->question_en = $request->question_ar;
        $add->answer_en = $request->answer_en;
        $add->answer_ar = $request->answer_ar;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);
    }
    public function edit($id)
    {
        $faq=Faq::findOrFail($id);
        if($faq){
            return view('backend.faqs.faq_edit',compact('faq'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'question_en' => 'nullable|string',
            'question_ar' => 'string|nullable',
            'answer_en' => 'string|nullable',
            'answer_ar' => 'string|nullable',
        ]);
        $faq_id = $request->id;
        $add = Faq::findOrFail($faq_id);
        $add->question_en = $request->question_en;
        $add->question_en = $request->question_ar;
        $add->answer_en = $request->answer_en;
        $add->answer_ar = $request->answer_ar;
        $add->status = $request->status;
        $add->save();
        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);
    }
    public function destroy($id){
        $faq = Faq::findOrFail($id);
        $faq->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
