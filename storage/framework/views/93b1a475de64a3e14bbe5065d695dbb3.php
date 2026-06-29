
<?php $__env->startSection('content'); ?>
  <!-- contentAwal -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <form action="<?php echo e(route('backend.user.update', $edit->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo method_field('put'); ?>
            <?php echo csrf_field(); ?>
            <div class="card-body">
              <h4 class="card-title"> <?php echo e($judul); ?> </h4>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Foto</label>
                    
                    <?php if($edit->foto): ?>
                      <img src="<?php echo e(asset('storage/img-user/' . $edit->foto)); ?>" class="foto-preview" width="100%">
                      <p></p>
                    <?php else: ?>
                      <img src="<?php echo e(asset('storage/img-user/img-default.jpg')); ?>" class="foto-preview" width="100%">
                      <p></p>
                    <?php endif; ?>
                    
                    <input type="file" name="foto" class="form-control
    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="previewFoto()">
                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Hak Ases</label>
                    <select name="role" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                      <option value="" <?php echo e(old('role', $edit->role) == ''
    ? 'selected' : ''); ?>> -
                        Pilih Hak Akses -</option>
                      <option value="1" <?php echo e(old('role', $edit->role) ==
    '1' ? 'selected' : ''); ?>>
                        Super Admin</option>
                      <option value="0" <?php echo e(old('role', $edit->role) ==
    '0' ? 'selected' : ''); ?>>
                        Admin</option>
                    </select>
                    <?php $__errorArgs = ['role'];
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
                    <label>Status</label>
                    <select name="status" class="form-control
    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                      <option value="" <?php echo e(old('status', $edit->status) ==
    '' ? 'selected' : ''); ?>> -
                        Pilih Hak Akses -</option>
                      <option value="1" <?php echo e(old('status', $edit->status)
    == '1' ? 'selected' : ''); ?>>
                        Aktif</option>
                      <option value="0" <?php echo e(old('status', $edit->status)
    == '0' ? 'selected' : ''); ?>>
                        NonAktif</option>
                    </select>
                    <?php $__errorArgs = ['status'];
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
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?php echo e(old(
    'nama',
    $edit->nama
  )); ?>" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nama">
                    <?php $__errorArgs = ['nama'];
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
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo e(old(
    'email',
    $edit->email
  )); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Email">
                    <?php $__errorArgs = ['email'];
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
                    <label>HP</label>
                    <input type="text" onkeypress="return
                          hanyaAngka(event)" name="hp" value="<?php echo e(old('hp', $edit->hp)); ?>" class="form-control
                          <?php $__errorArgs = ['hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nomor HP">
                    <?php $__errorArgs = ['hp'];
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
              </div>
            </div>
            <div class="border-top">
              <div class="card-body">
                <button type="submit" class="btn btnprimary">Perbaharui</button>
                <a href="<?php echo e(route('backend.user.index')); ?>">
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
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_user/edit.blade.php ENDPATH**/ ?>