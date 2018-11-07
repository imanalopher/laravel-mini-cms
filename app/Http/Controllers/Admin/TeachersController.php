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
        $id = Teachers::create($request->all())->id;
        $teacher = Teachers::find($id);
        $teacher->password = Hash::make('admin');
        $teacher->save();
        return redirect()->route('admin.teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return Response
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return Response
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teachers  $teachers
     * @return Response
     */
    public function update(Request $request, Teachers $teachers)
    {
        //
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
