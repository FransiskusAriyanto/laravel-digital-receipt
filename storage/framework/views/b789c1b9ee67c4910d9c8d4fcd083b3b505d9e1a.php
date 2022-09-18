
<?php $__env->startSection('title','Digital Signature'); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12 pb-2 p-3">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nomor Kuitansi</th>
                <th>Telah terima dari</th>
                <th>Penanggung jawab</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kuitansi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($loop->iteration); ?></th>
                <td><?php echo e(($kuitansi->nomor)); ?></td>
                <td><?php echo e($kuitansi->dari); ?></td>
                <td><?php echo e($kuitansi->nama); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Digital Signature</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kuitansi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($loop->iteration); ?></th>
                <td><?php echo e($kuitansi->cipher->cipher); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ta\resources\views/main/ds.blade.php ENDPATH**/ ?>