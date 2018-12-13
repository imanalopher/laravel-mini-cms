<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Klass;
use App\Schools;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(20);

        return view('admin.student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = Schools::get(['id', 'name']);
        $klasses = Klass::get(['id', 'name']);
        return view('student.create', ['schools' => $schools, 'klasses' => $klasses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student = Student::create($request->all());

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $student->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/students/');
            $image->move($destinationPath, $name);
            $student->photo = $name;
        }

        $student->save();

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'nfc' => 'required',
        ]);

        $student = Student::find($id);
        if($student instanceof Student) {
            $student->update($request->all());
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $student->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/students/');
            $image->move($destinationPath, $name);
            $student->photo = $name;
        }
        $student->save();

        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $student = Student::find($id);
        if ($student instanceof Student) {
            $student->delete();
        }

        return redirect()->route('admin.student.index');
    }
}
