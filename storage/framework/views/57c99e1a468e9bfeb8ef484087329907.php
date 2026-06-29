
<?php $__env->startSection('content'); ?>
  <!-- contentAwal -->
  <div class="row">
    <div class="col-12">
      <a href="<?php echo e(route('backend.produk.create')); ?>">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
          Tambah</button>
      </a>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"> <?php echo e($judul); ?> </h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td> <?php echo e($loop->iteration); ?></td>
                                  <td> <?php echo e($row->kategori->nama_kategori); ?> </td>
                                  <td>
                                    <?php if($row->status == 1): ?>
                                      <span class="badge badge-success"></i>
                                        Publis</span>
                                    <?php elseif($row->status == 0): ?>
                                      <span class="badge badge-secondary"></i>
                                        Blok</span>
                                    <?php endif; ?>
                                  </td>
                                  <td> <?php echo e($row->nama_produk); ?> </td>
                                  <td> Rp. <?php echo e(number_format($row->harga, 0, ',', '.')); ?>

                                  </td>
                                  <td> <?php echo e($row->stok); ?> </td>
                                  <td>
                                    <a href="<?php echo e(route('backend.produk.edit', $row->id)); ?>" title="Ubah Data">
                                      <button type="button" class="btn btn-cyan btnsm"><i class="far fa-edit"></i> Ubah</button>
                                    </a>
                                    <a href="<?php echo e(route('backend.produk.show', $row->id)); ?>" title="Ubah Data">
                                      <button type="button" class="btn btn-warning btnsm"><i class="fas fa-plus"></i> Gambar</button>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('backend.produk.destroy', $row->id)); ?>" style="display: inline-block;">
                                      <?php echo method_field('delete'); ?>
                                      <?php echo csrf_field(); ?>
                                      <button type="submit" class="btn btn-danger btn-sm
                              show_confirm" data-konf-delete="<?php echo e($row->nama); ?>" title='Hapus Data'>
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
                <!-- contentAkhir -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_produk/index.blade.php ENDPATH**/ ?>