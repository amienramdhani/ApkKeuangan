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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalPenjualan">Add New Penjualanan BBM</a>

            <?= $this->session->flashdata('message') ?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Tanggal Penjualan</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Totalisator Awal</th>
                        <th scope="col">Totalisator Akhir</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Pump Test</th>
                        <th scope="col">Net Volume</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Volume Akhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penjualan as $k): ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td>PJL-000<?= $k['penjualan_id'] ?></td>
                            <td><?= $k['tanggal'] ?></td>
                            <td><?= $k['shift'] ?></td>
                            <td><?= $k['totalisator_awal'] ?> Liter</td>
                            <td><?= $k['totalisator_akhir'] ?> Liter</td>
                            <td><?= $k['volume'] ?> Liter</td>
                            <td><?= $k['pump_test'] ?> Liter</td>
                            <td><?= $k['net_volume'] ?> Liter</td>
                            <td><?= 'Rp. ' .
                                number_format($k['harga']) .
                                ' ,-' ?></td>
                            <td><?= 'Rp. ' .
                                number_format($k['volume_akhir']) .
                                ' ,-' ?></td>
                            <td>
                                <a href="<?= base_url('admin/penjualan/edit/') .
                                    $k[
                                        'penjualan_id'
                                    ] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(
                                    'admin/penjualan/delete_penjualan/'
                                ) .
                                    $k[
                                        'penjualan_id'
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
<div class="modal fade" id="ModalPenjualan" tabindex="-1" aria-labelledby="ModalPenjualanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPenjualanLabel">Add New Penjualan BBM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(
                    'Admin/penjualan/add'
                ) ?>" method="POST">

                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select name="shift" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value=1>1</option>
                          <option value=2>2</option>
                        </select>
                      </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="totalisator_awal" placeholder="Totalisator Awal" name="totalisator_awal">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="totalisator_akhir" placeholder="Totalisator Akhir" name="totalisator_akhir">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="pump_test" placeholder="Pump Test" name="pump_test">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga">
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