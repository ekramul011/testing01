<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $students = Student::orderby('name', 'asc')->get();
        return view('frontend.student.manage', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student        = new Student();

        $student->name  = $request->name;
        $student->phone = $request->phone;

        $student->save();

        return redirect()->route('student.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        
        if (!is_null($student)) {
            $student = Student::where('id', $student->id)->first();
            return view('frontend.student.edit', compact('student'));
        }
        else{
            // 404 Page
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        $student->name  = $request->name;
        $student->phone = $request->phone;
        $student->save();

        return redirect()->route('student.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!is_null($student)) {
            
            $student->delete();
            return redirect()->route('student.manage');
        }
        else{
            // 404 Pages
        }

    }
}
