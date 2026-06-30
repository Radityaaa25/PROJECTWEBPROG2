<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="p-5 mb-5 glass-card position-relative overflow-hidden">
    <!-- Dekorasi background abstrak -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top right, rgba(41,98,255,0.1), transparent 50%), radial-gradient(circle at bottom left, rgba(0,200,83,0.1), transparent 50%); z-index: 0;"></div>
    
    <div class="container-fluid py-5 text-center position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold mb-3 text-dark" data-aos="fade-down">Selamat Datang di Ramela Bakery</h1>
        <p class="col-md-8 mx-auto fs-5 mb-4 text-muted" data-aos="fade-up" data-aos-delay="100">Temukan berbagai roti dan kue berkualitas dengan harga terbaik, hanya di genggaman Anda.</p>
        <a class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" href="<?php echo e(route('frontend.katalog')); ?>" type="button" style="box-shadow: 0 5px 15px rgba(13,110,253,0.3);" data-aos="fade-up" data-aos-delay="200">Mulai Belanja Sekarang</a>
    </div>
</div>

<!-- Featured Products -->
<h2 class="mb-4 text-center" data-aos="fade-up">Produk Terbaru</h2>
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
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

<!-- Kategori Produk -->
<?php if(isset($kategoris) && $kategoris->count() > 0): ?>
    <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($kategori->produk->count() > 0): ?>
            <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
                <h2 class="mb-0" data-aos="fade-right"><?php echo e($kategori->nama_kategori); ?></h2>
                <a href="<?php echo e(route('frontend.katalog')); ?>?kategori=<?php echo e($kategori->id); ?>" class="text-decoration-none" data-aos="fade-left">Lihat Semua <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                <?php $__currentLoopData = $kategori->produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/home.blade.php ENDPATH**/ ?>