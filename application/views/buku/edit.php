<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>

    <form method="POST" action="<?=base_url();?>buku/update">
    <input type="text" name="id" value="<?=$buku->_id;?>" hidden/>
        <table>
            <tr>
                <td>Penulis</td>
                <td>:&nbsp;<input type="text" name="penulis" value="<?=$buku->penulis;?>"/></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:&nbsp;<input type="text" name="judul" value="<?=$buku->judul;?>"/></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:&nbsp;<input type="text" name="kota" value="<?=$buku->kota;?>"/></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:&nbsp;<input type="text" name="penerbit" value="<?=$buku->penerbit;?>"/></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:&nbsp;<input type="text" name="tahun" value="<?=$buku->tahun;?>"/></td>
            </tr>
        </table>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
