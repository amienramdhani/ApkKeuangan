<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/persediaan/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="persediaan_id" name="persediaan_id" value="<?= $persediaan[
                        'persediaan_id'
                    ] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Tanggal persediaan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $persediaan[
                        'tanggal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Shift</label>
                <div class="col-sm-10">
                <select name="shift" class="form-control" required="required">
                                        <option value="<?= $persediaan[
                                            'shift'
                                        ] ?>"></option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Distick</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="distick_awal" name="distick_awal" value="<?= $persediaan[
                        'distick_awal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Stock Awal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stock_awal" name="stock_awal" value="<?= $persediaan[
                        'stock_awal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">No Mobil Tanki</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_mobil_tanki" name="no_mobil_tanki" value="<?= $persediaan[
                        'no_mobil_tanki'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">No PNPBSO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="noPNBPSO" name="noPNBPSO" value="<?= $persediaan[
                        'noPNBPSO'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Distick</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="distick_volume_sebelum_penerimaan" name="distick_volume_sebelum_penerimaan" value="<?= $persediaan[
                        'distick_volume_sebelum_penerimaan'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Volume Sebelum Penerimaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="volume_sebelum_penerimaan" name="volume_sebelum_penerimaan" value="<?= $persediaan[
                        'volume_sebelum_penerimaan'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Volume Pengiriman PNBP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="volume_pengiriman_pnbp" name="volume_pengiriman_pnbp" value="<?= $persediaan[
                        'volume_pengiriman_pnbp'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Distick</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="distick_volume_pengiriman" name="distick_volume_pengiriman" value="<?= $persediaan[
                        'distick_volume_pengiriman'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Volume Pengiriman Aktual</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="volume_pengiriman_aktual" name="volume_pengiriman_aktual" value="<?= $persediaan[
                        'volume_pengiriman_aktual'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Selisih Volume</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="selisih_volume" name="selisih_volume" value="<?= $persediaan[
                        'selisih_volume'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Pengeluaran Dispenser</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengeluaran_dispenser" name="pengeluaran_dispenser" value="<?= $persediaan[
                        'pengeluaran_dispenser'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Stock Akhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stock_akhir" name="stock_akhir" value="<?= $persediaan[
                        'stock_akhir'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Distick</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="distick_stock_akhir" name="distick_stock_akhir" value="<?= $persediaan[
                        'distick_stock_akhir'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Stock Akhir Aktual</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stock_akhir_aktual" name="stock_akhir_aktual" value="<?= $persediaan[
                        'stock_akhir_aktual'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="persediaan" class="col-sm-2 col-form-label">Selisih Total Volume</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="selisih_total_volume" name="selisih_total_volume" value="<?= $persediaan[
                        'selisih_total_volume'
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