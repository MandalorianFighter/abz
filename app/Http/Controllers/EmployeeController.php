<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;

class EmployeeController extends Controller
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
        return view('backend.employees.create');
    }

    public function searchP(Request $request)
    {
        $data = [];

            $search = $request->term;
            $data = Position::select("id","position")->where('position', 'LIKE', "%$search%")
                ->cursor();

        return response()->json($data);
    }
    public function searchM(Request $request)
    {
        $data = [];

            $managerlvl = $request->level - 1;
            $data = Employee::select("id","full_name")->where('level', $managerlvl)->cursor();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|min:2|max:256',
            'date' => 'required|before_or_equal:today|date_format:d.m.y',
            'phone' => 'required',
            'email' => 'required|email:filter',
            'salary' => 'required|numeric|digits_between:0,500000',
            'level' => 'required',
            'manager' => 'required',
            'position' => 'required',
            'photo' => 'image|max:5120|mimes:jpg,png|dimensions:min_width=300,min_height=300',
        ]);

        Employee::insert([
            'full_name' => $request->full_name,
            'hire_date' => Carbon::createFromFormat('d.m.y', $request->date)->format('Y-m-d'),
            'phone' => $request->phone,
            'email' => $request->email,
            'salary' => $request->salary,
            'level' => $request->level,
            'photo' => $this->storePhoto($request),
            'position_id' => $request->position,
            'manager_id' => $request->manager,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => auth()->user()->id,
            'admin_updated_id' => auth()->user()->id,
        ]);

        return Redirect()->route('employee');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('backend.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|min:2|max:256',
            'date' => 'required|before_or_equal:today|date_format:d.m.y',
            'phone' => 'required',
            'email' => 'required|email:filter',
            'salary' => 'required|numeric|digits_between:0,500000',
            'level' => 'required',
            'manager' => 'required',
            'position' => 'required',
            'photo' => 'image|max:5120|mimes:jpg,png|dimensions:min_width=300,min_height=300',
        ]);

        $employee = Employee::findOrFail($id);
        $old_image = $request->old_image;
        $employee_photo = $request->file('photo');

        if($employee_photo) {
            $employee->photo = $this->storePhoto($request);
            $employee->save();
        
            if(file_exists($old_image)) unlink($old_image);
        }

        $employee->update([
            'full_name' => $request->full_name,
            'hire_date' => Carbon::createFromFormat('d.m.y', $request->date)->format('Y-m-d'),
            'phone' => $request->phone,
            'email' => $request->email,
            'salary' => $request->salary,
            'level' => $request->level,
            'position_id' => $request->position,
            'manager_id' => $request->manager,
            'updated_at' => Carbon::now(),
            'admin_updated_id' => auth()->user()->id,
        ]);

        return Redirect()->route('employee');
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $old_image = $employee->photo;
        if(file_exists($old_image)) unlink($old_image);
    
        if($employee->subordinates->count()) {
            $employee->subordinates->each(function ($subordinate) use ($employee) {   // перепідпорядкування підлеглих
            $manager = Employee::where('level', $employee->level)
                        ->where('position_id', $employee->position_id)
                        ->where('id', '!=', $employee->id)->inRandomOrder()->first();
            $subordinate->manager()->associate($manager);
            $subordinate->save();
        });
        }
        
        $employee->delete();

        return Redirect()->route('employee');
    }

    protected function storePhoto(Request $request): string
    {
        $photo = $request->file('photo');
        $name = hexdec(uniqid()).'.jpg';

        $image = Image::make($photo)->fit(300, 300)->orientate()->stream('jpg', 80);
        Storage::disk('public')->put('image/employee/'.$name, $image, 'public');

        return 'storage/image/employee/'.$name;
    }
}
