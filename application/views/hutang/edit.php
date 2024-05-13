<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/hutang/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hutang_id" name="hutang_id" value="<?= $hutang[
                        'hutang_id'
                    ] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="hutang" class="col-sm-2 col-form-label">Tanggal Hutang</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="hutang_tanggal" name="hutang_tanggal" value="<?= $hutang[
                        'hutang_tanggal'
                    ] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="hutang" class="col-sm-2 col-form-label">Hutang Nominal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hutang_nominal" name="hutang_nominal" value="<?= $hutang[
                        'hutang_nominal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="hutang" class="col-sm-2 col-form-label">Keterangan Hutang</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="hutang_keterangan" name="hutang_keterangan" value="<?= $hutang[
                        'hutang_keterangan'
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