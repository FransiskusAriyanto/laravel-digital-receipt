
<?php $__env->startSection('title','Validasi Data'); ?>
<?php $__env->startSection('content'); ?>
<?php if(\Session::has('status')): ?>
    <div class="alert alert-success">
        <ul>
            <li><?php echo \Session::get('status'); ?></li>
        </ul>
    </div>
<?php endif; ?>

<?php if(\Session::has('fake')): ?>
    <div class="alert alert-warning">
        <ul>
            <li><?php echo \Session::get('fake'); ?></li>
        </ul>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-4">
        <div id="reader" width="400px"></div>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/validasi/scancam">
    <?php echo csrf_field(); ?>
        <div class="col-12">
          <input type="hidden" class="form-control <?php $__errorArgs = ['hasil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-3 rounded-pill" id="hasil" name="hasil" value="<?php echo e(old('hasil')); ?>">
          <p></p>
        </div>
        <button type="submit" class="btn btn-primary" onclick="konfirmasi()">Validasi</button>
    </form>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>

<script>
function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult);
    $("#hasil").val(decodedText)
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ta\resources\views/main/validasi.blade.php ENDPATH**/ ?>