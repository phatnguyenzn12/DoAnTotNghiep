<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('screens.mentor.certificate.list');
    }

    public function filterData(Request $request)
    {

        $certificates = Certificate::select('*')
        ->sortdata($request)
        ->search($request)
        ->paginate($request->record);
        $passedDown = [
            'data' => $certificates
        ];
        
        return response()->json($passedDown,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.mentor.certificate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $certificateImage = UploadFileService::storage_image($request->image);

        $certificate = $request->only(
            [
                'title',
                'description',
            ],
        );
        $certificate['image'] = $certificateImage;
        $certificate['mentor_id'] = auth()->guard('mentor')->user()->id;

        Certificate::create($certificate);

        return redirect()
            ->back()
            ->with('success', 'thêm chứng chỉ thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('screens.mentor.certificate.put', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $certificate->title = $request->title;
        $certificate->description = $request->description;
        if ($request->image) {
            $image = UploadFileService::storage_image($request->image);
            $certificate->image = $image;
        }
        $certificate->save();

        return redirect()
            ->back()
            ->with('success', 'Sửa chứng chỉ thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
