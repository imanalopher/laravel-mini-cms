<?php

namespace App\Http\Controllers\Director;

use App\Schools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $director = \auth()->user();
        return view('director.school.index', ['school' => $director->school]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Schools::create(array_merge($request->all(), ['director_id' => auth()->user()->id]));

        return redirect()->route('director.school.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function show(Schools $schools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $schools = Schools::find($id);
        return view('school.edit', ['school' => $schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $school = Schools::find($id);
        if($school instanceof Schools) {
            $school->update($request->all());
        }

        return redirect()->route('admin.school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $school = Schools::find($id);
        if ($school instanceof Schools) {
            $school->delete();
        }

        return redirect()->route('admin.school.index');
    }
}
