<?php $__env->startSection('style'); ?>
    <style>
        .available-course-image img{
            width: 50px;
            height: 50px;
            border-radius: 50px;
            border: 2px solid var(--primary);
            overflow: hidden;
        }
        .buyIcon{
            width: 60px;
            height: 60px;
            border-radius: 50px;
            box-shadow: 0 0 1px 3px var(--primary);
        }
        .buyIcon img{
            width: 100%;
            height: 100%;
        }

        /*.heroSlider{*/
        /*    height: 500px;*/
        /*    width: 1350px;*/
        /*    min-width: 1350px;*/
        /*}*/

        /*.heroSlider img{*/
        /*    height: 100%;*/
        /*    width: 100% !important;*/
        /*}*/
        /*@media only screen and (max-width: 600px) and (min-width: 150px)  {*/
        /*    .heroSlider{*/
        /*        width: 480px !important;*/
        /*        height: 250px !important;*/
        /*    }*/
        /*}*/

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.v2.components.home.hero',['sliders'=>$sliders], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.fetures', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.available_course', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.about_us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($category->publishedCourses->count() > 0): ?>
            <section class="pt-lg-6 pb-lg-3 pt-3 pb-3">
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="mb-0"><?php echo e($category->name ?? ''); ?> ( <?php echo e($category->publishedCourses->count()); ?> <?php echo e($category->publishedCourses->count()>1 ? "Courses":"Course"); ?> )</h2>
                    </div>
                </div>

                <div class="position-relative">
                    <ul class="controls courseSliderControls" id="courseSliderControlsId-<?php echo e($loop->index); ?>">
                        <li class="prev">
                            <i class="fe fe-chevron-left"></i>
                        </li>
                        <li class="next">
                            <i class="fe fe-chevron-right"></i>
                        </li>
                    </ul>
                    <div class="courseSlider" id="courseSlider-<?php echo e($loop->index); ?>">
                        <?php $__currentLoopData = $category->publishedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <?php echo $__env->make('frontend.v2.components.course.course_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('frontend.v2.components.home.instructor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.opinions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.buy_course', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.v2.components.home.ssl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $(".courseSlider#courseSlider-<?php echo e($loop->index); ?>").length && tns(
                    {
                        container: ".courseSlider#courseSlider-<?php echo e($loop->index); ?>",
                        loop: false,
                        startIndex: 2,
                        slideBy: "page",
                        items: 1,
                        nav: !1,
                        autoplay: 1,
                        speed: 400,
                        autoplayButtonOutput: !1,
                        mouseDrag: 1,
                        lazyload: 1,
                        gutter: 20,
                        swipeAngle: false,
                        controlsContainer: ".courseSliderControls#courseSliderControlsId-<?php echo e($loop->index); ?>",
                        responsive:
                            {
                                768: { items: 2 },
                                990: { items: 3 },
                                1024: { items: 4 }
                            }
                    });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            $(".availableCourseSlider").length && tns(
                {
                    container: ".availableCourseSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".availableCourseSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });

            $(".instrucorSlider").length && tns(
                {
                    container: ".instrucorSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".instrucorSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });


            $(".opinionsSlider").length && tns(
                {
                    container: ".opinionsSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".opinionsSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });
        })
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.v2.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Running Project\oraska-lms-master\resources\views/frontend/v2/pages/home/home.blade.php ENDPATH**/ ?>