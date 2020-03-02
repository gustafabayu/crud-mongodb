<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>
    <form method="POST" action="<?=base_url();?>buku/simpan">
            <table>
                <tr>
                    <td>Penulis</td>
                    <td>:&nbsp;<input type="text" name="penulis" id="penulis"/></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:&nbsp;<input type="text" name="judul" id="judul"/></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:&nbsp;<input type="text" name="kota" id="kota"/></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:&nbsp;<input type="text" name="penerbit" id="penerbit"/></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:&nbsp;<input type="text" name="tahun" id="tahun"/></td>
                </tr>
            </table>
            <button type="submit">Tambah</button>
        </form>
</body>
</html>
