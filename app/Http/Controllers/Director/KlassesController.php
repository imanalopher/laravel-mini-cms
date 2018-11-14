<?php

namespace App\Http\Controllers\Director;


use App\Klass;
use App\Schools;
use App\Student;
use App\Teachers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class KlassesController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $director = auth()->user();

//        dump($director->school);
//        die;
        $klasses = Klass::paginate(20);
        return view('director.klass.index', ['klasses' => $klasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $director = auth()->user();
        $school = Schools::where('director_id', $director->id)->get(['id', 'name'])->first();
        return view('director.klass.create', ['school' => $school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Klass::create($request->all());
        return redirect()->route('director.klass.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $klassId
     * @return Response
     */
    public function show($klassId)
    {
        $students = Student::where('klass_id', $klassId)->paginate(30);

        return view('teacher.student.index', ['students' => $students]);
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