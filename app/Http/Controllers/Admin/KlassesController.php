<?php

namespace App\Http\Controllers\Admin;

use App\Klass;
use App\Schools;
use App\Teachers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class KlassesController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $klasses = Klass::paginate(20);
        return view('admin.klass.index', ['klasses' => $klasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $schools = Schools::get(['id', 'name']);
        return view('admin.klass.create', ['schools' => $schools]);
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
        return redirect()->route('admin.klass.index');
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
