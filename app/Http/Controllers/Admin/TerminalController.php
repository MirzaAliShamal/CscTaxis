<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal;
use Validator;

class TerminalController extends Controller
{
    public function list()
    {
    	$list = Terminal::all();
    	return view('admin.terminal.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.terminal.add');
    }

    public function edit($id = null)
    {
    	$terminal = Terminal::find($id);
    	return view('admin.terminal.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $message = [
            'name.required' => 'Enter any display name of the location',
            'address.required' => 'Enter address of the terminal',
            'type.required' => 'Select type of terminal',
        ];

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'type' => 'required',
        ];

        $this->validate($req, $rules, $message);

        if (is_null($id)) {
        	$terminal = new Terminal();
        	$terminal->name = $req->name;
        	$terminal->address = $req->address;
        	$terminal->lat = $req->lat;
        	$terminal->long = $req->long;
        	$terminal->type = $req->type;
            $terminal->save();

            $msg = "Terminal Added Successfully!";
        } else {

            $terminal = Terminal::find($id);
        	$terminal->name = $req->name;
        	$terminal->lat = $req->lat;
        	$terminal->long = $req->long;
        	$terminal->type = $req->type;
            $terminal->save();

            $msg = "Terminal Updated Successfully!";
        }

        return redirect()->route('admin.terminal.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
    	Terminal::find($id)->delete();
    	return redirect()->back()->with('success', 'Terminal Deleted Successfully!');
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
        }

        return redirect()->back()->with('success', $msg);
    }
}
