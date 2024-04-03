<?php 
include 'koneksi.php';
session_start();
?>

<?php
include 'header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php
    include 'menu-bar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h1>Lihat Data Admin</h1>
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Data Admin</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">
                
                    <button onclick="location.href='input-staff.php';" type="button" class="btn btn-block btn-success btn-md"> + Tambah Admin</button>
                   
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>KODE ADMIN</th>
                      <th>NAMA ADMIN</th>
                      <th>LOGIN ADMIN</th>
                      
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM admin");

                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['kode_admin']; ?></td>
                        <td><?php echo $data['nama_admin']; ?></td>
                        <td><?php echo $data['login_admin']; ?></td>
                        
                        <td>
                          <a href="edit-staff.php?id=<?php echo $data['id_admin']; ?>" class="btn btn-warning btn-md"><i class="fas fa-edit"></i> Ubah Data</a>

                          &nbsp;
                          &nbsp;
                          <a href="proses-hapus-staff.php?id=<?php echo $data['id_admin']; ?>" class="btn btn-danger btn-md" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="fas fa-trash"></i> Hapus Data</a>
                        </td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include 'footer.php';
  ?>

