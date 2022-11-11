<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('event/') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Event</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Event</h4>
            </div>
            <div class="card-body ">
                <form action="<?= site_url('event')?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Judul Event *</label>
                        <input type="text" name="judul" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Event *</label>
                        <textarea type="text" name="deskripsi" class="form-control" required style="height: 150px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Penyelenggara Event *</label>
                        <input type="text" name="penyelenggara" class="form-control" required >
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>