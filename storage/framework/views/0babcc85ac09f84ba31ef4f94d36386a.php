<?php $__env->startSection('content'); ?>
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="glass-card shadow-lg border-0" style="backdrop-filter: blur(20px); border-radius: 25px; overflow: hidden;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3 shadow" style="width: 70px; height: 70px;">
                        <i class="bi bi-person-circle fs-1"></i>
                    </div>
                    <h3 class="fw-bold">Selamat Datang</h3>
                    <p class="text-muted">Masuk ke akun pelanggan Anda</p>
                </div>
                
                <?php if(session('error')): ?>
                    <div class="alert alert-danger rounded-pill text-center border-0 shadow-sm"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                
                <form action="<?php echo e(route('frontend.login.submit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label for="email" class="form-label text-muted fw-semibold ms-2">Alamat Email</label>
                        <input type="email" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="email" name="email" required placeholder="name@example.com">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label text-muted fw-semibold ms-2">Kata Sandi</label>
                        <input type="password" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="password" name="password" required placeholder="••••••••">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold shadow">Mulai Belanja <i class="bi bi-arrow-right-short ms-1"></i></button>
                </form>
                
                <div class="mt-4 text-center">
                    <p class="text-muted">Belum punya akun? <a href="<?php echo e(route('frontend.register')); ?>" class="text-primary fw-bold text-decoration-none">Daftar di sini</a></p>
                    <p class="text-muted small mt-3">Admin toko? <a href="<?php echo e(route('backend.login')); ?>" class="text-secondary text-decoration-none">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/login.blade.php ENDPATH**/ ?>