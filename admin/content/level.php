<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
    $query = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $delete = mysqli_query($koneksi,"DELETE FROM level WHERE id = '$id'");
        header('location:?pg=level&hapus=berhasil');   
    }
?>

<div class="d-flex justify-content-end mb-3">
    <a href="?pg=tambah-level" class="btn btn-success btn-sm"><i class="bi bi-plus"></i></a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Level</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; 
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_level'] ?></td>
                <td><?php echo $row['keterangan'] ?></td>
                <td>
                    <a href="?pg=tambah-level&edit=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                    <a href="?pg=level&delete=<?php echo $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                </td>
            </tr
        <?php endwhile ?>
    </tbody>
</table>