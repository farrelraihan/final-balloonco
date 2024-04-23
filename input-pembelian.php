<?php
include 'koneksi.php';
session_start();

// Dapatkan total jumlah data pembelian
$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pembelian");
$data = mysqli_fetch_assoc($query);
$sequence_number = $data['total'] + 1;
$kode_pembelian = "BUY-" . sprintf("%04d", $sequence_number);

// Dapatkan tanggal dan waktu saat ini
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
                            <h1>Input Data Pembelian</h1>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Input Data Pembelian</h3>
                                </div>
                                <form name="input_data" method="post" action="proses-input-pembelian.php" onsubmit="return validateForm();">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Kode Pembelian</label>
                                            <!-- Gunakan kode pembelian yang dihasilkan secara dinamis -->
                                            <input class="form-control" type="text" name="kode_pembelian" value="<?php echo $kode_pembelian; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Item</label>
                                            <!-- Dropdown untuk memilih item -->
                                            <select class="form-control" name="item" id="item" onchange="displayQuantity()">
                                                <?php
                                                // Query untuk mengambil item dari database
                                                $sql = "SELECT id_barang, nama_barang, qty_barang FROM barang";
                                                $result = mysqli_query($koneksi, $sql);
                                                // Tampilkan item dalam menu dropdown
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id_barang'] . "' data-quantity='" . $row['qty_barang'] . "'>" . $row['nama_barang'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Menampilkan kuantitas yang tersedia -->
                                        <div id="quantityDisplay"></div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <!-- Input untuk kuantitas -->
                                            <input class="form-control" type="number" id="quantity" name="quantity">
                                            <span id="quantityError" style="color: red;"></span> <!-- Placeholder pesan kesalahan -->
                                        </div>
                                        <!-- Bidang input tersembunyi untuk tanggal dan waktu saat ini -->
                                        <input type="hidden" name="tanggal_pembelian" value="<?php echo $current_datetime; ?>">
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="tambah" value="SAVE" onclick="return confirm('Are you sure you want to save this data?')">
                                        </div>
                                    </div>
                                </form>
                                <a href="lihat-pembelian.php" class="btn btn-secondary">LIHAT DATA PEMBELIAN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- End of Footer -->

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
            var quantityDisplay = document.getElementById("quantityDisplay");
            // Ubah warna teks menjadi merah jika kuantitas kurang dari 5
            var textColor = (selectedQuantity < 5) ? 'red' : 'black';
            quantityDisplay.innerHTML = "Available Quantity: " + selectedQuantity;
            quantityDisplay.style.color = textColor;
        }
    </script>
</body>
