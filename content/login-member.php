<?php
    // print_r($_SESSION);
    // die;
    if(isset($_POST['simpan'])){
        $email = htmlspecialchars($_POST['email']); 
        $password = $_POST['password'];
        // print_r($_POST);
        // die;

        $query = mysqli_query($koneksi, "SELECT * FROM member WHERE email = '$email'");
        if(mysqli_num_rows($query) > 0){
            $dataUser = mysqli_fetch_assoc($query);
            if($dataUser['password'] == $password){
                $_SESSION['id_member'] = $dataUser['id'];
                $_SESSION['id_session'] = session_id();
                header('location:index.php'); 
            }
        }
    }
?>

<div class="untree_co-section">
    <div class="container">
        <div class="block">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 pb-4">
                    <?php if (isset($_SESSION['id_member'])) : ?>
                        WELCOME HOME
                    <?php else : ?>
                        <form action="" method="post">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-black" for="lname">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-black" for="email">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary-hover-outline mt-3 me-3">Login</button>
                            <a href="?pg=member">Register</a>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>