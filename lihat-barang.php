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
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <button onclick="location.href='input-barang.php';" type="button" class="btn btn-block btn-success btn-md"> + Tambah Barang</button>
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
                                ?>
                                <tr>
                                    <td><?php echo $no; ?>                      </td>			
                                    	
                                    <td><?php echo $data['kode_barang']; ?>         </td>		
                                    <td><?php echo $data['nama_barang']; ?>      </td>			
                                    <td class="text-right"><?php echo $data['qty_barang']; ?>  </td>	<!-- Align right class added here -->
                                    <td class="text-right"><p>Rp<?php echo number_format($data['harga_barang']) ; ?>     </p></td> <!-- Align right class added here -->
                                    <td class="text-right"><p>Rp<?php echo number_format($data['harga_beli']) ; ?>     </p></td> <!-- Align right class added here -->
                                    <td><?php echo $data['deskripsi_barang']; ?>     </td>	
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
   

            

        </div>
    </section>



</div>  <!-- Content Wrapper. Contains page content -->



<?php
include 'footer.php';
?>





</body> 
