<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
</head>
<body>
    <h5>Form Edit Berita</h5>
    <form action="<?= base_url('berita/edit/') . $news['id'] ?>" method="POST">
        <? csrf_field() ?>
        <table>
            <tr>
                <td>Judul :</td>
                <td>
                    <input type="text" name="judul" value="<?= $news['judul'] ?>" placeholder="ketikkan Judul">
                <td>
            </tr>
            <tr>
                <td>Isi Berita :</td>
                <td>
                    <input type="text" name="isi" value="<?= $news['isi'] ?>" placeholder="ketikkan Isi Berita">
                </td>
            </tr>
            <tr>
                <td>gambar :</td>
                <td>
                    <input type="text" name="gambar" value="<?= $news['gambar'] ?>" placeholder="Tambah Gambar">
                </td>
            </tr>
            </tr>
                <td>
                    <td><input type="submit" name="Simpan" value="Simpan"></td>
                    <a href="<?= base_url('/')?>"><button>Kembali</button></a>
                    
                </td>
            </tr>
        </table>
</body>
</html>