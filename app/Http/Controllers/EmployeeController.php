<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;

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
    
    public function index()
    {
        $positions = Position::orderBy('id', 'asc')->cursor();

        $employees = Employee::withOnly('position')->orderBy('id', 'asc')->paginate(100);

        return view('backend.datatable', compact('positions', 'employees'));
    }
}
