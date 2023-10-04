
@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h4>Course : {{ $course->title ?? '' }}</h4>
                        <h6 class="text-capitalize">Fill Up All Input Filed Carefully</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.course-details.update',$course->courseDetails->id ?? '')  }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
{{--                        @can('Class.List')--}}
{{--                            <a href="{{ route('admin.chapters.index')  }}" class="btn btn-success btn-sm float-end" style="margin-right: 10px;"><i class="mdi mdi-book-alert"></i> Classes</a>--}}
{{--                        @endcan--}}
{{--                        @can('LiveVideo.List')--}}
{{--                            <a href="{{ route('admin.live-video.index')  }}" class="btn btn-success btn-sm float-end" style="margin-right: 10px;"><i class="mdi mdi-video-plus"></i> Live Video</a>--}}
{{--                        @endcan--}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'created_by','placeholder'=>'টি' ,'value'=> 'Created By - '.auth()->user()->type,'readonly'=>'readonly'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'title','value'=> $course->title,'required'=>'required'])
                                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'course_id','value'=> $course->id,'readonly'=>'readonly'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Thumbnail Image( W-257 by H-220 )</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'course_image','placeholder'=>'Course Details Image'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Cover Image ( W-1350 by H-350 )</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Upload Course Details Image'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_course_students','required'=>'required','placeholder'=>'জন','value'=>$course->courseDetails->total_course_students ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">রেকর্ডেড ক্লাস ভিভিও সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'recorded_class_video','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->recorded_class_video ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'live_classes','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->live_classes ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস এর সময় </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_time','placeholder'=>'শনি , সোম , বুধ রাত ৯.০০ টা' ,'required'=>'required','value'=>$course->courseDetails->live_class_time ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_class_hours','placeholder'=>'ঘণ্টা' ,'required'=>'required','value'=>$course->courseDetails->total_class_hours ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'mcq_exams','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->mcq_exams ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'weekly_exams','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->weekly_exams ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'paper_final_exams','placeholder'=>'টি' ,'required'=>'required' ,'required'=>'required','value'=>$course->courseDetails->paper_final_exams ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" {{ $course->courseDetails->class_recorded == 1 ? 'checked' : ''}} class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> লাইভ ক্লাস কিভাবে হবে  </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_method','required'=>'required','placeholder'=>' ওয়েবঅ্যাপ ও ফেসবুক','value'=>$course->courseDetails->live_class_method ?? ''])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'url','name'=>'course_buy_video','required'=>'required','placeholder'=>'Input YouTube Video Link Here ','value'=>$course->courseDetails->course_buy_video ?? ''])
                                </div>

                                <div class="mb-3">
                                    <label for="projectname" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    <textarea name="course_description" id="courseDescription" rows="10" placeholder='Insert text 5000 characters max'>{!! $course->courseDetails->course_description ?? '' !!}</textarea>
{{--                                    @include('backend.admin.components.form_element.textarea',['name'=>'course_description','required'=>'required','rows'=>4,'placeholder'=>'Insert text 5000 characters max','value'=>$course->courseDetails->course_description ?? ''])--}}
                                </div>
                            </div> <!-- end col-->
                            <div class="col-xl-6">
                                <div class="mb-3 position-relative">
                                    <label for="project-overview" class="form-label">কোর্স এর শিক্ষক এর নাম ও বর্ণনাঃ (Can Choose Multiple)</label>
                                    <!-- Multiple Select -->
                                    <select class="select2 form-control select2-multiple border border-secondary" name="teachers[]" data-toggle="select2" multiple="multiple" data-placeholder="Select Course Teacher">
                                        @foreach(\App\Models\Teacher::get() as $teacher)
                                            <option
                                                {{ in_array($teacher->id ,json_decode($course->courseDetails->teachers ?? []) ?? [] ) ? 'selected' : ''}}
                                                value="{{ $teacher->id ?? '' }}">{{ $teacher->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    {{--                                    @foreach( json_decode($course->courseDetails->teachers)  as $cTeacher)--}}
                                    {{--                                        {{ $cTeacher == $teacher->id ? 'selected' : '' }}--}}
                                    {{--                                    @endforeach--}}
                                </div>

                                <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Add Facebook Private Discussion Group Link <code>https://www.example.com</code></label>
                                    @include('backend.admin.components.form_element.input',['type'=>'url','name'=>'fb_private_discussion_group','required'=>'required','placeholder'=>'Insert the link of facebook private group','value'=>$course->courseDetails->fb_private_discussion_group ?? ''])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Link</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','required'=>'required','placeholder'=>'Input YouTube Video Tag Here','value'=>$course->courseDetails->course_introduction_video ?? ''])
                                </div>
                                {{--                                <div class="mb-3 position-relative">--}}
                                {{--                                    <label class="form-label">Regular Course Fee</label>--}}
                                {{--                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'regular_course_fee','readonly'=>'readonly','value'=>$course->regular_course_fee,])--}}
                                {{--                                </div>--}}
                                {{--                                <div class="mb-3 position-relative">--}}
                                {{--                                    <label class="form-label">Discount</label>--}}
                                {{--                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','readonly'=>'readonly','value'=>$course->discount_fee,])--}}
                                {{--                                </div>--}}
                                {{--                                <div class="mb-3 position-relative">--}}
                                {{--                                    <label class="form-label">Full Course Fee (after Discount)</label>--}}
                                {{--                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,])--}}
                                {{--                                </div>--}}
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    <select class="form-control select2" name="category_id" data-toggle="select2">
                                        @foreach(\App\Models\Category::where('status','published')->latest()->get() as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>{{ $category->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'enrollment_validity','value'=>$course->courseDetails->enrollment_validity ?? ''])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Maximum view permit per video</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'video_view_permit','placeholder'=>'View Permit','value'=>3,'value'=>$course->courseDetails->video_view_permit ?? ''])
                                </div>
                                <div class="position-relative">
                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h5>Course Thumbnail ( W-257 by H-220 ) </h5>
                                        </div>
                                        <div class="card-body">
                                            <img style="width: 100%;height: auto;" src="{{  $course->image ? asset($course->image) : defaultImage() }}" alt="{{ $course->slug ?? 'Image Not Found' }}">
                                        </div>
                                    </div>
                                    <div class="card border shadow-sm">
                                        <div class="card-header">
                                            <h5>Course Cover Image (W-1350 by H-350)</h5>
                                        </div>
                                        <div class="card-body">
                                            <img style="width: 100%;height: auto;" src="{{  $course->courseDetails->image ? asset($course->courseDetails->image) : defaultImage() }}" alt="{{ $course->slug ?? 'Image Not Found' }}">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark btn-lg d-inline-block float-end" style="margin-right: 10px;">
                            <i class="mdi mdi-content-save"></i> Update Course Details </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#courseDescription'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
