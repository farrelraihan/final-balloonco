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
                            <h1>Edit Data Admin</h1>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Admin</h3>

                                </div>
                                
                                <?php 
                                $ambilid  = $_GET['id'];
                                $query    = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$ambilid'");
                                $data     = mysqli_fetch_array($query);
                                ?>

                                <form method="POST" action="proses-edit-staff.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID Admin</label>
                                            <input class="form-control" placeholder="Input ID Admin" type="text" name="id_admin" required
                                            value="<?php echo $data['id_admin'];?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Kode Admin</label>
                                            <input class="form-control" placeholder="Input Kode Admin" type="text" name="kode_admin" required
                                            value="<?php echo $data['kode_admin'];?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <input class="form-control" placeholder="Input Nama Admin" type="text" name="nama_admin" required
                                            value="<?php echo $data['nama_admin'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Login Admin</label>
                                            <input class="form-control" placeholder="Input Login Admin" type="text" name="login_admin" required
                                            value="<?php echo $data['login_admin'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Password Admin</label>
                                            <input class="form-control" placeholder="Input Password Admin" type="text" name="pw_admin" required
                                            value="<?php echo $data['pw_admin'];?>">
                                        </div>

                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="ubah" value="UPDATE DATA" 
                                                onclick="return confirm('Apakah Anda yakin akan mengubah data?')">
  
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
</body>
