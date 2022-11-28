<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $db_courses = new Course();;
        $db = $db_courses->loadList();
        return view('screens.admin.mentor.list', compact('db'));
    }
}
