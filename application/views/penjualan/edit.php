<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/penjualan/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penjualan_id" name="penjualan_id" value="<?= $penjualan[
                        'penjualan_id'
                    ] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Tanggal penjualan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $penjualan[
                        'tanggal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Shift</label>
                <div class="col-sm-10">
                <select name="shift" class="form-control" required="required">
                                        <option value="<?= $penjualan[
                                            'shift'
                                        ] ?>"></option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Totalisator Awal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="totalisator_awal" name="totalisator_awal" value="<?= $penjualan[
                        'totalisator_awal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Totalisator Akhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="totalisator_akhir" name="totalisator_akhir" value="<?= $penjualan[
                        'totalisator_akhir'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="volume" name="volume" value="<?= $penjualan[
                        'volume'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Pump Test</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pump_test" name="pump_test" value="<?= $penjualan[
                        'pump_test'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Net Volume</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="net_volume" name="net_volume" value="<?= $penjualan[
                        'net_volume'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $penjualan[
                        'harga'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="penjualan" class="col-sm-2 col-form-label">Volume Akhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="volume_akhir" name="volume_akhir" value="<?= $penjualan[
                        'volume_akhir'
                    ] ?>">
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