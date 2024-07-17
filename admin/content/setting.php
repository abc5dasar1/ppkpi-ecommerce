<?php 
    if(isset($_POST['simpan'])){
        $email_website = $_POST['email_website'];
        $no_telp_website = $_POST['no_telp_website'];
        $alamat_website = $_POST['alamat_website'];
        $ig = $_POST['ig'];
        $twitter = $_POST['twitter'];
        $fb = $_POST['fb'];
        $linkedin = $_POST['linkedin'];
        // $logo = $_POST['logo'];                    

        $querySetting = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
        if(mysqli_num_rows($querySetting) > 0){
            // update
        } else{
            // insert
            $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, no_telp_website, alamat_website, ig, twitter, fb, linkedin) VALUES ('$email_website', '$no_telp_website','$alamat_website', '$ig', '$twitter', '$fb', '$linkedin')");
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Email Start -->
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email_website" placeholder="Email Website" id="">
    </div>

    <!-- No Telp Start -->
    <div class="mb-3">
        <label for="">No Telp</label>
        <input type="number" class="form-control" name="no_telp_website" placeholder="No Telpon Website" id="">
    </div>
    
    <!-- Instagram -->
    <div class="mb-3">
        <label for="">Instagram</label>
        <input type="url" class="form-control" name="ig" placeholder="Instagram Link" id="">
    </div>

    <!-- Twitter -->
    <div class="mb-3">
        <label for="">Twitter</label>
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link" id="">
    </div>

    <!-- Facebook -->
    <div class="mb-3">
        <label for="">Facebook</label>
        <input type="url" class="form-control" name="fb" placeholder="Facebook Link" id="">
    </div>

    <!-- Linkedin -->
    <div class="mb-3">
        <label for="">Linkedin</label>
        <input type="url" class="form-control" name="linkedin" placeholder="Linkedin Link" id="">
    </div>

    <!-- Alamat -->
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea name="alamat_website" class="form-control" id=""></textarea>
    </div>

    <!-- Logo -->
    <div class="mb-3">
        <label for="">Logo</label>
        <input type="file" name="logo" placeholder="Logo" id="">
    </div>

    <!-- Button Submit -->
    <div class="mb-3">
        <input type="submit" class="btn btn-primary mr-2" value="Simpan"
        name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan'?>">
        <a href="?pg=setting">Kembali</a>
    </div>
</form>