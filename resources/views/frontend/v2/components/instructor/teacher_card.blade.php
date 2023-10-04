<div class="card h-100">
    <!-- Card body -->
    <div class="card-body">
        <div class="text-center">
            <img src="{{asset($teacher->image) ?? defaultImage()}}" class="rounded-circle avatar-xl mb-2" alt="avatar">
            <h4 class="mb-0">{{ $teacher->name ?? "Instructor Name" }}</h4>
            <p class="mb-0 fs-6 text-muted">{{ $teacher->email ?? 'example@gamil.com' }}</p>
        </div>
        <div class="d-flex justify-content-between border-bottom mt-4">
            <span>Details</span>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <p class="text-justify">{!! $teacher->description ?? '' !!}</p>
        </div>
    </div>
</div>
