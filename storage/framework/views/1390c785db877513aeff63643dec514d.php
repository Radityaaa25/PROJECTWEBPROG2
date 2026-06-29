<?php $__env->startSection('content'); ?>
<div class="glass-card p-4 mb-4">
    <h2 class="mb-0 text-center fw-bold">Katalog Produk</h2>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col">
        <div class="card h-100 shadow-sm border-0 product-card">
            <?php if($produk->foto): ?>
                <img src="<?php echo e(asset('storage/img-produk/' . $produk->foto)); ?>" class="card-img-top" alt="<?php echo e($produk->nama_produk); ?>" style="height: 200px; object-fit: cover;">
            <?php elseif($produk->foto_produk && $produk->foto_produk->count() > 0): ?>
                <img src="<?php echo e(asset('storage/img-produk/' . $produk->foto_produk->first()->foto)); ?>" class="card-img-top" alt="<?php echo e($produk->nama_produk); ?>" style="height: 200px; object-fit: cover;">
            <?php else: ?>
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Placeholder">
            <?php endif; ?>
            <div class="card-body d-flex flex-column p-4">
                <h5 class="card-title fw-bold"><?php echo e($produk->nama_produk); ?></h5>
                <p class="card-text text-danger fw-bold fs-5">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
                <a href="<?php echo e(route('frontend.detail', $produk->id)); ?>" class="btn btn-outline-primary mt-auto rounded-pill fw-semibold">Detail Produk</a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12 text-center py-5">
        <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
        <p class="mt-3 fs-5 text-muted">Belum ada produk untuk saat ini.</p>
    </div>
    <?php endif; ?>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    <?php echo e($produks->links('pagination::bootstrap-5')); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/katalog.blade.php ENDPATH**/ ?>