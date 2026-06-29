<?php $__env->startSection('content'); ?>
<div class="glass-card p-4 mb-4 mt-4">
    <h2 class="mb-0 text-center fw-bold">Checkout Pembayaran</h2>
</div>

<?php if(session('error')): ?>
    <div class="alert alert-danger rounded-pill shadow-sm border-0"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-md-7">
        <div class="glass-card p-4 mb-4">
            <h4 class="fw-bold mb-4">Informasi Pengiriman</h4>
            <form action="<?php echo e(route('frontend.prosesCheckout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Nama Penerima</label>
                    <input type="text" name="nama_penerima" class="form-control form-control-lg rounded-pill bg-light border-0 shadow-sm px-4" required value="<?php echo e(Auth::user()->nama); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Nomor HP / WhatsApp</label>
                    <input type="text" name="hp" class="form-control form-control-lg rounded-pill bg-light border-0 shadow-sm px-4" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control rounded-4 bg-light border-0 shadow-sm p-3" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted fw-semibold ms-2">Catatan Pesanan (Opsional)</label>
                    <textarea name="catatan" class="form-control rounded-4 bg-light border-0 shadow-sm p-3" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow">Proses Pesanan Sekarang <i class="bi bi-check-circle ms-1"></i></button>
            </form>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="glass-card p-4">
            <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>
            
            <div class="table-responsive mb-3">
                <table class="table table-borderless align-middle mb-0">
                    <tbody>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="ps-0" style="width: 60px;">
                                <?php if($item['foto']): ?>
                                    <img src="<?php echo e(asset('storage/img-produk/' . $item['foto'])); ?>" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/50" class="rounded shadow-sm">
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="fw-semibold text-truncate" style="max-width: 150px;"><?php echo e($item['nama_produk']); ?></div>
                                <small class="text-muted"><?php echo e($item['qty']); ?> x Rp <?php echo e(number_format($item['harga'], 0, ',', '.')); ?></small>
                            </td>
                            <td class="text-end pe-0 fw-bold">
                                Rp <?php echo e(number_format($item['harga'] * $item['qty'], 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            <hr class="text-muted">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Subtotal</span>
                <span class="fw-bold">Rp <?php echo e(number_format($totalHarga, 0, ',', '.')); ?></span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Biaya Pengiriman</span>
                <span class="fw-bold text-success">Gratis</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="fs-5 fw-bold">Total Pembayaran</span>
                <span class="fs-5 fw-bold text-danger">Rp <?php echo e(number_format($totalHarga, 0, ',', '.')); ?></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>