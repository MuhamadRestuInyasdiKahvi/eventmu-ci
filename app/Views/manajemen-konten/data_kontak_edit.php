<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('/kontak') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Cara Kontak Kami</h1>
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
                <form action="<?= site_url('/kontak/update/' . $data_kontak->id_cara_kerjasama) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="gambarLama" value="<?= $data_kontak->icon_cara_kerjasama ?>">
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : null ?>" autofocus value="<?= old('title',$data_kontak->title) ?>">
                        <?php
                        if ($validation->hasError('title')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('title') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label>Keterangan *</label>
                        <textarea type="text" name="keterangan" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null ?>" style="height: 150px;"><?= old('keterangan',$data_kontak->keterangan) ?></textarea>
                        <?php
                        if ($validation->hasError('keterangan')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label>Icon *</label>
                        <div class="custom-file">
                            <input id="file_event" type="file" name="icon_cara_kerjasama" class="custom-file-input form-control <?= $validation->hasError('icon_cara_kerjasama') ? 'is-invalid' : null ?>" onchange="previewImg()">
                            <labe for="file_event" class="custom-file-label">Pilih File</labe>
                        </div>
                        <?php if ($validation->hasError('icon_cara_kerjasama')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('icon_cara_kerjasama') ?>
                            </div>
                        <?php endif ?>

                        <img src="<?= base_url('template/assets/img/manajemen-konten/' . $data_kontak->icon_cara_kerjasama) ?>" alt="" class="preview-img mt-2" width="200px">
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
    CKEDITOR.replace('keterangan')
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