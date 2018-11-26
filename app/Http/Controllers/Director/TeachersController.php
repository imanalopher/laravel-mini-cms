<?php

namespace App\Http\Controllers\Director;

use App\Klass;
use App\Schools;
use App\Teachers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class TeachersController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $currentTeacher = auth()->user();

        /** @var Schools $school */
        $school = $currentTeacher->school;
        $teachers = Teachers::where('school_id', $school->id)->paginate(2);

        return view('director.teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('director.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $director = auth()->user();
        if (!$director->school instanceof Schools) {
            return redirect()->route('director.teacher.index');
        }

        $teacher = array_merge($request->all(), [
            'school_id' => $director->school->id,
            'password' => Hash::make($request->request->get('password'))
        ]);

        Teachers::create($teacher);
        return redirect()->route('director.teacher.index');
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('teacher.login');
    }
}
