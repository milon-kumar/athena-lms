<div class="card card-hover h-100">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center gap-4">
            <div class="available-course-image">
                <img src="{{asset($course->image) ?? defaultImage()}}" alt="">
            </div>
            <div class="">
                <h4>{{ \Illuminate\Support\Str::limit($course->title,28) ?? 'Course Title' }}</h4>
            </div>
        </div>
    </div>
</div>
