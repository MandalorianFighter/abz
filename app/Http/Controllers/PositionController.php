<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {    
        return view('backend.positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|min:2|max:256',
        ]);

        Position::insert([
            'position' => $request->position,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => auth()->user()->id,
            'admin_updated_id' => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Position Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->route('employee')->with($notification);
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        
        return view('backend.positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position' => 'required|min:2|max:256',
        ]);

        $position = Position::findOrFail($id);

        $position->update([
            'position' => $request->position,
            'updated_at' => Carbon::now(),
            'admin_updated_id' => auth()->user()->id,
        ]);

        $notification = array(
            'message' => 'Position Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('employee')->with($notification);
    }

    public function delete($id)
    {
        $position = Position::find($id);
        $position->delete();

        $notification = array(
            'message' => 'Position Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->route('employee')->with($notification);
    }
}
