<?php 
include 'koneksi.php';
session_start();

// Initialize total profit variable
$total_profit = 0;

// Check if the form is submitted
if(isset($_POST['filter'])) {
    // Capture the selected item name and date range from the form
    $item_name = $_POST['item_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Modify your SQL query to include both item name and date range filtering
    $query = "SELECT p.kode_penjualan, b.nama_barang, p.quantity, b.harga_beli, p.tanggal_penjualan
              FROM penjualan p
              JOIN barang b ON p.id_barang = b.id_barang
              WHERE 1=1"; // Start with a condition that is always true

    // Add conditions based on the selected filters
    if (!empty($item_name)) {
        $query .= " AND b.nama_barang = '$item_name'";
    }
    if (!empty($start_date) && !empty($end_date)) {
        $query .= " AND DATE(p.tanggal_penjualan) BETWEEN '$start_date' AND '$end_date'";
    }

    // Finalize the query
    $query .= " ORDER BY p.tanggal_penjualan ASC";
} else {
    // Default query without any filters
    $query = "SELECT p.kode_penjualan, b.nama_barang, p.quantity, b.harga_beli, p.tanggal_penjualan
              FROM penjualan p
              JOIN barang b ON p.id_barang = b.id_barang
              ORDER BY p.tanggal_penjualan ASC";
}

// Execute the query
$result = mysqli_query($koneksi, $query);
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
                            <h1>Lihat Data Penjualan</h1>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Penjualan</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <button onclick="location.href='input-penjualan.php';" type="button" class="btn btn-block btn-success btn-md"> + Tambah Penjualan</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 600px;">
                                    <form method="post" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label style="margin-left: 15px;" for="item_name">Item Name:</label>
                                                <input style="margin-left: 15px;" type="text" class="form-control" id="item_name" name="item_name" value="<?php echo isset($_POST['item_name']) ? $_POST['item_name'] : ''; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label style="margin-left: 15px;" for="start_date">Start Date:</label>
                                                <input style="margin-left: 15px;" type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label style="margin-left: 15px;" for="end_date">End Date:</label>
                                                <input style="margin-left: 15px;" type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>&nbsp;</label>
                                                <input style="margin-top: 30px; margin-left: 15px; " type="submit" class="btn btn-primary btn-md" name="filter" value="Filter">
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Penjualan</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Profit</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)) {
                                                $purchase_price = $data['harga_beli'];
                                                $quantity = $data['quantity'];
                                                $profit = $quantity * $purchase_price;
                                                // Add profit to total profit
                                                $total_profit += $profit;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['kode_penjualan']; ?></td>
                                                    <td><?php echo $data['nama_barang']; ?></td>
                                                    <td><?php echo $data['quantity']; ?></td>
                                                    <td><?php echo number_format($profit); ?></td>
                                                    <td><?php echo $data['tanggal_penjualan'] ? date("Y-m-d H:i:s", strtotime($data['tanggal_penjualan'])) : ''; ?></td>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <h5>Total Profit: <?php echo number_format($total_profit); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>
