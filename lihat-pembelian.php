<?php
include 'koneksi.php';
session_start();

// Initialize total purchase and total harga_barang variables
$total_purchase_all_pages = 0;
$total_harga_barang_all_pages = 0;

// Check if the form is submitted
if(isset($_POST['filter'])) {
    // Capture the selected item name and date range from the form
    $item_name = $_POST['item_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Modify your SQL query to include both item name and date range filtering
    $query = "SELECT pb.kode_pembelian, b.nama_barang, pb.quantity, pb.tanggal_pembelian, b.harga_beli
              FROM pembelian pb
              JOIN barang b ON pb.id_barang = b.id_barang
              WHERE 1=1"; // Start with a condition that is always true

    // Add conditions based on the selected filters
    if (!empty($item_name)) {
        $query .= " AND b.nama_barang = '$item_name'";
    }
    if (!empty($start_date) && !empty($end_date)) {
        $query .= " AND DATE(pb.tanggal_pembelian) BETWEEN '$start_date' AND '$end_date'";
    }

    // Finalize the query
    $query .= " ORDER BY pb.tanggal_pembelian ASC";
} else {
    // Default query without any filters
    $query = "SELECT pb.kode_pembelian, b.nama_barang, pb.quantity, pb.tanggal_pembelian, b.harga_beli
              FROM pembelian pb
              JOIN barang b ON pb.id_barang = b.id_barang
              ORDER BY pb.tanggal_pembelian ASC";
}

// Pagination
$total_records_query = "SELECT COUNT(*) AS total_records FROM pembelian";
$total_records_result = mysqli_query($koneksi, $total_records_query);
$total_records_row = mysqli_fetch_assoc($total_records_result);
$total_records = $total_records_row['total_records'];

$total_pages = ceil($total_records / 9); // Limit of 9 data per page

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * 9;

$query .= " LIMIT 9 OFFSET $offset";

// Execute the query
$result = mysqli_query($koneksi, $query);

// Calculate total purchase and total harga_barang for the current page
$total_purchase_current_page = 0;
$total_harga_barang_current_page = 0;

while ($data = mysqli_fetch_array($result)) {
    $total_purchase_current_page += $data['quantity'];
    $total_harga_barang_current_page += $data['harga_beli'] * $data['quantity'];
}

// Calculate total purchase and total harga_barang across all pages
$query_all_pages = "SELECT SUM(pb.quantity) AS total_purchase, SUM(pb.quantity * b.harga_beli) AS total_harga_barang
                    FROM pembelian pb
                    JOIN barang b ON pb.id_barang = b.id_barang";
$result_all_pages = mysqli_query($koneksi, $query_all_pages);
$data_all_pages = mysqli_fetch_assoc($result_all_pages);

$total_purchase_all_pages = $data_all_pages['total_purchase'];
$total_harga_barang_all_pages = $data_all_pages['total_harga_barang'];
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

                                <div class="card-body table-responsive" style="height: 600px;">
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
                                    <table class="table table-head-fixed table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Purchase Code</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = ($current_page - 1) * 9 + 1;
                                            $result = mysqli_query($koneksi, $query);
                                            while ($data = mysqli_fetch_array($result)) {
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
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Total QTY Purchased (Current Page): <?php echo $total_purchase_current_page; ?></h5>
                                            <h5>Total Item Cost (Current Page): Rp<?php echo number_format($total_harga_barang_current_page); ?></h5>
                                        </div>

                                        <div class="col">
                                            <h5>Total QTY Purchased (All Pages): <?php echo $total_purchase_all_pages; ?></h5>
                                            <h5>Total Item Cost (All Pages): Rp<?php echo number_format($total_harga_barang_all_pages); ?></h5>
                                        </div>
                                    </div>

                                    <div class="pagination">
                                        <?php if ($current_page > 1): ?>
                                            <a href="?page=<?php echo ($current_page - 1); ?>">Previous</a>&nbsp;&nbsp;  
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                            <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>&nbsp;&nbsp; 
                                        <?php endfor; ?>

                                        <?php if ($current_page < $total_pages): ?>
                                            <a href="?page=<?php echo ($current_page + 1); ?>">Next</a>&nbsp;&nbsp;  
                                        <?php endif; ?>
                                    </div>
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
