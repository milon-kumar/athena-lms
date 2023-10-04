<div class="row mb-3">
    <ul class="nav nav-lb-tab border-bottom-0">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('student.post.index') ? 'active' : '' }}" href="{{ route('student.post.index') }}">All Post</a>
        </li>
        <li class="nav-item {{ Route::is('student.post.my-post') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('student.post.my-post') }}">My Post</a>
        </li>
        <li class="nav-item {{ Route::is('student.post.today-post') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('student.post.today-post') }}">Today Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('student.post.create') ? 'active' : '' }}" href="{{ route('student.post.create') }}">Create Post</a>
        </li>
    </ul>
</div>
