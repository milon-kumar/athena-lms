@if($course->status == 'pending' ?? '')
    <span class="badge badge-warning-lighten text-uppercase">{{ $course->status }}</span>
@elseif($course->status == 'published' ?? '')
    <span class="badge badge-success-lighten text-uppercase">{{ $course->status }}</span>
@elseif($course->status == 'unpublished' ?? '')
    <span class="badge badge-warning-lighten text-uppercase">{{ $course->status }}</span>
@elseif($course->status == 'decline' ?? '')
    <span class="badge badge-danger-lighten text-uppercase">{{ $course->status }}</span>
@endif
