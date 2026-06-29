
<?php $__env->startSection('content'); ?>
  <!-- contentAwal -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php echo e($judul); ?></h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori_id" class="form-control <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled>
                    <option value="" selected> - Pilih Kategori - </option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($row->id); ?>" <?php echo e(old('kategori_id', $show->kategori_id) == $row->id ? 'selected' : ''); ?>>
                        <?php echo e($row->nama_kategori); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['kategori_id'];
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
                  <label>Nama Produk</label>
                  <input type="text" name="nama_produk" value="<?php echo e(old('nama_produk', $show->nama_produk)); ?>"
                    class="form-control <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nama Produk"
                    disabled>
                  <?php $__errorArgs = ['nama_produk'];
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
                  <label>Detail</label>
                  <textarea name="detail" class="form-control <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ckeditor"
                    disabled><?php echo e(old('detail', $show->detail)); ?></textarea>
                  <?php $__errorArgs = ['detail'];
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
                  <label>Foto Utama</label> <br>
                  <img src="<?php echo e(asset('storage/img-produk/' . $show->foto)); ?>" class="foto-preview" width="100%">
                </div>
              </div>
              <div class="col-md-6">
                <label>Foto Tambahan</label>
                <div id="foto-container">
                  <div class="row">
                    <?php $__currentLoopData = $show->gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-8">
                        <img src="<?php echo e(asset('storage/img-produk/' . $gambar->foto)); ?>" width="100%">
                      </div>
                      <div class="col-md-4">
                        <form action="<?php echo e(route('backend.foto_produk.destroy', $gambar->id)); ?>" method="post">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('delete'); ?>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <br>
                </div>
                <button type="button" class="btn btn-primary add-foto mt-2">Tambah Foto</button>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <a href="<?php echo e(route('backend.produk.index')); ?>">
                <button type="button" class="btn btn-secondary">Kembali</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contentAkhir -->
<?php $__env->stopSection(); ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const fotoContainer = document.getElementById('foto-container');
    const addFotoButton = document.querySelector('.add-foto');
    addFotoButton.addEventListener('click', function () {
      const fotoRow = document.createElement('div');
      fotoRow.classList.add('form-group', 'row');
      fotoRow.innerHTML = `
        <form action="<?php echo e(route('backend.foto_produk.store')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="col-md-12">
            <input type="hidden" name="produk_id" value="<?php echo e($show->id); ?>">
            <input type="file" name="foto_produk[]" class="form-control <?php $__errorArgs = ['foto_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      `;
      fotoContainer.appendChild(fotoRow);
    });
  });
</script>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_produk/show.blade.php ENDPATH**/ ?>