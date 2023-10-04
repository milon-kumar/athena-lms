@if($teachers->count() > 0)
    <section class="py-5 my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-2 text-capitalize">Meet with our
                        genius {{ $teachers->count() > 1 ? 'Teacher’s' : 'Teacher' }} </h3>
                    {{--                - ( {{ $teachers->count() }} {{ $teachers->count() > 1 ? 'Teacher’s' : 'Teacher' }} )--}}
                </div>
            </div>

            {{--        <div class="position-relative">--}}
            {{--            <ul class="controls instrucorSliderController mt-md-4">--}}
            {{--                <li class="prev">--}}
            {{--                    <i class="fe fe-chevron-left"></i>--}}
            {{--                </li>--}}
            {{--                <li class="next">--}}
            {{--                    <i class="fe fe-chevron-right"></i>--}}
            {{--                </li>--}}
            {{--            </ul>--}}
            {{--            <div class="instrucorSlider">--}}
            {{--                @foreach($teachers as $teacher )--}}
            {{--                    <div class="item">--}}
            {{--                        @include('frontend.v2.components.instructor.teacher_card',['teacher'=>$teacher])--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}
            {{--            </div>--}}
            {{--        </div>--}}

            <div class="row">
                @foreach($teachers as $teacher)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header p-4">
                                <img src="{{asset($teacher->image) ?? defaultImage()}}" class="card-img-top rounded" alt="{{ $teacher->name ?? '' }}">
                            </div>
                            <div class="card-body">
                                <span class="h4 font-weight-normal text-gray">Christopher Wood</span>
                                <br/>
                                <span class="h5 font-weight-normal text-gray">Co-Founder Themesberg</span>
                                <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="">
                                      <a href=""><i class="mdi mdi-facebook" style="font-size: 30px;color: #0866FF;"></i></a>
                                      <a href=""><i class="mdi mdi-youtube" style="font-size: 34px;color: #ff0600;"></i></a>
                                  </div>
                                  <div class="">
                                      <a href="" class="btn btn-sm">All Courses</a>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
