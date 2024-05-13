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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalBank">Add New Bank</a>

            <?= $this->session->flashdata('message') ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Bank</th>
                        <th scope="col">Nomor Rekening Bank</th>
                        <th scope="col">Pemilik Rekening Bank</th>
                        <th scope="col">Saldo Rekening</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($bank as $k): ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $k['bank_nama'] ?></td>
                            <td><?= $k['bank_nomor'] ?></td>
                            <td><?= $k['bank_pemilik'] ?></td>
                            <td><?= 'Rp. ' .
                                number_format($k['bank_saldo']) .
                                ' ,-' ?></td>
                            <td>
                                <a href="<?= base_url('admin/bank/edit/') .
                                    $k[
                                        'bank_id'
                                    ] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(
                                    'admin/bank/delete_bank/'
                                ) .
                                    $k[
                                        'bank_id'
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
<div class="modal fade" id="ModalBank" tabindex="-1" aria-labelledby="ModalBankLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalBankLabel">Add New Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/bank/add') ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="bank_nama" placeholder="Nama Bank" name="bank_nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bank_nomor" placeholder="Nomor Bank" name="bank_nomor">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bank_pemilik" placeholder="Pemilik Bank" name="bank_pemilik">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bank_saldo" placeholder="Saldo Bank" name="bank_saldo">
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