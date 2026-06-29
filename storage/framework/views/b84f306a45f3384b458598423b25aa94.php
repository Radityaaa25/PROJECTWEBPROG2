<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Item Pesanan</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $show->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                      <td> <?php echo e($loop->iteration); ?> </td>
                      <td> <?php echo e($item->produk->nama_produk ?? '-'); ?> </td>
                      <td> Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?> </td>
                      <td> <?php echo e($item->jumlah); ?> </td>
                      <td> Rp. <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?> </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="5" class="text-center">Belum ada item pesanan</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th> Rp. <?php echo e(number_format($show->total_harga, 0, ',', '.')); ?> </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi Transaksi</h4>
            <p><strong>Kode:</strong> <?php echo e($show->kode_transaksi); ?> </p>
            <p><strong>Tanggal:</strong> <?php echo e($show->created_at->format('d-m-Y H:i')); ?> </p>
            <p><strong>Penerima:</strong> <?php echo e($show->nama_penerima); ?> </p>
            <p><strong>No. HP:</strong> <?php echo e($show->hp); ?> </p>
            <p><strong>Alamat:</strong> <?php echo e($show->alamat); ?> </p>
            <p><strong>Catatan:</strong> <?php echo e($show->catatan ?? '-'); ?> </p>
            <hr>
            <form action="<?php echo e(route('backend.transaksi.updateStatus', $show->id)); ?>" method="post">
              <?php echo method_field('put'); ?>
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label>Status Pesanan</label>
                <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                  <?php $__currentLoopData = ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($st); ?>" <?php echo e($show->status == $st ? 'selected' : ''); ?>> <?php echo e(ucfirst($st)); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback alert-danger" role="alert"> <?php echo e($message); ?> </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <button type="submit" class="btn btn-primary">Perbarui Status</button>
              <a href="<?php echo e(route('backend.transaksi.index')); ?>">
                <button type="button" class="btn btn-secondary">Kembali</button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_transaksi/show.blade.php ENDPATH**/ ?>