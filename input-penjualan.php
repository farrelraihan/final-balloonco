<?php 
include 'koneksi.php';
session_start();

// Get total number of sales data
$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM penjualan");
$data = mysqli_fetch_assoc($query);
$sequence_number = $data['total'] + 1;
$kode_penjualan = "KP-" . sprintf("%04d", $sequence_number);

// Get current date and time
$current_datetime = date("Y-m-d H:i:s");
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
                            <h1>Input Data Penjualan</h1>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Input Data Penjualan</h3>
                                </div>
                                <form name="input_data" method="post" action="proses-input-penjualan.php" onsubmit="return validateForm();">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Kode Penjualan</label>
                                            <!-- Use dynamically generated sales code -->
                                            <input class="form-control" type="text" name="kode_penjualan" value="<?php echo $kode_penjualan; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Item</label>
                                            <!-- Dropdown to select item -->
                                            <select class="form-control" name="item" id="item" onchange="displayQuantity()">
                                                <?php
                                                // Query to fetch items from the database
                                                $sql = "SELECT id_barang, nama_barang, qty_barang FROM barang";
                                                $result = mysqli_query($koneksi, $sql);
                                                // Display items in dropdown menu with their quantities
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $quantity = $row['qty_barang'];
                                                    // Determine text color based on quantity
                                                    $textColor = ($quantity < 5) ? 'red' : 'black';
                                                    echo "<option value='" . $row['id_barang'] . "' data-quantity='" . $quantity . "' style='color: " . $textColor . "'>" . $row['nama_barang'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <span id="quantityDisplay"></span> <!-- Placeholder to display available quantity -->
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <!-- Input field for quantity -->
                                            <input class="form-control" type="number" id="quantity" name="quantity">
                                            <span id="quantityError" style="color: red;"></span> <!-- Error message placeholder -->
                                        </div>
                                        <!-- Hidden input field for current date and time -->
                                        <input type="hidden" name="tanggal_penjualan" value="<?php echo $current_datetime; ?>">
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="tambah" value="SAVE">
                                        </div>
                                    </div>
                                </form>
                                <a href="lihat-penjualan.php" class="btn btn-secondary">LIHAT DATA PENJUALAN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- End of Footer -->
    </div>

    <script>
        function validateForm() {
            var quantity = document.getElementById("quantity").value;
            if (quantity === "" || quantity == 0) {
                document.getElementById("quantityError").innerHTML = "Quantity cannot be empty or zero";
                return false;
            }
            return true;
        }

        function displayQuantity() {
            var itemSelect = document.getElementById("item");
            var selectedQuantity = itemSelect.options[itemSelect.selectedIndex].getAttribute("data-quantity");
            document.getElementById("quantityDisplay").innerHTML = "Available Quantity: " + selectedQuantity;
        }
    </script>
</body>
