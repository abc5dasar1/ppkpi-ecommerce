<?php
    $query = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id DESC");

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $delete = mysqli_query( $koneksi,"DELETE FROM testimoni WHERE id = '$id'");
        header ("location:?pg=testimoni&hapus=berhasil");
    }
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class=" mb-3 d-flex justify-content-end">
    <a href="?pg=tambah-testimoni" class="btn btn-sm btn-success"><i class="bi bi-plus"></i></a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="d-flex justify-content-center">No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['jabatan'] ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
            <td>
                <a href="?pg=tambah-testimoni&edit=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                <a href="?pg=testimoni&delete=<?php echo $row['id'] ?>" onclick="return confirm('Apakah yakin menghapus?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endwhile ?>
    </tbody>    
</table>