<?php

namespace App\Http\Controllers\Admin;

use App\Schools;
use App\Teachers;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class TeachersController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $teachers = Teachers::paginate(20);
        return view('admin.teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $schools = Schools::get(['id', 'name']);
        return view('admin.teacher.create', ['schools' => $schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $teacher = Teachers::create($request->all());
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $teacher->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/teachers/');

            $image->move($destinationPath, $name);
            $teacher->photo = $name;
        }

        $teacher->password = Hash::make($request->get('password'));
        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('admin.teacher.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        $teacher = Teachers::findOrFail($id);

        return view('admin.teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $teacher = Teachers::findOrFail($id);

        if($teacher instanceof Teachers) {
            $teacher->update($request->all());
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $teacher->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/teachers/');

            $image->move($destinationPath, $name);
            $teacher->photo = $name;
        }

        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teachers  $teachers
     * @return Response
     */
    public function destroy(Teachers $teachers)
    {
        //
    }
}
