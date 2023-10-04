@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="card">
        <div class="card-header">
            <h4>All Live Videos - ( {{ $videos->total() }} )</h4>
            <p class="m-0 text-danger text-bold fw-bold">You Can view a video for maximum {{ $course->courseDetails->video_view_permit ?? '' }} times</p>
        </div>
        <div class="card-body">
            @if($videos->count() > 0)
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">
                                Videos
                            </th>
                            <th scope="col">
                                View Count
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>

                                    <a
                                        @if($video->userHitCount->count() >= $course->courseDetails->video_view_permit)
                                        onclick="maxShowVideo({{ $course->courseDetails->video_view_permit }})"
                                        @else
                                        href="{{ route('student.single-live-video',$video->id) }}"
                                        @endif
                                        class="text-inherit">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="{{ asset('/') }}frontend/images/default_play.png" alt="" class="img-4by3-lg rounded">
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="mb-1 text-primary-hover">
                                                    {{ Str::limit($video->title,40) ?? '' }}
                                                </h4>
                                                <span class="text-muted">Added on {{ $video->created_at->format("d M Y") }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
{{--                                <td>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <img src="{{ asset($video?->course?->image) ?? defaultImage() }}" alt="" class="rounded-circle avatar-xs me-2">--}}
{{--                                        <h5 class="mb-0">{{ \Illuminate\Support\Str::limit($video?->course?->title,25) ?? '' }}</h5>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
                                <td>
                                    <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>{{ $video->userHitCount->count() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="row my-5">
                    <div class="col-md-12">
                        <h1 class="text-center">No Video Found</h1>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <ul class="float-end">
                <li>{!! $videos->links() !!}</li>
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function maxShowVideo(count) {
            Swal.fire({
                title: 'Sorry!',
                text: `You Video Show Count ${count} Maxmium!`,
                icon: 'warning',
            })
        }
    </script>
@endsection
