<div class="card-header text-white bg-dark">
    <h3 class="header-title d-inline"><span class="badge badge-success-lighten"></span></h3>
    <a href="{{ route('admin.exam.dashboard','image') }}"  class="btn btn-success btn-sm float-start">Image Question - ({{ \App\Models\Exam::where('type','image')->count()  }})</a>&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.exam.dashboard','text') }}"  class="btn btn-primary btn-sm float-start">Text Question - ({{ \App\Models\Exam::where('type','text')->count()  }})</a>
    <a href="{{ route('admin.exam.setting','image') }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Add Image Question</a>
    <a href="{{ route('admin.exam.setting','text') }}" class="btn btn-primary btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Add Text Question</a>
</div>
