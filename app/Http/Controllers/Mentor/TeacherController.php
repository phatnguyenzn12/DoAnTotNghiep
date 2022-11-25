<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index()
    {
        $db = Mentor::all();
        
        return view('screens.mentor.teacher.list', compact('db'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $avatar = UploadFileService::storage_image($request->avatar);
            $teacher = Mentor::create(
                array_merge(
                    $request->all(),
                    [
                        'avatar' => $avatar,
                        'specialize_id' => 2,
                        'is_active' => 1,
                        'password' => Hash::make(12345678),
                    ],
                )
            );
            $teacher->assignRole('teacher');
            return redirect()
                ->route('mentor.teacher.index')
                ->with('success', 'Thêm giảng viên thành công');
        }
        return view('screens.mentor.teacher.create');
    }
}
