<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('event/') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Event</h1>
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
                <form action="<?= site_url('event/update/' . $event->id_event) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="gambarLama" value="<?= $event->img_event ?>">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Judul Event *</label>
                            <input type="text" name="judul" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : null ?>" autofocus value="<?= old('judul', $event->judul) ?>">
                            <?php
                            if ($validation->hasError('judul')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Kategori Event *</label>
                            <select class="form-control <?= $validation->hasError('slug_kategori') ? 'is-invalid' : null ?>" name="slug_kategori">
                                <option value="" hidden>-- pilih --</option>
                                <?php foreach ($kategori as $key => $value) : ?>
                                    <?php if (old('slug_kategori', $event->slug_kategori) == $value->slug_kategori) : ?>
                                        <option value="<?= $value->slug_kategori ?>" selected><?= $value->nama_kategori ?></option>
                                    <?php else : ?>
                                        <option value="<?= $value->slug_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?php
                            if ($validation->hasError('slug_kategori')) : ?>
                                <div class="invalid-feedback">
                                    Kategori Event field is required
                                    <!-- <?= $validation->getError('slug_kategori') ?> -->
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penyelenggara Event *</label>
                        <input type="text" name="penyelenggara" class="form-control <?= $validation->hasError('penyelenggara') ? 'is-invalid' : null ?>" value="<?= old('penyelenggara', $event->penyelenggara) ?>">
                        <?php
                        if ($validation->hasError('penyelenggara')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penyelenggara') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Event *</label>
                        <textarea type="text" name="deskripsi" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>" style="height: 150px;"><?= old('deskripsi', $event->deskripsi) ?></textarea>
                        <?php
                        if ($validation->hasError('deskripsi')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi') ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Start Event *</label>
                            <input type="date" name="start_event" class="form-control <?= $validation->hasError('start_event') ? 'is-invalid' : null ?>" value="<?= old('start_event', date('Y-m-d', strtotime($event->start_event))) ?>">
                            <?php
                            if ($validation->hasError('start_event')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('start_event') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group col-6">
                            <label>End Event </label>
                            <input type="date" name="end_event" class="form-control" value="<?= old('end_event', date('Y-m-d', strtotime($event->end_event))) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image Event *</label>
                        <div class="custom-file">
                            <input id="file_event" type="file" name="img_event" class="custom-file-input form-control <?= $validation->hasError('img_event') ? 'is-invalid' : null ?>" onchange="previewImg()">
                            <labe for="file_event" class="custom-file-label">Pilih File</labe>
                        </div>
                        <?php if ($validation->hasError('img_event')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('img_event') ?>
                            </div>
                        <?php endif ?>

                        <img src="<?= base_url('template/assets/img/img-event/' . $event->img_event) ?>" alt="" class="preview-img mt-2" width="200px">
                    </div>
                    <div class="justify-content-end d-flex">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Update</button>
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