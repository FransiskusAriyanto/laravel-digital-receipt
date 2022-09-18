
<?php $__env->startSection('title','Data Kuitansi'); ?>
<?php $__env->startSection('content'); ?>
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> Kuitansi
        <br></br>
        <small class="float-right"><?php echo e($kuitansi->lokasi); ?>, <?php echo e($kuitansi->tanggal); ?> <?php echo Bulan($kuitansi->bulan); ?> <?php echo e($kuitansi->tahun); ?></small>
      </h4>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <tbody>
        <tr>
          <td>Nomor</td>
          <td>: <?php echo e($kuitansi->nomor); ?></td>
        </tr>
        <tr>
          <td>Telah Terima Dari</td>
          <td>: <?php echo e($kuitansi->dari); ?></td>
        </tr>
        <tr>
          <td>Uang Sejumlah</td>
          <td>: <?php echo Convert($kuitansi->nominal); ?> rupiah</td>
        </tr>
        <tr>
          <td>Untuk Pembayaran</td>
          <td>: <?php echo e($kuitansi->transaksi); ?></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="row">
    <div class="col-6">
      <br></br>
      <p class="lead"><h3> <b> <i> Rp <?php echo e($kuitansi->nominal); ?> </i> </b> </h3> </p>
    </div>
    <div class="col-6">
      <div class="float-right">
        <p class="float-right"><b> <?php echo e($kuitansi->nama); ?></b> </p>
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        <div class="visible-print text-center">
            <?php echo QrCode::size(100)->generate($kuitansi->cipher->cipher); ?>

        </div>
          
        </p>
      </div>
    </div>
  </div>
  <p></p>
  <div class="row no-print">
    <div class="col-12">
      <a href="/kuitansi/print/<?php echo e($kuitansi->id); ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>Print</a>
      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
        <i class="fas fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ta\resources\views/main/show.blade.php ENDPATH**/ ?>