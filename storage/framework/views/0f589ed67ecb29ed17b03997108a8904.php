
<?php $__env->startSection('content'); ?>
  <!-- contentAwal -->
  <div class="row">
    <div class="col-12">
      <a href="<?php echo e(route('backend.user.create')); ?>">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
          Tambah</button>
      </a>
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0"> <?php echo e($judul); ?> </h5>
            <form action="<?php echo e(route('backend.user.index')); ?>" method="GET" class="form-inline">
              <label for="role" class="mr-2">Filter Role:</label>
              <select name="role" id="role" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="1" <?php echo e(request('role') == '1' ? 'selected' : ''); ?>>Super Admin</option>
                <option value="0" <?php echo e(request('role') == '0' ? 'selected' : ''); ?>>Admin</option>
                <option value="2" <?php echo e(request('role') == '2' ? 'selected' : ''); ?>>User Biasa</option>
              </select>
            </form>
          </div>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td> <?php echo e($loop->iteration); ?> </td>
                              <td> <?php echo e($row->nama); ?> </td>
                              <td> <?php echo e($row->email); ?> </td>
                              <td>
                                <?php if($row->role == 1): ?>
                                  <span class="badge badge-success">
                                    Super Admin</span>
                                <?php elseif($row->role == 0): ?>
                                  <span class="badge badge-primary">
                                    Admin</span>
                                <?php elseif($row->role == 2): ?>
                                  <span class="badge badge-info">
                                    User Biasa</span>
                                <?php endif; ?>
                              </td>
                              <td>
                                <?php if($row->status == 1): ?>
                                  <span class="badge badge-success"></i>
                                    Aktif</span>
                                <?php elseif($row->status == 0): ?>
                                  <span class="badge badge-secondary"></i>
                                    NonAktif</span>
                                <?php endif; ?>
                              </td>
                              <td>
                                <a href="<?php echo e(route('backend.user.edit', $row->id)); ?>" title="Ubah Data">
                                  <button type="button" class="btn btn-cyan btnsm"><i class="far fa-edit"></i> Ubah</button>
                                </a>
                                <form method="POST" action="<?php echo e(route('backend.user.destroy', $row->id)); ?>" style="display: inline-block;">
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
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/v_user/index.blade.php ENDPATH**/ ?>