<?php 
    if (isset($_POST['simpan'])) {
        // $_FILLES 
        $nama_barang = $_POST ['nama_barang'];
        $harga =  $_POST['harga'];
        $foto =  $_FILES['foto']['name'];   
        $size =  $_FILES['foto']['size'];
        
        $ekstensi = array('png', 'jpg', 'jpeg');
        $ext = pathinfo($foto, PATHINFO_EXTENSION);

        if (!in_array($ext, $ekstensi)) {
            echo "Mohon maaf masukkan ekstensi berupa png, jpg dan jpeg";
        }
        else{
            move_uploaded_file($_FILES["foto"]["tmp_name"], 'upload/' .$foto);

            $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_barang, harga, foto) VALUES ('$nama_barang','$harga','$foto')");
            if(!$insert){
                echo "Gagal";
                // header("location:?pg=tambah-produk&pesan=tambah-gagal");
            }
            else{
                header("location:index.php?pg=produk&pesan=tambah-berhasil");
            }
        }
        
        // MASUKKAN KE DALAM TABLE produk (FIELD YANG AKAN DIMASUKKAN)
        // VALUES (INPUTAN MASING-MASING KOLOM)
    }   

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
    
        $edit = mysqli_query($koneksi,"SELECT * FROM produk WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($edit);
    }
    if(isset($_POST['edit'])){
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $foto = $_FILES['foto']['name'];
        $size =  $_FILES['foto']['size'];
        
        $ekstensi = array('png', 'jpg', 'jpeg');
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $id = $_GET['edit'];
        if (!in_array($ext, $ekstensi)) {
            echo "Mohon maaf masukkan ekstensi berupa png, jpg dan jpeg";
        }
        else{
            unlink('upload/' . $rowEdit['foto']);
            move_uploaded_file($_FILES["foto"]["tmp_name"], 'upload/' .$foto);
                 
            $update = mysqli_query($koneksi, "UPDATE produk SET nama_barang='$nama_barang', harga='$harga', foto='$foto' WHERE id='$id'");
            header("location:?pg=produk&update=berhasil");
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Nama Barang</label>
        <input type="text" required value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_barang'] : '' ?>" class="form-control" placeholder="Masukkan Nama Barang" name="nama_barang" id="">
    </div>
    <div class="mb-3">
        <label for="">Harga</label>
        <input type="harga" required value="<?php echo isset($_GET['edit']) ? $rowEdit['harga'] : '' ?>" class="form-control" placeholder="Masukkan Harga" name="harga" id="">
    </div>
    <div class="mb-3">
        <label for="">Foto</label>
        <input type="file" required name="foto" id="" >
    </div>
    <div class="mb-3">
        <!-- <label for="">Nama Lengkap</label> -->
        <input type="submit" class="btn btn-primary mr-2" value="<?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>" id="" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" >
        <a href="?pg=produk">Kembali</a>
    </div>
</form>