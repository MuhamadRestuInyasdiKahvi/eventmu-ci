<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('event/') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Event</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Event</h4>
            </div>
            <div class="card-body ">
                <form action="<?= site_url('event/' . $event->id_event) ?>" method="post" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Judul Event *</label>
                        <input value="<?= $event->judul ?>" type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Event *</label>
                        <textarea type="text" name="deskripsi" class="form-control" required style="height: 150px;"><?= $event->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Penyelenggara Event *</label>
                        <input value="<?= $event->penyelenggara ?>" type="text" name="penyelenggara" class="form-control" required>
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