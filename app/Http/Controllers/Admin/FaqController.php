<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function list()
    {
    	$list = Faq::all();
    	return view('admin.faq.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.faq.add');
    }

    public function edit($id = null)
    {
    	$faq = Faq::find($id);
    	return view('admin.faq.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $message = [
            'question.required' => 'Please fill out this!',
            'answer.required' => 'Please fill out this!',
        ];

        $rules = [
            'question' => 'required',
            'answer' => 'required',
        ];

        $this->validate($req, $rules, $message);

        if (is_null($id)) {
        	$faq = new Faq();
        	$faq->question = $req->question;
        	$faq->answer = $req->answer;
            $faq->save();

            $msg = "Faq Added Successfully!";
        } else {

            $faq = Faq::find($id);
        	$faq->question = $req->question;
        	$faq->answer = $req->answer;
            $terminal->save();

            $msg = "Faq Updated Successfully!";
        }

        return redirect()->route('admin.faq.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Faq::find($id)->delete();
    	return redirect()->back()->with('success', 'Faq Deleted Successfully!');
    }

    public function statusChange($id = null)
    {
        $faq = Faq::find($id);

        if ($faq->status == 1) {
            $faq->status = 0;
        } else {
            $faq->status = 1;
        }
        $faq->save();

        return redirect()->back()->with('success', 'Faq Status Change Successfully!');
    }

    public function bulkAction(Request $req)
    {
        $ids = explode(",", $req->action_id);
        $action = $req->action;

        foreach ($ids as $id) {
            if ($action === "delete") {
                $this->delete($id);
                $msg = "Bulk Deleted Successfully!";
            }

            if ($action === "hide") {
                $this->statusChange($id);
                $msg = "Bulk Status Change Successfully!";
            }

            if ($action === "show") {
                $this->statusChange($id);
                $msg = "Bulk Status Change Successfully!";
            }
        }

        return redirect()->back()->with('success', $msg);
    }
}
