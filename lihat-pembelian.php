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
                            <h1>Lihat Data Pembelian</h1>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pembelian</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <button onclick="location.href='input-pembelian.php';" type="button" class="btn btn-block btn-success btn-md"> + Add Purchase</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Pembelian</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            // Include your database connection file
                                            include 'koneksi.php';

                                            $query = mysqli_query($koneksi, "SELECT pb.kode_pembelian, b.nama_barang, pb.quantity, pb.tanggal_pembelian
                                                                            FROM pembelian pb
                                                                            JOIN barang b ON pb.id_barang = b.id_barang
                                                                            ORDER BY pb.tanggal_pembelian ASC");

                                            $no = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['kode_pembelian']; ?></td>
                                                    <td><?php echo $data['nama_barang']; ?></td>
                                                    <td><?php echo $data['quantity']; ?></td>
                                                    <td><?php echo date("Y-m-d H:i:s", strtotime($data['tanggal_pembelian'])); ?></td>
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
