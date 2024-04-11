<?php 
include 'koneksi.php';
session_start();
?>

<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include 'menu-bar.php';
        ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h1>View Sales Data</h1>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sales Records</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <button onclick="location.href='tambah-penjualan.php';" type="button" class="btn btn-block btn-success btn-md"> + Add Sales</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Penjualan</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            // Include your database connection file
                                            include 'koneksi.php';

                                            $query = mysqli_query($koneksi, "SELECT p.kode_penjualan, b.nama_barang, p.quantity, p.tanggal_penjualan
                                            FROM penjualan p
                                            JOIN barang b ON p.id_barang = b.id_barang");

                                            $no = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['kode_penjualan']; ?></td>
                                                    <td><?php echo $data['nama_barang']; ?></td>
                                                    <td><?php echo $data['quantity']; ?></td>
                                                    <td><?php echo $data['tanggal_penjualan']; ?></td>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>