<html>
<head>
	<title></title>
</head>
<body>
	<h1><?=$title;?></h1>
	<p>Author = <?=$author;?>
		<ul>
			<?php for ($i=0; $i < sizeof($warna); $i++){ ?>
				<li><?=$warna[$i];?></li>
				<?php }
				?>
		</ul>
	<table border="1">
		<tr>
			<td>Nama</td>
			<td>Deskripsi</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
		<?php if ($list_person) { ?>
		<?php foreach ($list_person as $item){ ?>
		<tr>
			<td><?=$item->name; ?></td>
			<td><?=$item->description; ?></td>
			<td><?=$item->state; ?></td>
			<td><a href="<?=base_url();?>person/update/<?=$item->id;?>">Ubah Data</a></td>
		</tr>
		<?php }?>
		<?php } else {?>
		<tr>
			<td colspan="3"> Data Person kosong</td>
		</tr>
		<?php }?>
		

	</table>
	<a href="<?=base_url();?>Person/add">Tambah Data Person</a>
</body>
</html>