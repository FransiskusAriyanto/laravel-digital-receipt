
<?php $__env->startSection('title','Data Kuitansi'); ?>
<?php $__env->startSection('content'); ?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nomor Kuitansi</th>
            <th>Telah terima dari</th>
            <th>Terbilang</th>
            <th>Untuk transaksi</th>
            <th>Uang sejumlah</th>
            <th>Tempat dan waktu</th>
            <th>Penanggung jawab</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kuitansi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e(($kuitansi->nomor)); ?></td>
            <td><?php echo e($kuitansi->dari); ?></td>
            <td><?php echo Convert($kuitansi->nominal); ?> rupiah</td>
            <td><?php echo e($kuitansi->transaksi); ?></td>
            <td><?php echo e($kuitansi->nominal); ?></td>
            <td> <?php echo e($kuitansi->lokasi); ?>, <?php echo e($kuitansi->tanggal); ?> <?php echo Bulan($kuitansi->bulan); ?> <?php echo e($kuitansi->tahun); ?></td>
            <td><?php echo e($kuitansi->nama); ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="/kuitansi/<?php echo e($kuitansi->id); ?>">
                    <i class="fas fa-folder">
                    </i>
                    Lihat Data
                </a>
                <form action="/kuitansi/<?php echo e($kuitansi->id); ?>" method="post" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Hapus Data?')">
                        <i class="fas fa-trash">
                        </i>
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ta\resources\views/main/index.blade.php ENDPATH**/ ?>