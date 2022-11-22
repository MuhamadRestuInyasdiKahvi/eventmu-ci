<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('/tentang-kami') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tentang Website</h1>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dissmiss="alert">x</button>
                <b>Success ! </b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('failed')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dissmiss="alert">x</button>
                <b>Failed ! </b>
                <?= session()->getFlashdata('failed') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?= $title ?></h4>
            </div>
            <div class="card-body ">
                <form action="<?= site_url('/tentang-kami/create-tentang') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label>Slogan *</label>
                        <input type="text" name="slogan" class="form-control <?= $validation->hasError('slogan') ? 'is-invalid' : null ?>" autofocus value="<?= old('slogan') ?>">
                        <?php
                        if ($validation->hasError('slogan')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('slogan') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea type="text" name="deskripsi" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>" style="height: 150px;"><?= old('deskripsi') ?></textarea>
                        <?php
                        if ($validation->hasError('deskripsi')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label>Gambar Samping *</label>
                        <div class="custom-file">
                            <input id="file_event" type="file" name="img_samping" class="custom-file-input form-control <?= $validation->hasError('img_samping') ? 'is-invalid' : null ?>" onchange="previewImg()">
                            <labe for="file_event" class="custom-file-label">Pilih File</labe>
                        </div>
                        <?php if ($validation->hasError('img_samping')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('img_samping') ?>
                            </div>
                        <?php endif ?>

                        <img src="" alt="" class="preview-img mt-2" width="200px">
                    </div>
                    <div class="justify-content-end d-flex">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi')
</script>
<script>
    function previewImg() {
        const gambar = document.querySelector('#file_event');
        const imgPreview = document.querySelector('.preview-img');

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection() ?>