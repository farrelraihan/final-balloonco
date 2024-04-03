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
                            <h1>Edit Data Barang</h1>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Data Barang</h3>

                                </div>
                                
                                <?php 
                                $ambilid 	= $_GET['id'];
                                $query 		= mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$ambilid'");
                                $data 		= mysqli_fetch_array($query);
                                ?>

                                <form method="POST" action="proses-edit-barang.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID Barang</label>
                                            <input class="form-control" placeholder="Input ID Barang" type="text" name="id_barang" required
                                            value="<?php echo $data['id_barang'];?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input class="form-control" placeholder="Input Kode Barang" type="text" name="kode_barang" required
                                            value="<?php echo $data['kode_barang'];?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" placeholder="Input Nama Barang" type="text" name="nama_barang" required
                                            value="<?php echo $data['nama_barang'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>QTY Barang</label>
                                            <input class="form-control" placeholder="Input Qty Barang" type="text" name="qty_barang" required
                                            value="<?php echo $data['qty_barang'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Harga Barang</label>
                                            <input class="form-control" placeholder="Input Harga Barang" type="text" name="harga_barang" required
                                            value="<?php echo $data['harga_barang'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Deskripsi Barang</label>
                                            <input class="form-control" placeholder="Input Deskripsi Barang" type="text" name="deskripsi_barang" required
                                            value="<?php echo $data['deskripsi_barang'];?>">
                                        </div>

                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="ubah" value="UPDATE DATA" 
                                                onclick="return confirm('Apakah Anda yakin akan mengubah data?')">
  
                                        </div>
                                        


                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>



    </div>
    
</body>