<?php

include_once('conn.php');

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM tbl_mahasiswa WHERE id=$id";
$result = mysqli_query($mysqli, $query);

foreach ($result as $value) {
    $nama = $value['nama'];
    $email = $value['email'];
    $alamat = $value['alamat'];
    $jk_kelamin = $value['jk_kelamin'];
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jk_kelamin = $_POST['jk_kelamin'];

    $query = "UPDATE tbl_mahasiswa SET nama='$nama', email='$email', alamat='$alamat', jk_kelamin='$jk_kelamin' WHERE id=$id";
    $result = mysqli_query($mysqli, $query);

    $_SESSION['message'] = "Data berhasil diupdate.";

    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row my-5">
            <h1>Edit data Mahasiswa UG</h1>
            <div class="col-md-5 mt-3">
                <form method="post" action="edit.php?=<?= $id; ?>">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?= $nama; ?>" name="nama" id="nama" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?= $email; ?>" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?= $alamat; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jk_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id=" jk_kelamin" name="jk_kelamin">
                            <option value="L" <?php if ($jk_kelamin == "L") echo "selected"; ?>>Laki-laki</option>
                            <option value="P" <?php if ($jk_kelamin == "P") echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-warning my-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>

</html>