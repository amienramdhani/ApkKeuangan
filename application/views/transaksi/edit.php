<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/transaksi/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="transaksi_id" name="transaksi_id" value="<?= $transaksi[
                        'transaksi_id'
                    ] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="transaksi_tanggal" name="transaksi_tanggal" value="<?= $transaksi[
                        'transaksi_tanggal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Jenis Transaksi</label>
                <div class="col-sm-10">
                <select name="transaksi_jenis" class="form-control" required="required">
                          <option value="<?= $transaksi[
                              'transaksi_jenis'
                          ] ?>">- Pilih -</option>
                          <option value="Pemasukan">Pemasukan</option>
                          <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="transaksi_kategori" id="transaksi_kategori" class="form-control">
                        <option value="<?= $transaksi[
                            'transaksi_kategori'
                        ] ?>">select menu</option>

                        <?php foreach ($kategori as $bu): ?>
                            <option value="<?= $bu['kategori_id'] ?>"><?= $bu[
    'kategori'
] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error(
                        'transaksi_kategori',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ) ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nominal Transaksi</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="transaksi_nominal" name="transaksi_nominal" value="<?= $transaksi[
                        'transaksi_nominal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="transaksi_keterangan" name="transaksi_keterangan" value="<?= $transaksi[
                        'transaksi_keterangan'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-10">
                    <select name="transaksi_bank" id="transaksi_bank" class="form-control">
                        <option value="<?= $transaksi[
                            'transaksi_bank'
                        ] ?>">select menu</option>

                        <?php foreach ($bank as $su): ?>
                            <option value="<?= $su['bank_id'] ?>"><?= $su[
    'bank_nama'
] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error(
                        'transaksi_bank',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ) ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->