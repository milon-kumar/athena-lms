<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="mb-2">Available Course</h3>
            </div>
        </div>

        <div class="position-relative">
            <ul class="controls availableCourseSliderController">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="availableCourseSlider">
                <?php $__currentLoopData = $available_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="<?php echo e(route('frontend.v2.details',$course->slug)); ?>">
                            <?php echo $__env->make('frontend.v2.components.home.available_course_card',['course'=>$course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH G:\Milon Kumar Running Project\oraska-lms-master\resources\views/frontend/v2/components/home/available_course.blade.php ENDPATH**/ ?>