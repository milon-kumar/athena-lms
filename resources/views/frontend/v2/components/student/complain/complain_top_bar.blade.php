<div class="row mb-3">
    <ul class="nav nav-lb-tab border-bottom-0">
        <li class="nav-item {{ Route::is('student.complain.index') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('student.complain.index') }}">All Complain</a>
        </li>
        <li class="nav-item {{ Route::is('student.complain.create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('student.complain.create') }}">Create Issue</a>
        </li>
    </ul>
</div>
