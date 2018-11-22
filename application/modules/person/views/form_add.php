<html>
<head>
	<title></title>
</head>
<body> 
	<? if ($method == 'update') {
		$name = $person->name;
		$description = $person->description;
		$submit = 'Simpan perubahan data';
		?>
	<h4>Form Ubah Data</h4>
	<? } else {
		$name = '';
		$description = '';
		$submit = 'Simpan data baru';
	 ?>

	<h4>Form Tambah Data</h4>
	<? } ?>

	<h6><?=$message;?></h6>
<form method="POST" action="">
		<label>Nama : </label>
		<input type="text" name="name" placeholder="Nama person" value="<?=$name;?>"><br>
		<label>Deskripsi : </label>
		<input type="text" name="description" placeholder="Deskripsi Person" value="<?=$description;?>"><br>
		<input type="submit" value="<?=$submit;?>">
</form>
</body>
</html>