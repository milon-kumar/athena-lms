@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-primary">
                    <div class="card-body profile-user-box">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="{{$user->image ? asset($user->image) : asset('images/user.webp') }}" alt="{{ $user->name ?? 'Profile Image'}}" class="rounded-circle img-thumbnail h-100 w-100">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-1 text-white fw-bold">{{ $user->name ?? '' }}</h4>
                                            <p class="font-13 text-white-50"> {{ $user->email ?? '' }}</p>

                                            <ul class="mb-0 list-inline text-light">
{{--                                                <li class="list-inline-item me-3">--}}
{{--                                                    <h5 class="mb-1">{{ $enrole->course->count() ?? 0 }}</h5>--}}
{{--                                                    <p class="mb-0 font-13 text-white-50">Total Class</p>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-inline-item">--}}
{{--                                                    <h5 class="mb-1">{{ $enrole->course->videos->count() ?? 0 }}</h5>--}}
{{--                                                    <p class="mb-0 font-13 text-white-50">Total Video</p>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{ route('student.profile.edit',$user->id) }}" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                    </a>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-4">
                <!-- Personal-Information -->
                <div class="card">
                    <div class="card-body">
                        @if($user->about)
                            <h4 class="header-title mt-0 mb-3">About Yours</h4>
                            <p class="text-muted font-13">{!! $user->about ?? '' !!}</p>
                            <hr/>
                        @endif

                        <div class="text-start">
                            @if($user->name)
                                <p class="text-muted"><strong>Profile Name :</strong> <span class="ms-2">{{ $user->name ?? '' }}</span></p>
                            @endif
                            @if($user->father_name)
                                <p class="text-muted"><strong>Father’s Name :</strong> <span class="ms-2">{{ $user->father_name ?? '' }}</span></p>
                            @endif
                            @if($user->mother_name)
                                <p class="text-muted"><strong>Mother’s Name :</strong> <span class="ms-2">{{ $user->mother_name ?? '' }}</span></p>
                            @endif

                            @if($user->phone)
                                <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">{{ $user->phone ?? '' }}</span></p>
                            @endif

                            @if($user->email)
                                <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $user->email ?? '' }}</span></p>
                            @endif
                            @if($user->thana && $user->district)
                                <p class="text-muted"><strong>Location :</strong> <span class="ms-2">Thana : {{ $user->thana ?? '' }} , District : {{ $user->district ?? ''}}</span></p>
                            @endif
                            @if($user->institute)
                                <p class="text-muted"><strong>School/College Name:</strong> <span class="ms-2">{{ $user->institute ?? '' }}</span></p>
                            @endif
                            {{--                            <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>--}}
                            {{--                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="" title="Facebook"><i class="mdi mdi-facebook"></i></a>--}}
                            {{--                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="" title="Twitter"><i class="mdi mdi-twitter"></i></a>--}}
                            {{--                                <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="" title="Skype"><i class="mdi mdi-skype"></i></a>--}}
                            {{--                            </p>--}}

                        </div>
                    </div>
                </div>
                <!-- Personal-Information -->
                {{--
                   <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    <div class="card-body">
                                        <div class="toll-free-box text-center">
                                            <h4> <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901</h4>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->
                                <!-- Messages-->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Messages</h4>

                                        <div class="inbox-widget">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('/') }}backend/assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('/') }}backend/assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('/') }}backend/assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>

                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('/') }}backend/assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('/') }}backend/assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Adhamdannaway</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                        </div> <!-- end inbox-widget -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                 --}}
            </div> <!-- end col-->

            <div class="col-xl-8">

                <!-- Chart-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Quick Links</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="" class="card bg-danger">
                                    <div class="card-body">
                                        <h3 class="text-white">Class Videos</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="" class="card bg-success">
                                    <div class="card-body">
                                        <h3 class="text-white">Online Exams</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="" class="card bg-warning">
                                    <div class="card-body">
                                        <h3 class="text-white">Buy New Courses</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="" class="card bg-primary">
                                    <div class="card-body">
                                        <h3 class="text-white">Complain Box</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="" class="card bg-danger">
                                    <div class="card-body">
                                        <h3 class="text-white">Community Post</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Chart-->
                {{--
                 <div class="row">
                     <div class="col-sm-4">
                         <div class="card tilebox-one">
                             <div class="card-body">
                                 <i class="dripicons-basket float-end text-muted"></i>
                                 <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                                 <h2 class="m-b-20">1,587</h2>
                                 <span class="badge bg-primary"> +11% </span> <span class="text-muted">From previous period</span>
                             </div> <!-- end card-body-->
                         </div> <!--end card-->
                     </div><!-- end col -->

                     <div class="col-sm-4">
                         <div class="card tilebox-one">
                             <div class="card-body">
                                 <i class="dripicons-box float-end text-muted"></i>
                                 <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                                 <h2 class="m-b-20">$<span>46,782</span></h2>
                                 <span class="badge bg-danger"> -29% </span> <span class="text-muted">From previous period</span>
                             </div> <!-- end card-body-->
                         </div> <!--end card-->
                     </div><!-- end col -->

                     <div class="col-sm-4">
                         <div class="card tilebox-one">
                             <div class="card-body">
                                 <i class="dripicons-jewel float-end text-muted"></i>
                                 <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                                 <h2 class="m-b-20">1,890</h2>
                                 <span class="badge bg-primary"> +89% </span> <span class="text-muted">Last year</span>
                             </div> <!-- end card-body-->
                         </div> <!--end card-->
                     </div><!-- end col -->

                 </div>
                 <!-- end row -->
                 <div class="card">
                     <div class="card-body">
                         <h4 class="header-title mb-3">My Products</h4>

                         <div class="table-responsive">
                             <table class="table table-hover table-centered mb-0">
                                 <thead>
                                 <tr>
                                     <th>Product</th>
                                     <th>Price</th>
                                     <th>Stock</th>
                                     <th>Amount</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                     <td>ASOS Ridley High Waist</td>
                                     <td>$79.49</td>
                                     <td><span class="badge bg-primary">82 Pcs</span></td>
                                     <td>$6,518.18</td>
                                 </tr>
                                 <tr>
                                     <td>Marco Lightweight Shirt</td>
                                     <td>$128.50</td>
                                     <td><span class="badge bg-primary">37 Pcs</span></td>
                                     <td>$4,754.50</td>
                                 </tr>
                                 <tr>
                                     <td>Half Sleeve Shirt</td>
                                     <td>$39.99</td>
                                     <td><span class="badge bg-primary">64 Pcs</span></td>
                                     <td>$2,559.36</td>
                                 </tr>
                                 <tr>
                                     <td>Lightweight Jacket</td>
                                     <td>$20.00</td>
                                     <td><span class="badge bg-primary">184 Pcs</span></td>
                                     <td>$3,680.00</td>
                                 </tr>
                                 <tr>
                                     <td>Marco Shoes</td>
                                     <td>$28.49</td>
                                     <td><span class="badge bg-primary">69 Pcs</span></td>
                                     <td>$1,965.81</td>
                                 </tr>
                                 </tbody>
                             </table>
                         </div> <!-- end table responsive-->
                     </div> <!-- end col-->
                 </div> <!-- end row-->

                --}}
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- container -->
@endsection
