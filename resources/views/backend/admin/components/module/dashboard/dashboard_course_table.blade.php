@php
    use App\Models\Course;
    $courses = Course::with(['category:id,name','videos','chapters','exams','comments'])->latest()->orderBy('id','DESC')->get();
@endphp
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header text-white bg-dark">
                <h3 class="header-title d-inline">All Course <span class="badge badge-success-lighten">{{$courses->count()}}</span></h3>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 text-dark">
                    <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Class</th>
                        <th>Class Video</th>
                        <th>Total Exam</th>
                        <th>Total View</th>
                        <th>Total Exam Held</th>
                        <th>Asked Question</th>
                        <th>Copy Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $key => $course)
                        <tr class="text-dark">
                            <td>
                                <div class="form-check form-radio-dark">
                                    <input type="radio" {{ $course->id == courseId() ? 'checked' : '' }} name="course_id" id="course-{{$course->id}}" onclick="setId({{ $course->id }})" class="form-check-input border border-dark">
                                    <label class="form-check-label fw-bolder" style="cursor: pointer;" for="course-{{$course->id}}">{{ optional($course)->title }}</label>
                                </div>
                            </td>
                            <td>{{ $course->chapters->count() ?? 0 }}</td>
                            <td>{{ $course->videos->count() ?? 0 }}</td>
                            <td>{{ $course->exams->count() ?? 0 }}</td>
                            <td>{{ $course->view_count ?? '' }}</td>
                            <td>0</td>
                            <td>{{ $course->comments->count() ?? 0 }}</td>
                            <td>
                                @if($course->is_copy == true)
                                    <span class="badge badge-dark-lighten text-uppercase">Copy Course</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn text-white shadow
                                    @if($course->status == 'published')
                                    btn-success
                                    @elseif($course->status == 'pending')
                                    btn-warning
                                    @elseif($course->status == 'disable')
                                    btn-danger
                                    @else
                                    btn-dark
                                    @endif
                                 btn-sm text-capitalize">{{ $course->status }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
