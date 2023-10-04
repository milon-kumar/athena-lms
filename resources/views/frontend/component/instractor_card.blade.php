
    <a href="">
        <div class="card text-dark">
            <div class="row g-0 align-items-center">
                <div class="col-md-4">
                    @if($teacher->image)
                        <img src="{{asset($teacher->image)}}" class="card-img" alt="{{$teacher->name}}">
                    @else
                        <img src="{{asset('/frontend/img/noimage.jpg')}}" class="card-img" alt="{{$teacher->name}}">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacher->name }}</h5>
                        <p class="card-text">{!! Str::limit($teacher->description,50) !!}</p>
                        <small><span class="text-dark">Phone:</span>{{$teacher->phone}}</small>
                        <small><span class="text-dark">Phone:</span>{{$teacher->email}}</small>
                    </div> <!-- end card-body-->
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
    </a>
