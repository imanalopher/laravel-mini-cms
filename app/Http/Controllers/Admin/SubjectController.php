<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::paginate(2);

        return view('admin.subject.index', ['subjects' => $subjects]);
    }
}
