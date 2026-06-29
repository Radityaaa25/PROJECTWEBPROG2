
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0"> <?php echo e($judul); ?> </h5>
            <form action="<?php echo e(route('backend.transaksi.index')); ?>" method="GET" class="form-inline">
              <label for="bulan" class="mr-2">Bulan:</label>
              <select name="bulan" id="bulan" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                <?php for($i = 1; $i <= 12; $i++): ?>
                  <option value="<?php echo e($i); ?>" <?php echo e(request('bulan') == $i ? 'selected' : ''); ?>>
                    <?php echo e(date('F', mktime(0, 0, 0, $i, 1))); ?>

                  </option>
                <?php endfor; ?>
              </select>
              
              <label for="tahun" class="mr-2">Tahun:</label>
              <select name="tahun" id="tahun" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                <?php for($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
                  <option value="<?php echo e($i); ?>" <?php echo e(request('tahun') == $i ? 'selected' : ''); ?>>
                    <?php echo e($i); ?>

                  </option>
                <?php endfor; ?>
              </select>
            </form>
          </div>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Penerima</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td> <?php echo e($loop->iteration); ?> </td>
                    <td> <?php echo e($row->kode_transaksi); ?> </td>
                    <td> <?php echo e($row->created_at->format('d-m-Y H:i')); ?> </td>
                    <td> <?php echo e($row->nama_penerima); ?> </td>
                    <td> Rp. <?php echo e(number_format($row->total_harga, 0, ',', '.')); ?> </td>
                    <td>
                      <?php
                        $badge = [
                          'pending' => 'badge-secondary',
                          'diproses' => 'badge-info',
                          'dikirim' => 'badge-primary',
                          'selesai' => 'badge-success',
                          'dibatalkan' => 'badge-danger',
                        ][$row->status] ?? 'badge-secondary';
                      ?>
                      <span class="badge <?php echo e($badge); ?>"> <?php echo e(ucfirst($row->status)); ?> </span>
                    </td>
                    <td>
                      <a href="<?php echo e(route('backend.transaksi.show', $row->id)); ?>" title="Detail Data">
                        <button type="button" class="btn btn-cyan btn-sm"><i class="far fa-eye"></i> Detail</button>
                      </a>
                      <form method="POST" action="<?php echo e(route('backend.transaksi.destroy', $row->id)); ?>"
                        style="display: inline-block;">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                          data-konf-delete="<?php echo e($row->kode_transaksi); ?>" title='Hapus Data'>
                          <i class="fas fa-trash"></i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_transaksi/index.blade.php ENDPATH**/ ?>