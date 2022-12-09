<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Event</h1>
        <div class="section-header-button">
            <a href="<?= site_url('event/add') ?>" class="btn btn-primary">Tambah Data Event</a>
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
                <a target="_blank" href="<?= site_url('/event/export-pdf') ?>" class="btn btn-warning btn-md mr-2">Download PDF</a>
                <a href="<?= site_url('/event/export') ?>" class="btn btn-primary btn-md mr-2">Export Excel
                    <i class="fas fa-file-download"></i>
                </a>
                <!-- <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">Import Excel
                    <i class="fas fa-upload"></i>
                </a> -->
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Penyelenggara</th>
                                <th>Start Event</th>
                                <th>End Event</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($daftar_event as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td style="width:10%">
                                        <img src="<?= base_url('template/assets/img/img-event/' . $value->img_event) ?>" alt="" class="preview-img mt-2" width="200px">
                                    </td>
                                    <td><?= $value->judul ?></td>
                                    <td><?= $value->slug_kategori ?></td>
                                    <td style="width:30%"><?= $value->deskripsi ?></td>
                                    <td><?= $value->penyelenggara ?></td>
                                    <td><?= date('d/m/y', strtotime($value->start_event)) ?></td>
                                    <?php if ($value->end_event == '0000-00-00 00:00:00') : ?>
                                        <td><?= date('d/m/y', strtotime($value->start_event)) ?></td>
                                    <?php else : ?>
                                        <td><?= date('d/m/y', strtotime($value->end_event)) ?></td>
                                    <?php endif ?>

                                    <td class="">
                                        <a class="btn btn-warning btn-sm" href="<?= site_url('/event/edit/' . $value->id_event) ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $value->id_event ?>"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= site_url('event/import') ?>">
                <div class="modal-body">
                    <div class="custom-file">
                        <input id="file_excel" type="file" name="file_excel" class="custom-file-input" required>
                        <labe for="file_excel" class="custom-file-label">Pilih File</labe>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<?php foreach ($daftar_event as $key => $value) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal<?= $value->id_event ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= site_url('event/delete/' . $value->id_event) ?>" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body">
                        <p>Apakah data event : <b><?= $value->judul ?></b>, yakin akan di hapus ?</p>
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