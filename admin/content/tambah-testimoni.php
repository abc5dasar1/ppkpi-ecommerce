<?php 
    if (isset($_POST['simpan'])) {
        $nama = $_POST ['nama'];
        $jabatan =  $_POST['jabatan'];
        $deskripsi =  $_POST['deskripsi'];

        // MASUKKAN KE DALAM TABLE testimoni (FIELD YANG AKAN DIMASUKKAN)
        // VALUES (INPUTAN MASING-MASING KOLOM)

        $insert = mysqli_query($koneksi, "INSERT INTO testimoni (nama, jabatan, deskripsi) VALUES ('$nama','$jabatan','$deskripsi')");
        if(!$insert){
            echo "Gagal";
            // header("location:?pg=tambah-testimoni&pesan=tambah-gagal");
        }
        else{
            header("location:index.php?pg=testimoni&pesan=tambah-berhasil");
        }
    }   

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
    
        $edit = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($edit);
    }
    if(isset($_POST['edit'])){
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $deskripsi =  $_POST['deskripsi'];
        $id = $_GET['edit'];

        $update = mysqli_query($koneksi, "UPDATE testimoni SET nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id='$id'");
        header("location:?pg=testimoni&update=berhasil");
    }
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama</label>
        <input type="text" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>" class="form-control" required placeholder="Masukkan Nama" name="nama" id="">
    </div>
    <div class="mb-3">
        <label for="">Jabatan</label>
        <input type="jabatan" value="<?php echo isset($_GET['edit']) ? $rowEdit['jabatan'] : '' ?>" class="form-control" required placeholder="Masukkan Jabatan" name="jabatan" id="">
    </div>
    <div class="mb-3">
        <label for="">Deskripsi</label>
        <textarea type="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi" id="" required><?php echo isset($_GET['edit']) ? $rowEdit['deskripsi'] : '' ?></textarea>
    </div>
    <div class="mb-3">
        <!-- <label for="">Nama Lengkap</label> -->
        <input type="submit" class="btn btn-primary mr-2" value="<?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>" id="" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" >
        <a href="?pg=testimoni">Kembali</a>
    </div>
</form>