<?php
    require 'koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tampil Data Mahasiswa</title>
    </head>
    <body>
        <a href="tambah_data.php">Tambah Data</a>
        <table border="1">
        <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Prodi</td>
            <td>Tahun Masuk</td>
            <td>Aksi</td>
        </tr>
        <?php
            while ($data = mysqli_fetch_array($result)){
        ?>
        <tr>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['prodi']; ?></td>
                <td><?php echo $data['tahun_masuk']; ?></td>
                <td>
                    <a href="edit_data.php?nim=<?php echo $data['nim']; ?>">Edit</a> |
                    <a href="hapus_data.php?nim=<?php echo $data['nim']; ?>">Hapus</a>
                </td>
        </tr>
        <?php
            }
        ?>
        </table>
    </body>
</html>