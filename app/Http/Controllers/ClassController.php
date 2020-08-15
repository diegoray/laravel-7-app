<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function data()
    {
        $classes = DB::table('classes')->get();
        return view('class.data', compact('classes'));
    }

    public function add()
    {
        return view('class.add');  
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ]);

        DB::table('classes')->insert([
            'name' => $request->name, 
            'desc' => $request->desc
        ]);

        return redirect('classes')->with('status', 'Class has been added!');
    }

    public function edit($id)
    {
        $class = DB::table('classes')->where('id', $id)->first();
        return view('class.edit', compact('class'));   
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ]);
        
        DB::table('classes')->where('id', $id)
              ->update([
                'name' => $request->name, 
                'desc' => $request->desc
        ]);
        
        return redirect('classes')->with('status', 'Class has been updated!');
    }

    public function delete($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return redirect('classes')->with('status', 'Class has been deleted!');
    }
}
