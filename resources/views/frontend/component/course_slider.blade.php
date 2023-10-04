<div class="slick align-items-stretch" id="">
    @foreach($category->courses as $course)
        @include('frontend.component.single_course')
    @endforeach
</div>
