<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
</head>
<body>
    <h3><a href="<?=base_url();?>buku/tambah">Tambah Buku</a>
    <br>
    <table>
        <tr>
            <th>Penulis</th>
            <th>Judul</th>            
            <th>Kota</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    <?php foreach($data as $buku ) : ?>
        <tr>
            <td><?=$buku->penulis;?></td>
            <td><?=$buku->judul;?></td>
            <td><?=$buku->kota;?></td>
            <td><?=$buku->penerbit;?></td>
            <td><?=$buku->tahun;?></td>
            <td>
                <a href="<?=base_url();?>buku/edit/<?=$buku->_id;?>">Edit</a> 
                |
                <a href="<?=base_url();?>buku/hapus/<?=$buku->_id;?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>

</body>
</html>
