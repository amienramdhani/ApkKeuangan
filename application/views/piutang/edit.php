<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/piutang/process_edit') ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="piutang_id" name="piutang_id" value="<?= $piutang[
                        'piutang_id'
                    ] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="piutang" class="col-sm-2 col-form-label">Tanggal Piutang</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="piutang_tanggal" name="piutang_tanggal" value="<?= $piutang[
                        'piutang_tanggal'
                    ] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="piutang" class="col-sm-2 col-form-label">Piutang Nominal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="piutang_nominal" name="piutang_nominal" value="<?= $piutang[
                        'piutang_nominal'
                    ] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="piutang" class="col-sm-2 col-form-label">Keterangan Piutang</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="piutang_keterangan" name="piutang_keterangan" value="<?= $piutang[
                        'piutang_keterangan'
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