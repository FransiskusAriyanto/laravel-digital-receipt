
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
      <p class="lead"><h3> <b> Rp <?php echo e($kuitansi->nominal); ?></b> </h3> </p>
    </div>
    <div class="col-6">
      <div class="float-right">
        <p class="float-right"><b> <?php echo e($kuitansi->nama); ?></b> </p>
        
      </div>
    </div>
  </div>
</div>


<p>
<form method="POST" enctype="multipart/form-data" action="kuitansi/request/cipher/store">
<?php echo csrf_field(); ?>
<div class="mb-3">
  <input type="hidden" class="form-control <?php $__errorArgs = ['kuitansi_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-3 rounded-pill" id="kuitansi_id" name="kuitansi_id" value="<?php echo e($kuitansi->id); ?>">
  <?php $__errorArgs = ['kuitansi_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

  <input type="hidden" class="form-control <?php $__errorArgs = ['cipher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-3 rounded-pill" id="cipher" name="cipher" value="<?php echo Enkripsi($kuitansi->nomor); ?><?php echo Enkripsi($kuitansi->dari); ?><?php echo Enkripsi($kuitansi->nama); ?>">
  <?php $__errorArgs = ['cipher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<button type="submit" class="btn btn-primary" onclick="konfirmasi()">Buat QR Code</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ta\resources\views/main/buatcipher.blade.php ENDPATH**/ ?>