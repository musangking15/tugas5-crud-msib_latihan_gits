<?php

include_once('conn.php');

session_start();

$query = 'SELECT * FROM tbl_mahasiswa ORDER BY nama';
$result = mysqli_query($mysqli, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row my-5">
            <h1>Data Mahasiswa UG</h1>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif ?>
            <div class="col mt-3">
                <a href="tambah.php" class="btn btn-primary my-2">Tambah +</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($result as $value) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td><?= $value['jk_kelamin']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $value['id']; ?>" class="btn btn-sm btn-warning">Edit Data</a>
                                    <a href="delete.php?id=<?= $value['id']; ?>" class="btn btn-sm btn-danger">Hapus Data</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>

</html>