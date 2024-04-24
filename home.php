<?php
include 'koneksi.php';
session_start();
?>

<?php
include 'header.php';
?>

<?php
include 'menu-bar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Judul Halaman -->
                    <h1 class="m-0 text-dark">Home</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <!-- Konten Utama -->
    <section class="content">
        <div class="container-fluid">
            <!-- Kotak-kotak kecil (Stat box) -->
            <div class="row">
                <!-- Total Jenis Barang -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <!-- Kode PHP untuk mengambil dan menampilkan total jenis barang -->
                            <?php
                            include 'koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT COUNT(DISTINCT nama_barang) AS total_barang FROM barang");
                            $result = mysqli_fetch_assoc($query);
                            $total_barang = $result['total_barang'];
                            ?>
                            <h3><?php echo $total_barang; ?></h3>
                            <p>Total Jenis Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="lihat-barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Kuantitas Barang -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            include 'koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT SUM(qty_barang) AS total_quantity FROM barang");
                            $result = mysqli_fetch_assoc($query);
                            $total_quantity = $result['total_quantity'];
                            ?>
                            <h3><?php echo $total_quantity; ?></h3>
                            <p>Total Kuantitas Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="lihat-barang.php" class="small-box-footer">More Info</a>
                    </div>
                </div>
                
                <!-- Data Penjualan Bulanan -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <!-- Kode PHP untuk menghitung dan menampilkan total data penjualan -->
                            <?php
                            $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_penjualan FROM penjualan WHERE MONTH(tanggal_penjualan) = MONTH(CURRENT_DATE())");
                            $result = mysqli_fetch_assoc($query);
                            $total_penjualan = $result['total_penjualan'];
                            ?>
                            <h3><?php echo $total_penjualan; ?></h3>
                            <p>Data Penjualan Bulanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="lihat-penjualan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Profit Bulanan -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <!-- Kode PHP untuk menghitung dan menampilkan total profit bulanan -->
                            <?php
                            $query = mysqli_query($koneksi, "SELECT SUM(p.quantity * b.harga_beli) AS total_profit 
                                                              FROM penjualan p 
                                                              JOIN barang b ON p.id_barang = b.id_barang
                                                              WHERE MONTH(p.tanggal_penjualan) = MONTH(CURRENT_DATE())");
                            $result = mysqli_fetch_assoc($query);
                            $total_profit = $result['total_profit'];
                            ?>
                            <h3>Rp<?php echo number_format($total_profit); ?></h3>
                            <p>Profit Bulanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="lihat-penjualan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Pembelian Bulanan -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <!-- Kode PHP untuk mengambil dan menampilkan total pembelian dalam bulan ini -->
                            <?php
                            $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pembelian FROM pembelian WHERE MONTH(tanggal_pembelian) = MONTH(CURRENT_DATE())");
                            $result = mysqli_fetch_assoc($query);
                            $total_pembelian = $result['total_pembelian'];
                            ?>
                            <h3><?php echo $total_pembelian; ?></h3>
                            <p>Pembelian Bulanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="lihat-pembelian.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Admin -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-lightblue">
                        <div class="inner">
                            <!-- Kode PHP untuk mengambil dan menampilkan total admin -->
                            <?php
                            $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_admin FROM admin");
                            $result = mysqli_fetch_assoc($query);
                            $total_admin = $result['total_admin'];
                            ?>
                            <h3><?php echo $total_admin; ?></h3>
                            <p>Total Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="lihat-staff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Kartu: Barang Stok Rendah -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <!-- Kode PHP untuk mengambil dan menampilkan jumlah barang dengan stok rendah -->
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_low_stock FROM barang WHERE qty_barang < 5");
                                $result = mysqli_fetch_assoc($query);
                                $total_low_stock = $result['total_low_stock'];
                                ?>
                                <h3><?php echo $total_low_stock; ?></h3>
                                <p>Barang Stok Rendah</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-alert"></i>
                            </div>
                            <a href="lihat-barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

            </div>
            <!-- /.row -->

            <!-- Tabel: Penjualan Terbaru -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Penjualan Terbaru</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Total Profit(Rp)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query untuk mengambil data penjualan terbaru
                                $query = mysqli_query($koneksi, "SELECT p.kode_penjualan, b.nama_barang, p.quantity, (p.quantity * b.harga_beli) AS total_profit, p.tanggal_penjualan 
                                  FROM penjualan p 
                                  JOIN barang b ON p.id_barang = b.id_barang 
                                  WHERE MONTH(p.tanggal_penjualan) = MONTH(CURRENT_DATE())
                                  ORDER BY p.id_penjualan DESC LIMIT 5");

                                // Loop untuk menampilkan data penjualan dalam tabel
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['kode_penjualan'] . "</td>";
                                    echo "<td>" . $row['nama_barang'] . "</td>";
                                    echo "<td style='text-align: right; width: 90px;'>" . $row['quantity'] . "</td>";
                                    echo "<td style='width: 160px; text-align: right;'>" . number_format($row['total_profit']) . "</td>";
                                    echo "<td>" . date('d-m-Y H:i:s', strtotime($row['tanggal_penjualan'])) . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="input-penjualan.php" class="btn btn-sm btn-info float-left">Pesan Barang Baru</a>
                    <a href="lihat-penjualan.php" class="btn btn-sm btn-secondary float-right">Lihat Semua Pesanan</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<?php
include 'footer.php';
?>
