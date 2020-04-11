<?php
    require 'koneksi.php';
    $nim = $_GET['nim'];
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    $dataMahasiswa = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Data</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $dataMahasiswa['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $dataMahasiswa['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td>
                    <select name="prodi" id="">
                        <option value="Teknik Informatika" <?php if ($dataMahasiswa['prodi']=="Teknik Informatika"){
                            echo "selected";
                        }?> >Teknik Informatika</option>
                        <option value="Sistem Informasi" <?php if ($dataMahasiswa['prodi']=="Sistem Informasi"){
                            echo "selected";
                        }?> >Sistem Informasi</option>
                        <option value="Teknik Elektro" <?php if ($dataMahasiswa['prodi']=="Teknik Elektro"){
                            echo "selected";
                        }?> >Teknik Elektro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Masuk</td>
                <td>:</td>
                <td><input type="text" name="tahun_masuk" value="<?php echo $dataMahasiswa['tahun_masuk']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Simpan" name="submit"></td>
            </tr>
        </table>
        </form>
        <?php
            require 'koneksi.php';

            if (isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $prodi = $_POST['prodi'];
                $tahun_masuk = $_POST['tahun_masuk'];

                $result = mysqli_query($conn, "UPDATE mahasiswa SET 
                                                nama='$nama', prodi='$prodi', tahun_masuk='$tahun_masuk'
                                                WHERE nim='$nim'");
                header('Location: tampil_data.php');
            }
        ?>
</body>
</html>