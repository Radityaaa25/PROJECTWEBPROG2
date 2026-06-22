
<?php $__env->startSection('content'); ?>
<!-- template -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form class="form-horizontal" action="<?php echo e(route('backend.laporan.cetakuser')); ?>" method="post" target="_blank">
        <?php echo csrf_field(); ?>
        <div class="card-body">
          <h4 class="card-title"> <?php echo e($judul); ?> </h4>
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" name="tanggal_awal" onkeypress="return
        hanyaAngka(event)" value="<?php echo e(old('tanggal_awal')); ?>" class="form-control
        <?php $__errorArgs = ['tanggal_awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Jumlah Pinjam">
            <?php $__errorArgs = ['tanggal_awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback alert-danger" role="alert">
                <?php echo e($message); ?>

              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" onkeypress="return
        hanyaAngka(event)" value="<?php echo e(old('tanggal_akhir')); ?>" class="form-control
        <?php $__errorArgs = ['tanggal_akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Jumlah Pinjam">
            <?php $__errorArgs = ['tanggal_akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback alert-danger" role="alert">
                <?php echo e($message); ?>

              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Cetak</button>
          </form>
        </div>
        </div>
        </div>
        <!-- end template-->
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_user/form.blade.php ENDPATH**/ ?>