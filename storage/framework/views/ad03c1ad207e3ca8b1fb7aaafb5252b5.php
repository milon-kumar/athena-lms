<?php if($opinions->count() > 0): ?>
    <section class="py-5 my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-2 text-center">শিক্ষার্থীদের মতামত</h3>
            </div>
        </div>

        <div class="position-relative">
            <ul class="controls opinionsSliderController mt-md-4">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="opinionsSlider">
                <?php $__currentLoopData = $opinions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opinion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="card h-100">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="">
                                    <img src="<?php echo e(asset($opinion->image) ?? defaultImage()); ?>" class="rounded-circle avatar-xl mb-2" alt="avatar">
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p style="text-align: justify;" class="text-justify"><?php echo $opinion->description ?? ''; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH G:\Milon Kumar Running Project\oraska-lms-master\resources\views/frontend/v2/components/home/opinions.blade.php ENDPATH**/ ?>