<?php 
include 'koneksi.php';
session_start();


// Dapatkan jumlah total data admin
$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM admin");
$data = mysqli_fetch_assoc($query);
$sequence_number = $data['total'] + 1;
$kode_admin = "ADM-" . sprintf("%04d", $sequence_number);
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
                            <h1>Form Input Data Admin</h1>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Input Data Admin</h3>
                                </div>
                                <form name="input_data" method="post" action="proses-input-staff.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Kode Admin</label>
                                            <!-- Gunakan kode admin yang telah dibuat secara dinamis -->
                                            <input class="form-control" type="text" name="kode_admin" value="<?php echo $kode_admin; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <input class="form-control" type="text" name="nama_admin">
                                        </div>
                                        <div class="form-group">
                                            <label>Login Admin</label>
                                            <input class="form-control" type="text" name="login_admin">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Admin</label>
                                            <input class="form-control" type="text" name="pw_admin">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="tambah" value="SIMPAN" onclick="return confirm('Apakah Anda yakin akan menyimpan data?')">
                                        </div>
                                    </div>
                                </form>
                                <a href="lihat-staff.php" class="btn btn-secondary">LIHAT DATA ADMIN</a>
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

</body>
