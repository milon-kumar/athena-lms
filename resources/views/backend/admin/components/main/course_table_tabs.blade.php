<a href= "{{route('admin.all-course')}}" class="btn btn-{{ Route::is('admin.main.main-all-course') ? 'primary' : 'success' }}">All Course</a>
<a href= "{{route('admin.pending-course')}}" class="btn btn-{{ Route::is('admin.pending-course') ? 'primary' : 'success' }}">Pending Course</a>
<a href= "{{route('admin.published-course')}}" class="btn btn-{{ Route::is('admin.published-course') ? 'primary' : 'success' }}">Published Course</a>
<a href= "{{route('admin.unpublished-course')}}" class="btn btn-{{ Route::is('admin.unpublished-course') ? 'primary' : 'success' }}">Unpublished Course</a>
<a href= "{{route('admin.decline-course')}}" class="btn btn-{{ Route::is('admin.decline-course') ? 'primary' : 'success' }}">Disabled Course</a>

<a href= "{{route('admin.course.create')}}" class="btn btn-success float-end">A New Course</a>
