<?php $__env->startSection('content'); ?>
<div class="glass-card p-5 mb-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <?php if($produk->foto): ?>
                <img src="<?php echo e(asset('storage/img-produk/' . $produk->foto)); ?>" class="img-fluid rounded-4 shadow w-100" style="object-fit: cover; max-height: 500px;" alt="<?php echo e($produk->nama_produk); ?>">
            <?php elseif($produk->foto_produk && $produk->foto_produk->count() > 0): ?>
                <img src="<?php echo e(asset('storage/img-produk/' . $produk->foto_produk->first()->foto)); ?>" class="img-fluid rounded-4 shadow w-100" style="object-fit: cover; max-height: 500px;" alt="<?php echo e($produk->nama_produk); ?>">
            <?php else: ?>
                <img src="https://via.placeholder.com/500" class="img-fluid rounded-4 shadow w-100" alt="Placeholder">
            <?php endif; ?>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class="fw-bold display-6 mb-3"><?php echo e($produk->nama_produk); ?></h2>
            <h3 class="text-danger fw-bold mb-4">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></h3>
            
            <div class="mb-4">
                <span class="badge bg-secondary me-2 fs-6"><i class="bi bi-tag-fill me-1"></i> <?php echo e($produk->kategori->nama_kategori ?? 'Tidak ada kategori'); ?></span>
                <span class="badge bg-info text-dark me-2 fs-6"><i class="bi bi-box-seam me-1"></i> Stok: <?php echo e($produk->stok); ?></span>
                <span class="badge bg-light text-dark border fs-6"><i class="bi bi-speedometer2 me-1"></i> Berat: <?php echo e($produk->berat); ?> gr</span>
            </div>

            <h5 class="fw-bold mt-2">Deskripsi Produk</h5>
            <div class="mb-4 text-muted" style="line-height: 1.8;">
                <?php echo $produk->detail; ?>

            </div>

            <div class="mt-auto">
                <form action="<?php echo e(route('frontend.tambahKeranjang', $produk->id)); ?>" method="POST" class="d-flex align-items-center bg-light p-3 rounded-4 shadow-sm" style="background: rgba(255,255,255,0.5) !important;">
                    <?php echo csrf_field(); ?>
                    <input type="number" name="qty" value="1" min="1" max="<?php echo e($produk->stok); ?>" class="form-control form-control-lg me-3 rounded-pill text-center border-0 shadow-sm" style="width: 100px;">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill w-100 fw-bold shadow-sm"><i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/detail.blade.php ENDPATH**/ ?>