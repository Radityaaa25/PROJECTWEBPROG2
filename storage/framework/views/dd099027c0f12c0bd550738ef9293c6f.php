
<?php $__env->startSection('content'); ?>
  <!-- contentAwal -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <form class="form-horizontal" action="<?php echo e(route('backend.kategori.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="card-body">
              <h4 class="card-title"> <?php echo e($judul); ?> </h4>
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?php echo e(old('nama_kategori')); ?>" class="form-control <?php $__errorArgs = ['nama_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                  placeholder="Masukkan Nama Kategori">
                <?php $__errorArgs = ['nama_kategori'];
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
            </div>
            <div class="border-top">
              <div class="card-body">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo e(route('backend.kategori.index')); ?>">
                  <button type="button" class="btn btnsecondary">Kembali</button>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- contentAkhir -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_kategori/create.blade.php ENDPATH**/ ?>