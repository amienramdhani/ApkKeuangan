<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('User/lowongan_kerja/addNow'); ?>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alasan" name="alasan">
                    <?= form_error('alasan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <select name="prodi_id" id="prodi_id" class="form-control">
                        <option>select menu</option>
                        <?php foreach ($prodi as $pr) : ?>
                            <option value="<?= $pr['id']; ?>"><?= $pr['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('prodi_id', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="lowongan" class="col-sm-2 col-form-label">Lowongan</label>
                <div class="col-sm-10">
                    <select name="lowongan_id" id="lowongan_id" class="form-control">
                        <option>select menu</option>

                        <?php foreach ($lowongan as $l) : ?>
                            <option value="<?= $l['id']; ?>"><?= $l['email']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('lowongan_id', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Lamar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->