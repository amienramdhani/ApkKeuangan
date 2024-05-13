<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <?php foreach ($lowongan as $l) : ?>
        <div class="card mb-4">
            <div class="card-header">
                <?= $l['tanggal_akhir']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $l['nama']; ?></h5>

                <p class="card-text"><?= $l['deskripsi_pekerjaan']; ?></p>
                <p class="card-text"><?= $l['email']; ?></p>
                <a href="<?= base_url('User/lowongan_kerja/addNow') ?>" class="btn btn-primary">Lamar Sekarang</a>
            </div>
        </div>

    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->