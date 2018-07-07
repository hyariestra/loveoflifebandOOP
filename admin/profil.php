<?php 
$det = $profil->ambil_profil();
//print_r(@$det);
 ?>
		<h2>Data Profil Perusahaan</h2>
			<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo @$det['title'];?>">
			</div>
			<div class="form-group">
				<label>Meta Description</label>
				<input type="text" name="meta" class="form-control" value="<?php echo @$det['meta'];?>">
			</div>
			<div class="form-group">
				<label>Nama Usaha</label>
				<input type="text" name="nama_usaha" class="form-control" value="<?php echo @$det['nama_usaha'];?>">
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="text" name="telp" class="form-control" value="<?php echo @$det['telp'];?>">
			</div>
			<div class="form-group">
				<label>Handphone</label>
				<input type="text" name="handphone" class="form-control" value="<?php echo @$det['handphone'];?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo @$det['email'];?>">
			</div>
			<div class="form-group">
				<label>Facebook</label>
				<input type="text" name="facebook" class="form-control" value="<?php echo @$det['facebook'];?>">
			</div>
			<div class="form-group">
				<label>Instagram</label>
				<input type="text" name="ins" class="form-control" value="<?php echo @$det['ins'];?>">
			</div>
			<div class="form-group">
				<label>Twitter</label>
				<input type="text" name="twitter" class="form-control" value="<?php echo @$det['twitter'];?>">
			</div>
			<div class="form-group">
				<label>Alamat Usaha</label>
				<textarea class="form-control" rows="10" name="alamat"><?php echo @$det['alamat'];?></textarea>
			</div>
			<div class="form-group">
				<label>Tentang Perusahaan</label>
				<textarea id="editorku"  class="form-control" rows="10" name="about"><?php echo @$det['about'];?></textarea>
			</div>
			<div class="form-group">
				<label>Rekening Perusahaan</label>
				<input type="text" class="form-control" name="rekening" value="<?php echo @$det['rekening'] ?>">
			</div>
			<div class="form-group">
			<label>Logo Perusahaan</label>
				<br>
				<img src="../pictures/profil/<?php echo @$det['logo'];?>" width="200" alt="">
				<br>
				<br>
				<input type="file" name="logo" class="form-control">
			</div>
			<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-pencil"></i> Ubah</button>
		</form>

	<?php 
	if (isset($_POST['ubah'])) {
		$profil->ubah_profil($_POST['title'],
			$_POST['meta'],
			$_POST['nama_usaha'],
			$_POST['telp'],
			$_POST['handphone'],
			$_POST['email'],
			$_POST['facebook'],
			$_POST['ins'],
			$_POST['twitter'],
			$_POST['alamat'],
			$_POST['about'],
			$_POST['rekening'],
			$_FILES['logo']);
		echo "<script>alert('data berhasil diubah');</script>";
		echo "<script>window.location='index.php?halaman=profil';</script>";
	}
	?>