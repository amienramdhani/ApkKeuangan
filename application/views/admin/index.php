<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pemasukan Hari Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $tanggal = date('Y-m-d');
                        $transaksi = $this->db
                            ->query(
                                "SELECT sum(transaksi_nominal) AS total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'"
                            )
                            ->result_array();
                        ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                </div>    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pemasukan Bulanan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $bulan = date('m');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan_bulanan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_bulanan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_bulanan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>               
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemasukan Tahun Ini
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
                            $tahun = date('Y');
                            $transaksi = $this->db
                                ->query(
                                    "SELECT sum(transaksi_nominal) AS total_pemasukan_tahunan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'"
                                )
                                ->result_array();
                            ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_tahunan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_tahunan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                            </div>
                        </div>
                        </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Seluruh Pemasukan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_seluruh_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'"
                        )
                        ->result_array(); ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_seluruh_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_seluruh_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Hari Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $tanggal = date('Y-m-d');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and transaksi_tanggal='$tanggal'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Bulan Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $bulan = date('m');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan_bulanan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and month(transaksi_tanggal)='$bulan'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_bulanan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_bulanan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>          
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran Tahun Ini
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
                            $tahun = date('Y');
                            $transaksi = $this->db
                                ->query(
                                    "SELECT sum(transaksi_nominal) AS total_pemasukan_tahunan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and year(transaksi_tanggal)='$tahun'"
                                )
                                ->result_array();
                            ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_tahunan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_tahunan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Seluruh Pengeluaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_seluruh_pemasukan FROM transaksi WHERE transaksi_jenis='Pengeluaran'"
                        )
                        ->result_array(); ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_seluruh_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_seluruh_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>  
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->


                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->