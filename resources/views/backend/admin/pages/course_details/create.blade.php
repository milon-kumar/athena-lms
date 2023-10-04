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
                        <h6 class="text-capitalize">filup all input field carefully</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.course-details.store')  }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
{{--                        <a href="{{ route('admin.course-by-chapter',$course->id)  }}" class="btn btn-success btn-sm float-end" style="margin-right: 10px;"><i class="mdi mdi-book-alert"></i>Classes</a>--}}
{{--                        <a href="{{  route('admin.course.show',$course->id)  }}" class="btn btn-primary btn-sm float-end"  style="margin-right: 10px;"><i class="mdi mdi-pen-lock"></i> Exams</a>--}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'created_by','placeholder'=>'টি' ,'value'=> 'Created By - '.auth()->user()->type, 'required'=>'required','readonly'=>'readonly'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'title','value'=> $course->title])
                                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'course_id','value'=> $course->id,'readonly'=>'readonly'])
                                </div>
                                @if($course->is_copy == true)
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Thumbnail ( W-257 by H-220 )</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'course_image','placeholder'=>'Course Details Image'])
                                </div>
                                @endif
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Cover Image (W-1350 by H-350)<span class="fw-bolder text-danger">*</span></label>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>"Upload Course Image"])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_course_students','required'=>'required','placeholder'=>'জন'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">রেকর্ডেড ক্লাস ভিভিও সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'recorded_class_video','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'live_classes','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস এর সময় </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_time','placeholder'=>'শনি , সোম , বুধ রাত ৯.০০ টা' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_class_hours','placeholder'=>'ঘণ্টা' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'mcq_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'weekly_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'paper_final_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> লাইভ ক্লাস কিভাবে হবে  </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_method','required'=>'required','placeholder'=>' ওয়েবঅ্যাপ ও ফেসবুক '])
                                </div>
                                {{--                                <div class="mb-3">--}}
                                {{--                                    <label for="projectname" class="form-label">লাইভ ক্লাস কিভাবে হবে  </label>--}}
                                {{--                                    <div class="form-check form-switch">--}}
                                {{--                                        <input type="checkbox" name="live_class" value="is_facebook_live" class="form-check-input" id="is_facebook_live">--}}
                                {{--                                        <label class="form-check-label" for="is_facebook_live">Facebook Live Class</label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-check form-switch">--}}
                                {{--                                        <input type="checkbox" name="live_class" value="is_web_app_live"  class="form-check-input" id="is_web_app_live">--}}
                                {{--                                        <label class="form-check-label" for="is_web_app_live">Web APP Live class</label>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'url','name'=>'course_buy_video','required'=>'required','placeholder'=>'Input YouTube Video Link Here '])
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    <textarea name="course_description" id="courseDescription" placeholder='Insert text 5000 characters max'></textarea>
{{--                                    @include('backend.admin.components.form_element.textarea',['name'=>'','required'=>'required','rows'=>4,])--}}
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3 position-relative">
                                    <label for="project-overview" class="form-label">কোর্স এর শিক্ষক এর নাম ও বর্ণনাঃ (Can Choose Multiple)</label>
                                    <!-- Multiple Select -->
                                    <select class="select2 form-control select2-multiple border border-secondary" name="teachers[]" data-toggle="select2" multiple="multiple" data-placeholder="Select Course Teacher" required>
                                        @foreach(\App\Models\Teacher::get() as $teacher)
                                            <option value="{{ $teacher->id ?? '' }}">{{ $teacher->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Add Facebook Private Discussion Group Link <code>https://www.example.com</code></label>
                                    @include('backend.admin.components.form_element.input',['type'=>'url','name'=>'fb_private_discussion_group','required'=>'required','placeholder'=>'Insert the link of facebook private group'])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Tag</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','required'=>'required','placeholder'=>'Input YouTube Video Tag Here'])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Regular Course Fee</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'regular_course_fee','readonly'=>'readonly','value'=>$course->regular_course_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Discount</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','readonly'=>'readonly','value'=>$course->discount_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Full Course Fee (after Discount)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','readonly'=>'readonly','value'=>$course->category->name,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'enrollment_validity'])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Maximum view permit per video</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'video_view_permit','placeholder'=>'View Permit','value'=>3,])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark btn-lg d-inline-block float-end" style="margin-right: 10px;">
                            <i class="mdi mdi-content-save"></i> Save Course Details </button>
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
