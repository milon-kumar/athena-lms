<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function lectureNotes($type)
    {
        if ($type == 'lecture-notes'){
            $lecture_notes =  Pdf::where('type','lecture-notes')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.lecture_notes',compact('lecture_notes','type'));
        }elseif ($type == 'cq-questions'){
            $cq_questions =  Pdf::where('type','cq-questions')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.cq_questions',compact('cq_questions','type'));
        }elseif ($type == 'cq-questions-solve'){
            $cq_questions_solves =  Pdf::where('type','cq-questions-solve')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.cq_questions_solve',compact('cq_questions_solves','type'));
        }elseif ($type == 'pdf-questions'){
            $pdf_questions =  Pdf::where('type','pdf-questions')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.pdf_questions',compact('pdf_questions','type'));
        }elseif ($type == 'pdf-questions-solve'){
            $pdf_questions_solves =  Pdf::where('type','pdf-questions-solve')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.pdf_questions_solve',compact('pdf_questions_solves','type'));
        }elseif ($type == 'omr-form-essentials'){
            $omr_form_essentials =  Pdf::where('type','omr-form-essentials')->where('course_id',courseId())->get();
            return view('backend.admin.pages.course.pdf.omr_form_essentials',compact('omr_form_essentials','type'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function pdfCreate($type)
    {
        return view('backend.admin.pages.course.pdf.create_pdf',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function pdfStore(Request $request)
    {
        //return $request;
        foreach ($request->serial as $key => $value){
            Pdf::create([
                'user_id'=>Auth::id(),
                'course_id'=>courseId(),
                'type' =>$request->type,
                'title'=>$request->title[$key],
                'serial'=>$request->serial[$key],
                'pdf'=>uploadPdf($request->pdf[$key])
            ]);
        }

        return redirect()->route('admin.pdf.all-pdf',['type'=>$request->type]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('backend.admin.pages.course.pdf.show',compact('pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('backend.admin.pages.course.pdf.edit',compact('pdf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pdf =  Pdf::findOrFail($id);
        if ($request->pdf){
            $path = $request->file('pdf')->store('/pdfs', ['disk' =>'my_files']);
        }else{
            $path = $pdf->pdf;
        }
        $pdf->update([
            'user_id'=>Auth::id(),
            'course_id'=>courseId(),
            'type' =>$request->type,
            'title'=>$request->title,
            'serial'=>$request->serial,
            'pdf'=>$path,
        ]);
        toast('Data Updated','success');
        return redirect()->route('admin.pdf.all-pdf',['type'=>$request->type]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pdf = Pdf::findOrFail($id);
        if ($pdf->pdf){
            @unlink($pdf->pdf);
        }
        $pdf->delete();
        toast('Data Deleted','success');
        return redirect()->route('admin.pdf.all-pdf',$pdf->type);
    }
}
