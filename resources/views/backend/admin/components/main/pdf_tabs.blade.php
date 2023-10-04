<a href= "{{route('admin.course.edit-course')}}" class="btn {{ Route::is('admin.course.edit-course') ? 'btn-primary' : 'btn-success' }}">Add/Edit Course Content</a>
<a href= "{{route('admin.pdf.all-pdf',['type'=>'lecture-notes'])}}"
   class="btn {{ request()->segment(3) == 'lecture-notes' ? 'btn-primary' : 'btn-success' }}">PDF Lecture Notes</a>

<a href= "{{route('admin.pdf.all-pdf',['type'=>'cq-questions'])}}"
   class="btn {{ request()->segment(3) == 'cq-questions'  ? 'btn-primary' : 'btn-success' }}">PDF CQ Questions</a>

<a href= "{{route('admin.pdf.all-pdf',['type'=>'cq-questions-solve'])}}"
   class="btn {{ request()->segment(3) == 'cq-questions-solve' ? 'btn-primary' : 'btn-success' }}">PDF CQ Questions Solve</a>

<a href= "{{route('admin.pdf.all-pdf',['type'=>'pdf-questions'])}}"
   class="btn {{ request()->segment(3) == 'pdf-questions' ? 'btn-primary' : 'btn-success' }}">PDF Questions</a>

<a href= "{{route('admin.pdf.all-pdf',['type'=>'pdf-questions-solve'])}}"
   class="btn {{ request()->segment(3) == 'pdf-questions-solve'  ? 'btn-primary' : 'btn-success' }}">PDF Questions Solve</a>

<a href= "{{route('admin.pdf.all-pdf',['type'=>'omr-form-essentials'])}}"
   class="btn {{ request()->segment(3) == 'omr-form-essentials' ? 'btn-primary' : 'btn-success' }}">OMR Form & Essentials</a>

@if(!Route::is('admin.course.edit-course'))
    <a href= "{{route('admin.pdf.pdf-create',[$type ?? ''])}}" class="btn btn-success float-end">Add <i class="mdi mdi-plus-circle"></i></a>
@endif

