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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalPersediaan">Add New Persediaan BBM</a>

            <?= $this->session->flashdata('message') ?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Distick</th>
                        <th scope="col">Stock Awal</th>                        
                        <th scope="col">No Mobil Tanki</th>                        
                        <th scope="col">No PNBPSO</th>                        
                        <th scope="col">Distick</th>                        
                        <th scope="col">Volume Sebelum Penerimaan</th>                        
                        <th scope="col">Volume Pengiriman PNBP</th>                        
                        <th scope="col">Distick</th>
                        <th scope="col">Volume Pengiriman Aktual</th>
                        <th scope="col">Selisih Volume</th>
                        <th scope="col">Pengeluaran Dispenser</th>
                        <th scope="col">Stock Akhir</th>
                        <th scope="col">Distick</th>
                        <th scope="col">Stock Akhir Aktual</th>
                        <th scope="col">Selisih Total Volume</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($persediaan_bbm as $k): ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>                            
                            <td><?= $k['tanggal'] ?></td>
                            <td><?= $k['shift'] ?></td>
                            <td><?= $k['distick_awal'] ?></td>
                            <td><?= $k['stock_awal'] ?> Liter</td>
                            <td><?= $k['no_mobil_tanki'] ?></td>
                            <td><?= $k['noPNBPSO'] ?></td>
                            <td><?= $k[
                                'distick_volume_sebelum_penerimaan'
                            ] ?></td>
                            <td><?= $k[
                                'volume_sebelum_penerimaan'
                            ] ?> Liter</td>
                            <td><?= $k['volume_pengiriman_pnbp'] ?> Liter</td>
                            <td><?= $k['distick_volume_pengiriman'] ?></td>
                            <td><?= $k['volume_pengiriman_aktual'] ?> Liter</td>
                            <td><?= $k['selisih_volume'] ?> Liter</td>
                            <td><?= $k['pengeluaran_dispenser'] ?> Liter</td>
                            <td><?= $k['stock_akhir'] ?> Liter</td>
                            <td><?= $k['distick_stock_akhir'] ?> Liter</td>
                            <td><?= $k['stock_akhir_aktual'] ?> Liter</td>
                            <td><?= $k[
                                'selisih_total_volume'
                            ] ?> Liter</td>                            
                            <td>
                                <a href="<?= base_url(
                                    'admin/persediaan/edit/'
                                ) .
                                    $k[
                                        'persediaan_id'
                                    ] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(
                                    'admin/persediaan/delete_persediaan/'
                                ) .
                                    $k[
                                        'persediaan_id'
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
<div class="modal fade" id="ModalPersediaan" tabindex="-1" aria-labelledby="ModalPersediaanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPersediaanLabel">Add New Persediaan BBM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(
                    'Admin/persediaan/add'
                ) ?>" method="POST">
                    <div class="form-group">
                        <input type="date" class="form-control datepicker2" id="tanggal" placeholder="Tanggal" name="tanggal">
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
                        <label>Distick Awal</label>
                        <input type="text" name="distick_awal" required="required" class="form-control" placeholder="Distick Awal">
                      </div>

                      <div class="form-group">
                        <label>Stock Awal Shift</label>
                        <input type="text" name="stock_awal" required="required" class="form-control" placeholder="Stock Awal">
                      </div>

                      <div class="form-group">
                        <label>No Mobil Tangki</label>
                        <input type="text" name="no_mobil_tanki" required="required" class="form-control" placeholder="No Mobil Tangki">
                      </div>

                      <div class="form-group">
                        <label>No.PNBP(SO)</label>
                        <input type="text" name="noPNBPSO" required="required" class="form-control" placeholder="noPNBPSO">
                      </div>

                      <div class="form-group">
                        <label>Distick Volume Sebelum Penerimaan</label>
                        <input type="text" name="distick_volume_sebelum_penerimaan" required="required" class="form-control" placeholder="Distick Volume Sebelum Penerimaan">
                      </div>

                      <div class="form-group">
                        <label>Volume Sebelum Penerimaan</label>
                        <input type="text" name="volume_sebelum_penerimaan" required="required" class="form-control" placeholder="Volume Sebelum Penerimaan">
                      </div>

                      <div class="form-group">
                        <label>Volume Pengiriman PNBP</label>
                        <input type="text" name="volume_pengiriman_pnbp" required="required" class="form-control" placeholder="Volume Pengiriman PNBP">
                      </div>

                      <div class="form-group">
                        <label>Distick Volume Pengiriman</label>
                        <input type="text" name="distick_volume_pengiriman" required="required" class="form-control" placeholder="Distick Volume Pengiriman">
                      </div>

                      <div class="form-group">
                        <label>Volume Pengiriman Aktual</label>
                        <input type="text" name="volume_pengiriman_aktual" required="required" class="form-control" placeholder="Volume Pengiriman Aktual">
                      </div>

                      <div class="form-group">
                        <label>Pengeluaran Dispenser</label>
                        <input type="text" name="pengeluaran_dispenser" required="required" class="form-control" placeholder="Pengeluaran Dispenser">
                      </div>

                      <div class="form-group">
                        <label>Distick Stock Akhir</label>
                        <input type="text" name="distick_stock_akhir" required="required" class="form-control" placeholder="Distick Stock Akhir">
                      </div>

                      <div class="form-group">
                        <label>Stock Akhir Aktual</label>
                        <input type="text" name="stock_akhir_aktual" required="required" class="form-control" placeholder="Stock Akhir Aktual">
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