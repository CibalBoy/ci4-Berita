<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Berita</title>
</head>
<body>
    <h3>Daftar Berita</h3>
    <a href="<?= base_url('berita/create') ?>"><button>Tambah</button></a>
    <br>
    <?php
        foreach($list as $dt){
           echo $dt['id'],' - 
           <a href="'.base_url('berita/preview/').$dt['id'].'">'.$dt['judul'].'</a> -
           '.substr($dt['isi'], 0, 100).' - 
           '.$dt['gambar'].' -
           <a href="'.base_url('berita/edit/').$dt['id'].'">Edit</a> &nbsp
           <a href="'.base_url('berita/delete/').$dt['id'].'" onlick="return confirm(\'Yakin akan dihapus ?\')">Delete<br>'; 
        }
    ?>
</body>
</html>