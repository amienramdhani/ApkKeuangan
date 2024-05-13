<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger role"="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalHutang">Add New Hutang</a>

            <?= $this->session->flashdata('message') ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Tanggal Hutang</th>
                        <th scope="col">Nominal Hutang</th>
                        <th scope="col">Keterangan</th>                        
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($hutang as $k): ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td>HTG-000<?= $k['hutang_id'] ?></td>
                            <td><?= $k['hutang_tanggal'] ?></td>
                            <td><?= 'Rp. ' .
                                number_format($k['hutang_nominal']) .
                                ' ,-' ?></td>
                            <td><?= $k['hutang_keterangan'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/hutang/edit/') .
                                    $k[
                                        'hutang_id'
                                    ] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(
                                    'admin/hutang/delete_hutang/'
                                ) .
                                    $k[
                                        'hutang_id'
                                    ] ?>" class="badge badge-danger tombol-hapus">Delete</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="ModalHutang" tabindex="-1" aria-labelledby="ModalHutangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHutangLabel">Add New Hutang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(
                    'Admin/hutang/add'
                ) ?>" method="POST">
                    <div class="form-group">
                        <input type="date" class="form-control" id="hutang_tanggal" placeholder="Tanggal Hutang" name="hutang_tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hutang_nominal" placeholder="Nominal Hutang" name="hutang_nominal">
                    </div>
                    <div class="form-group">
                        <input type="textarea" class="form-control" id="hutang_keterangan" placeholder="Keterangan Hutang" name="hutang_keterangan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You Will deleted this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
</script>