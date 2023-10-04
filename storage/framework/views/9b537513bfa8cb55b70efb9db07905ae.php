<section>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="<?php echo e($key); ?>"
                        class="<?php echo e($key == 0 ? 'active' : ''); ?>"
                        aria-current="true"
                        aria-label="Slide 1"
                        style="width: 15px;height: 15px;border-radius: 100%;"
                >
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-inner">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                <div class="heroSlider">
                    <img src="<?php echo e(asset($slider->image) ?? defaultImage()); ?>" class="d-block w-100" alt="Slider Image">
                </div>
                <div class="carousel-caption mb-4">
                    <div class="">
                        <a href="<?php echo e($slider->link ?? ''); ?>" class="btn btn-primary btn-sm float-end">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<?php /**PATH G:\Milon Kumar Running Project\oraska-lms-master\resources\views/frontend/v2/components/home/hero.blade.php ENDPATH**/ ?>