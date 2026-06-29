
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"> <?php echo e($judul); ?> </h5>

          <form method="GET" action="<?php echo e(route('backend.laporan_penjualan.index')); ?>" class="form-inline mb-4">
            <div class="form-group mr-2">
              <label class="mr-2">Tanggal Awal</label>
              <input type="date" name="tanggal_awal" class="form-control" value="<?php echo e($tanggal_awal); ?>" required>
            </div>
            <div class="form-group mr-2">
              <label class="mr-2">Tanggal Akhir</label>
              <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo e($tanggal_akhir); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Tampilkan</button>
            <?php if($tanggal_awal && $tanggal_akhir): ?>
              <a href="<?php echo e(route('backend.laporan_penjualan.cetak', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir])); ?>"
                target="_blank" class="btn btn-danger mr-2">
                <i class="fas fa-file-pdf"></i> Cetak PDF
              </a>
              <a href="<?php echo e(route('backend.laporan_penjualan.excel', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir])); ?>"
                target="_blank" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Cetak Excel
              </a>
            <?php endif; ?>
          </form>

          <?php if($tanggal_awal && $tanggal_akhir): ?>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Penerima</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                      <td> <?php echo e($loop->iteration); ?> </td>
                      <td> <?php echo e($row->kode_transaksi); ?> </td>
                      <td> <?php echo e($row->created_at->format('d-m-Y H:i')); ?> </td>
                      <td> <?php echo e($row->nama_penerima); ?> </td>
                      <td>Rp. <?php echo e(number_format($row->total_harga, 0, ',', '.')); ?> </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="5" class="text-center">Tidak ada penjualan selesai pada rentang tanggal ini</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-right">Total Penjualan</th>
                    <th>Rp. <?php echo e(number_format($total, 0, ',', '.')); ?> </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          <?php else: ?>
            <div class="alert alert-info">Pilih rentang tanggal lalu klik <strong>Tampilkan</strong>.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_laporan_penjualan/index.blade.php ENDPATH**/ ?>