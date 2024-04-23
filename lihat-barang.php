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
                    <h1>Lihat Data Barang</h1>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <div class="d-flex">
                                        <!-- Div untuk menempatkan tombol "Tambah Barang" -->
                                        <div>
                                            <button onclick="location.href='input-barang.php';" type="button" class="btn btn-block btn-success btn-md"> + Tambah Barang</button>
                                        </div>
                                        <!-- Checkbox "Stok Rendah" -->
                                        <div class="input-group-append" style="margin-left: 10px;">
                                            <div class="input-group-text">
                                                <input type="checkbox" id="lowStockCheckbox">
                                                <label class="form-check-label" for="lowStockCheckbox">Stok Rendah</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="text-right">QTY Barang</th> <!-- Align right class added here -->
                                        <th class="text-right">Harga Jual</th> <!-- Align right class added here -->
                                        <th class="text-right">Harga Beli</th> <!-- Align right class added here -->
                                        <th>Deskripsi Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                        $no = 1;

                                        while ($data = mysqli_fetch_array($query)) {
                                            // Periksa apakah kuantitas barang kurang dari 5
                                            $stock_status = '';
                                            if ($data['qty_barang'] < 5) {
                                                // Jika kuantitas kurang dari 5, tambahkan pesan notifikasi
                                                $stock_status = '<span class="badge bg-warning">Stok Rendah</span>';
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_barang']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td class="text-right"><?php echo $data['qty_barang']; ?> <?php echo $stock_status; ?></td> <!-- Tambahkan pesan notifikasi jika stok rendah -->
                                        <td class="text-right"><p>Rp<?php echo number_format($data['harga_barang']); ?></p></td>
                                        <td class="text-right"><p>Rp<?php echo number_format($data['harga_beli']); ?></p></td>
                                        <td><?php echo $data['deskripsi_barang']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-md" href="edit-barang.php?id=<?php echo $data['id_barang']; ?>">
                                            <i class="fas fa-pencil-alt"></i> Ubah Data </a> 

                                            &nbsp;
                                            &nbsp;

                                            <a class="btn btn-danger btn-md" href="proses-hapus-barang.php?id=<?php echo $data['id_barang']; ?>"
                                            onclick="return confirm('Apakah Anda yakin akan menghapus data?')">
                                            <i class="fas fa-trash-alt"></i> Hapus Data</a> 
                                        </td>
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
</div> <!-- Content Wrapper. Contains page content -->

<?php
include 'footer.php';
?>
</body>

<script>
    // Ambil checkbox "Stok Rendah"
    const lowStockCheckbox = document.getElementById('lowStockCheckbox');
    // Ambil semua baris tabel kecuali header
    const tableRows = document.querySelectorAll('.table tbody tr');

    // Tambahkan event listener untuk perubahan checkbox
    lowStockCheckbox.addEventListener('change', function() {
        // Jika checkbox dicentang
        if (this.checked) {
            // Sembunyikan semua baris tabel kecuali yang memiliki stok rendah
            tableRows.forEach(row => {
                const qtyCell = row.querySelector('.text-right');
                const qty = parseInt(qtyCell.textContent.trim());
                // Jika stok kurang dari 5, tampilkan baris
                if (qty < 5) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        } else {
            // Jika checkbox tidak dicentang, tampilkan semua baris tabel
            tableRows.forEach(row => {
                row.style.display = 'table-row';
            });
        }
    });
</script>
