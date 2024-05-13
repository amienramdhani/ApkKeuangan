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
            <?= form_error(
                'kategori',
                '<div class = "alert alert-danger role" ="alert">',
                '</div>'
            ) ?>
            <?= form_error(
                'bank',
                '<div class = "alert alert-danger role" ="alert">',
                '</div>'
            ) ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalTransaksi">Add New Transaksi</a>

            <?= $this->session->flashdata('message') ?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Keterangan</th>
                        <th colspan="2" scope="col">Jenis Transaksi</th>                        
                        <!-- <th scope="col">Bank Transaksi</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-center">Pemasukan</th>
                        <th class="text-center">Pengeluaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $m): ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $m['transaksi_tanggal'] ?></td>
                            <td><?= $m['kategori'] ?></td>
                            <td><?= $m['transaksi_keterangan'] ?></td>
                            <td>
                                <?php if (
                                    $m['transaksi_jenis'] == 'Pemasukan'
                                ) {
                                    echo 'Rp. ' .
                                        number_format($m['transaksi_nominal']) .
                                        ' ,-';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td>
                                <?php if (
                                    $m['transaksi_jenis'] == 'Pengeluaran'
                                ) {
                                    echo 'Rp. ' .
                                        number_format($m['transaksi_nominal']) .
                                        ' ,-';
                                } else {
                                    echo '-';
                                } ?>
                            </td>
                            <!-- <td><?= $m['bank_nama'] ?></td> -->

                            <td>
                                <a href="<?= base_url('admin/transaksi/edit/') .
                                    $m[
                                        'transaksi_id'
                                    ] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(
                                    'admin/transaksi/delete_transaksi/'
                                ) .
                                    $m[
                                        'transaksi_id'
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
<div class="modal fade" id="ModalTransaksi" tabindex="-1" aria-labelledby="ModalTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTransaksiLabel">Add New Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(
                    'Admin/transaksi/add'
                ) ?>" method="POST">

                    <div class="form-group">
                        <input type="date" class="form-control" id="transaksi_tanggal" placeholder="Tanggal" name="transaksi_tanggal">
                    </div>

                    <div class="form-group">                        
                        <select name="transaksi_jenis" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Pemasukan">Pemasukan</option>
                          <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <select name="transaksi_kategori" id="transaksi_kategori" class="form-control">
                            <option>Kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['kategori_id'] ?>"><?= $k[
    'kategori'
] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                 

                    <div class="form-group">
                        <input type="number" class="form-control" id="transaksi_nominal" placeholder="Nominal" name="transaksi_nominal">
                    </div>

                    <div class="form-group">
                        <input type="textarea" class="form-control" id="transaksi_keterangan" placeholder="Keterangan Transaksi" name="transaksi_keterangan">
                    </div>
                    
                    <div class="form-group">
                        <select name="transaksi_bank" id="transaksi_bank" class="form-control">
                            <option>Bank</option>
                            <?php foreach ($bank as $b): ?>
                                <option value="<?= $b['bank_id'] ?>"><?= $b[
    'bank_nama'
] ?></option>
                            <?php endforeach; ?>
                        </select>
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
            text: "You will delete this data?",
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