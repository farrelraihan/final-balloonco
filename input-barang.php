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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div>
  </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Input Data Barang</h1>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Input Data Barang</h3>
                        </div>

                        <form method="POST" action="proses-input-barang.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Input Nama Barang">
                                </div>

                                <div class="form-group">
                                    <label>Qty Barang</label>
                                    <input type="text" class="form-control" name="qty_barang" placeholder="Input Qty Barang">
                                </div>

                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <!-- Tambahkan class "harga-jual" untuk mengaktifkan plugin jQuery MaskMoney -->
                                    <input type="text" class="form-control harga-jual" name="harga_barang" placeholder="Input Harga Jual Barang">
                                </div>

                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <!-- Tambahkan class "harga-beli" untuk mengaktifkan plugin jQuery MaskMoney -->
                                    <input type="text" class="form-control harga-beli" name="harga_beli" placeholder="Input Harga Beli Barang">
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Barang</label>
                                    <input type="text" class="form-control" name="deskripsi_barang" placeholder="Input Deskripsi Barang">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="tambah" value="SIMPAN" 
                                        onclick="return confirm('Apakah Anda yakin akan menyimpan data?')">
                                </div>
                            </div>
                        </form>
                        <a href="lihat-barang.php" class="btn btn-secondary">LIHAT DATA BARANG</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- /.content-wrapper -->

<?php
include 'footer.php';
?>

<!-- Tambahkan script jQuery untuk mengaktifkan plugin jQuery MaskMoney -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script>
    $(document).ready(function(){
        // Aktifkan plugin jQuery MaskMoney pada input harga beli
        $('.harga-beli').maskMoney({prefix:'Rp', thousands:'.', decimal:',', precision:0});
        
        // Aktifkan plugin jQuery MaskMoney pada input harga jual
        $('.harga-jual').maskMoney({prefix:'Rp', thousands:'.', decimal:',', precision:0});
    });
</script>
</div> <!-- /.wrapper -->
</body>
