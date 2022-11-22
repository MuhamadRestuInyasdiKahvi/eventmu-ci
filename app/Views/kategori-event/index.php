<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kategori Event</h1>
        <div class="section-header-button">
            <a href="<?= site_url('event/add') ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data Kategori</a>
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
                                <th>Nama Kategori</th>
                                <th>Slug Kategori</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($daftar_kategori as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value->nama_kategori ?></td>
                                    <td><?= $value->slug_kategori ?></td>
                                    <td class="" style="width:15%">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahModal<?= $value->id_kategori ?>"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $value->id_kategori ?>"><i class="fas fa-trash"></i></button>
                                        <!-- <form action="<?= site_url('') ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>


</section>
<!-- Tambah Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= site_url('/kategori-event/add') ?>" autocomplete="off">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori *</label>
                        <input type="text" name="nama_kategori" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php foreach ($daftar_kategori as $key => $value) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="ubahModal<?= $value->id_kategori ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= site_url('/kategori-event/edit/' . $value->id_kategori) ?>" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kategori *</label>
                            <input type="text" name="nama_kategori" class="form-control" required autofocus value="<?= $value->nama_kategori ?>">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Delete Modal -->
<?php foreach ($daftar_kategori as $key => $value) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal<?= $value->id_kategori ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= site_url('/kategori-event/delete/' . $value->id_kategori) ?>" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body">
                        <p>Apakah data kategori event : <b><?= $value->nama_kategori ?></b>, yakin akan di hapus ?</p>
                        <!-- <div class="form-group">
                            <label>Nama Kategori *</label>
                            <input type="text" name="nama_kategori" class="form-control" required autofocus value="<?= $value->nama_kategori ?>">
                        </div> -->
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