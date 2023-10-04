
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header text-white bg-dark">
                <h3 class="header-title text-white">Web Front Page Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @can('Slider.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.slider.index') }}">
                                <h4 class="text-center text-white {{ Route::is('admin.slider.index') ? 'bg-primary' : 'bg-success'  }} p-2">Cover Image Slider</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Our_Talk')
                        <div class="col-md-3">
                            <a href="{{ route('admin.our-talk') }}">
                                <h4 class="text-center text-white {{ Route::is('admin.our-talk') ? 'bg-primary' : 'bg-success'  }} p-2">আমাদের কথা</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Teacher.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.teacher.index') }}">
                                <h4 class="text-center text-white {{ Route::is('admin.teacher.index') ? 'bg-primary' : 'bg-success'  }} p-2">Our Course Teacher’s</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Opinion.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.opinion.index') }}" onclick="">
                                <h4 class="text-center text-white {{ Route::is('admin.opinion.*') ? 'bg-primary' : 'bg-success'  }} p-2">Student Opinion</h4>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
