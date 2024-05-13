<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/bank/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_id" name="bank_id" value="<?= $bank[
                        'bank_id'
                    ] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="bank" class="col-sm-2 col-form-label">Nama Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_nama" name="bank_nama" value="<?= $bank[
                        'bank_nama'
                    ] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="bank" class="col-sm-2 col-form-label">Nomor Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_nomor" name="bank_nomor" value="<?= $bank[
                        'bank_nomor'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="bank" class="col-sm-2 col-form-label">Pemilik Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_pemilik" name="bank_pemilik" value="<?= $bank[
                        'bank_pemilik'
                    ] ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="bank" class="col-sm-2 col-form-label">Saldo Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_saldo" name="bank_saldo" value="<?= $bank[
                        'bank_saldo'
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