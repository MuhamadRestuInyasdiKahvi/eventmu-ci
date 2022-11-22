<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Tentang Website</h1>
        <div class="section-header-button">
            <a href="<?= site_url('/tentang-kami/add') ?>" class="btn btn-primary">Buat Data Tentang</a>
        </div>
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

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dissmiss="alert">x</button>
                <b>Error ! </b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4 class="mr-2"><?= $title ?></h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Gambar Samping</th>
                                <th>Slogan</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($tentang_website as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td style="width:15%">
                                        <img src="<?= base_url('template/assets/img/manajemen-konten/' . $value->img_samping) ?>" alt="" class="preview-img mt-2" width="150px">
                                    </td>
                                    <td><?= $value->slogan ?></td>
                                    <td style="width:40%"><?= $value->deskripsi ?></td>
                                    <td class="" style="width:15%">
                                        <a class="btn btn-warning btn-sm" href="<?= site_url('/tentang-kami/edit/' . $value->id_tentang) ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $value->id_tentang ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal Hapus -->
<?php foreach ($tentang_website as $key => $value) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal<?= $value->id_tentang ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= site_url('/tentang-kami/delete/' . $value->id_tentang) ?>" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body">
                        <p>Apakah data <b><?= $value->slogan ?></b>, yakin akan di hapus ?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>