<?php 

session_start();

$mysqli = new mysqli("localhost","root","","loveoflife");



class pengguna
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	
	function login_pengguna($uid,$pass)
	{
		// enskripsi pass ke md4
		//1. mencocokan data username pss pada tabel
		//2. hitung jumlah data yg cocok
		//3. memecah data yg cocok
		//4. jika ada data yg cocok ,username n pss bener, maka login
		//5. jika tidk mka gagal login
		$pass=$pass;
		$ambildata=$this->koneksi->query("SELECT * FROM admin WHERE username='$uid' AND password='$pass'");
		$hitung=$ambildata->num_rows;
		if ($hitung>0) 
		{
			$akun = $ambildata->fetch_assoc();

			$_SESSION['admin'] = $akun;

			return "true";

		}
		else
		{
			return "false";
		}

	}
	function logout_pengguna()
	{
		session_destroy();
	}
}

/**
* 
*/
/**
* 
*/

/**
* 
*/

class profil
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function ambil_profil()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pengaturan where id_profil  = 1"); 
		$pecahsiswa = $ambil->fetch_assoc();
		return $pecahsiswa;
	}
	function ubah_profil($title, $meta,$nama_usaha,$telp,$handphone,$email,$facebook,$ins,$twitter,$alamat,$about,$rekening,$logo)
	{
		if ($logo['error']==0) 
		{
			$namagambar=$logo['name'];
			$lokasigambar=$logo['tmp_name'];
			move_uploaded_file($lokasigambar, "../pictures/profil/$namagambar");
			$this->koneksi->query("UPDATE pengaturan SET title='$title',
				meta='$meta',
				nama_usaha='$nama_usaha',
				telp='$telp',
				handphone='$handphone',
				email='$email',
				facebook='$facebook',
				ins='$ins',
				twitter='$twitter',
				alamat='$alamat',
				about='$about',
				rekening='$rekening',
				logo='$namagambar'
				WHERE id_profil='1'");
		}
		else
		{
			$this->koneksi->query("UPDATE pengaturan SET title='$title',
				meta='$meta',
				nama_usaha='$nama_usaha',
				telp='$telp',
				handphone='$handphone',
				email='$email',
				facebook='$facebook',
				ins='$ins',
				twitter='$twitter',
				alamat='$alamat',
				about='$about',
				rekening='$rekening'
				WHERE id_profil='1'");
		}
	}

}

class gallery 
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function tampilgallery()
	{
		$tampilgallery = $this->koneksi->query("SELECT * FROM gallery ");
		if (mysqli_num_rows($tampilgallery) > 0)
		{
			while ($pecah = $tampilgallery->fetch_assoc()) 
			{
				$semuagallery[] = $pecah;
			}
			return $semuagallery;
		}
		else
		{
			echo "data kosong";	
		}
	}
	public function simpangallery($keterangan,$tanggal,$gambar,$status)
	{


		$namafoto=$gambar["name"];
		$namafiks=$namafoto;
	// 2.mengambil lokasi foto untuk di uplod
		$lokasifoto=$gambar["tmp_name"];

		$ektensiphoto=pathinfo($namafiks,PATHINFO_EXTENSION);
	// 4.mengambil ektensi foto
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ektensiphoto,$ektensiboleh))
		{
		// 5.1 menguplod foto ke folder foto siswa/nama foto dari lokasi foto
			move_uploaded_file($lokasifoto,"upload/gallery/$namafiks");
		// 5/2 query simpan data ke tabel siswa d db
			$this->koneksi->query("INSERT INTO gallery(gambar,keterangan,status,tanggal)
				VALUES('$namafiks','$keterangan','$status','$tanggal')");
			return "sukses";
		}
		else
		{
			return"gagal";
		}

	}
	public function ambilgallery($idb)
	{
		$ambil = $this->koneksi->query("SELECT*FROM gallery WHERE id_gallery = '$idb' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	public function hapusgallery($idb)
	{
		$det = $this->ambilgallery($idb);
		$deletefoto = $det['gambar'];

		if (file_exists("upload/gallery/$deletefoto"))
		{
			unlink("upload/gallery/$deletefoto");
		}

		$this->koneksi->query("DELETE 
			FROM gallery WHERE id_gallery = '$idb'");

	}


	public function simpanubahgallery($keterangan,$tanggal,$gambar,$status,$id)
	{
		$namafoto = $gambar['name'];
		$lokasifoto  = $gambar["tmp_name"];

		if (!empty($lokasifoto))
		{
			$detgallery = $this->ambilgallery($id);
			$fotolama = $detgallery['gambar'];

			if (file_exists("upload/gallery/$fotolama"))
			{
				unlink("upload/gallery/$fotolama");
			}
			$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
			
			$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

			if (in_array($ekstensi, $ektensiboleh))
			{
				move_uploaded_file($lokasifoto, "upload/gallery/$namafoto");

				$this->koneksi->query("UPDATE gallery SET 
					keterangan = '$keterangan',
					tanggal = '$tanggal',
					gambar = '$namafoto',
					status = '$status'
					WHERE id_gallery = '$id'

					");
				return "sukses";
			}

			else
			{
				return "gagal";
			}

		}
		else
		{
			$this->koneksi->query("UPDATE gallery SET 
				keterangan = '$keterangan',
				tanggal = '$tanggal',
				status = '$status'
				WHERE id_gallery = '$id'

				");

			return "sukses";
		}
	}

}



class agenda
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function tampilagenda()
	{
		$tampil = $this->koneksi->query("SELECT* FROM agenda");
		if (mysqli_num_rows($tampil)>0)
		{
			while ($arr = $tampil->fetch_assoc()) {
				$semua[] = $arr;
			}
			return $semua;
		}
		else
		{
			echo "data kosong";
		}
	}

	public function tampilagendadepan()
	{
		$tampil = $this->koneksi->query("SELECT* FROM agenda ORDER BY id_agenda DESC LIMIT 0,6");
		if (mysqli_num_rows($tampil)>0)
		{
			while ($arr = $tampil->fetch_assoc()) {
				$semua[] = $arr;
			}
			return $semua;
		}
		else
		{
			echo "data kosong";
		}
	}

	public function simpanagenda($nama,$tanggal,$keterangan,$gambar)
	{


		$namafoto=$gambar["name"];
		$namafiks=$namafoto;
	// 2.mengambil lokasi foto untuk di uplod
		$lokasifoto=$gambar["tmp_name"];

		$ektensiphoto=pathinfo($namafiks,PATHINFO_EXTENSION);
	// 4.mengambil ektensi foto
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ektensiphoto,$ektensiboleh))
		{
		// 5.1 menguplod foto ke folder foto siswa/nama foto dari lokasi foto
			move_uploaded_file($lokasifoto,"upload/agenda/$namafiks");
		// 5/2 query simpan data ke tabel siswa d db
			$this->koneksi->query("INSERT INTO agenda(nama_acara,tanggal,keterangan,gambar)
				VALUES('$nama','$tanggal','$keterangan','$namafiks')");
			return "sukses";
		}
		else
		{
			return"gagal";
		}

	}
	public function ambilagenda($id)
	{
		$ambil = $this->koneksi->query("SELECT*FROM agenda WHERE id_agenda = '$id' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	public function simpanubahagenda($nama,$tanggal,$keterangan,$gambar,$id)
	{
		$namafoto = $gambar['name'];
		$lokasifoto  = $gambar["tmp_name"];

		if (!empty($lokasifoto))
		{
			$detgallery = $this->ambilagenda($id);
			$fotolama = $detgallery['gambar'];

			if (file_exists("upload/agenda/$fotolama"))
			{
				unlink("upload/agenda/$fotolama");
			}
			$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
			
			$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

			if (in_array($ekstensi, $ektensiboleh))
			{
				move_uploaded_file($lokasifoto, "upload/agenda/$namafoto");

				$this->koneksi->query("UPDATE agenda SET 
					nama_acara = '$nama',
					tanggal = '$tanggal',
					keterangan = '$keterangan',
					gambar = '$namafoto'
					WHERE id_agenda = '$id'

					");
				return "sukses";
			}

			else
			{
				return "gagal";
			}

		}
		else
		{
			$this->koneksi->query("UPDATE agenda SET 
				nama_acara = '$nama',
				tanggal = '$tanggal',
				keterangan = '$keterangan'
				WHERE id_agenda = '$id'

				");

			return "sukses";
		}
	}



	public function hapusagenda($idb)
	{
		$det = $this->ambilagenda($idb);
		$deletefoto = $det['gambar'];

		if (file_exists("upload/agenda/$deletefoto"))
		{
			unlink("upload/agenda/$deletefoto");
		}

		$this->koneksi->query("DELETE 
			FROM agenda WHERE id_agenda = '$idb'");

	}


}



class album
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function tampilalbum()
	{
		$tampil = $this->koneksi->query("SELECT* FROM album");
		if (mysqli_num_rows($tampil)>0)
		{
			while ($arr = $tampil->fetch_assoc()) {
				$semua[] = $arr;
			}
			return $semua;
		}
		else
		{
			echo "data kosong";
		}
	}

	public function simpanalbum($judul,$artis,$keterangan)
	{
		if ($judul !=='') {
			
			$this->koneksi->query("INSERT into album(judul_album, artis, keterangan)VALUES('$judul','$artis','$keterangan')");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	public function ambilalbum($id)
	{
		$ambil = $this->koneksi->query("SELECT*FROM album WHERE id_album = '$id' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	public function ubahalbum($judul,$artis,$keterangan,$id)
	{

		if ($judul !== "") {

			$this->koneksi->query("UPDATE album SET judul_album = '$judul',
				artis = '$artis',
				keterangan = '$keterangan'
				WHERE id_album = '$id'

				");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	public function hapusalbum($id)
	{
		$this->koneksi->query("DELETE FROM album WHERE id_album = '$id' ");
	}


}

class lagu
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function tampillagu()
	{
		$tampil = $this->koneksi->query("SELECT*FROM lagu LEFT JOIN album ON album.`id_album` = lagu.`id_album`");
		if (mysqli_num_rows($tampil)>0)
		{
			while ($arr = $tampil->fetch_assoc()) {
				$semua[] = $arr;
			}
			return $semua;
		}
		else
		{
			echo "data kosong";
		}
	}
	function simpanlagu($idalbum,$judul,$file)
	{


		$namafoto=$file["name"];
		$namafiks=$namafoto;
	// 2.mengambil lokasi foto untuk di uplod
		$lokasifoto=$file["tmp_name"];

		$ektensiphoto=pathinfo($namafiks,PATHINFO_EXTENSION);
	// 4.mengambil ektensi foto
		$ektensiboleh=array("mp3");

		if (in_array($ektensiphoto,$ektensiboleh))
		{
		// 5.1 menguplod foto ke folder foto siswa/nama foto dari lokasi foto
			move_uploaded_file($lokasifoto,"upload/lagu/$namafiks");
		// 5/2 query simpan data ke tabel siswa d db
			$this->koneksi->query("INSERT INTO lagu(id_album,judul_lagu,file)
				VALUES('$idalbum','$judul','$namafiks')");
			return "sukses";
		}
		else
		{
			return"gagal";
		}
	}

	public function ambillagu($id)
	{
		$ambil = $this->koneksi->query("SELECT*FROM lagu WHERE id_lagu = '$id' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	public function simpanubahlagu($idalbum,$judul,$lagu,$id)
	{
		$namafoto = $lagu['name'];
		$lokasifoto  = $lagu["tmp_name"];

		if (!empty($lokasifoto))
		{
			$detgallery = $this->ambillagu($id);
			$fotolama = $detgallery['file'];

			if (file_exists("upload/lagu/$fotolama"))
			{
				unlink("upload/lagu/$fotolama");
			}
			$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
			
			$ektensiboleh=array("mp3");

			if (in_array($ekstensi, $ektensiboleh))
			{
				move_uploaded_file($lokasifoto, "upload/lagu/$namafoto");

				$this->koneksi->query("UPDATE lagu SET 
					id_album = '$idalbum',
					judul_lagu = '$judul',
					file = '$namafoto '
					WHERE id_lagu = '$id'

					");
				return "sukses";
			}

			else
			{
				return "gagal";
			}

		}
		else
		{
			$this->koneksi->query("UPDATE lagu SET 
				id_album = '$idalbum',
				judul_lagu = '$judul'
				WHERE id_lagu = '$id'

				");

			return "sukses";
		}
	}
	public function hapuslagu($idb)
	{
		$det = $this->ambillagu($idb);
		$delete = $det['file'];

		if (file_exists("upload/lagu/$delete"))
		{
			unlink("upload/lagu/$delete");
		}
		$this->koneksi->query("DELETE FROM lagu WHERE id_lagu = '$idb' ");
	}
}


class user
{
	
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function tampiluser()
	{
		$tampiluser = $this->koneksi->query("SELECT*FROM user");
		if (mysqli_num_rows($tampiluser) > 0 )
		{
			while ($pecah = $tampiluser->fetch_assoc())
			{
				$semuauser[] = $pecah;
			}
			return $semuauser;
		}
		else{
			echo "data kosong";
		}
	}


	public function historypembelian($id)
	{
		$tampiluser = $this->koneksi->query("SELECT * FROM pembelian
			LEFT JOIN USER ON user.`id_user` = pembelian.`id_pelanggan`
			LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.`id_pembelian`
			WHERE id_user = '".$id."' GROUP BY pembelian.id_pembelian ");

		if (mysqli_num_rows($tampiluser) > 0 )
		{
			while ($pecah = $tampiluser->fetch_assoc())
			{
				$semuauser[] = $pecah;
			}
			return $semuauser;
		}
		else{
			echo "data kosong";
		}
	}

	public function historypembeliantiket($id)
	{
		$tampiluser = $this->koneksi->query("SELECT * FROM pembelian_tiket
			LEFT JOIN USER ON pembelian_tiket.`id_pelanggan` = user.`id_user`
			LEFT JOIN pembelian_detail_tiket ON pembelian_tiket.`id_pembelian_tiket` = pembelian_detail_tiket.`id_pembelian_tiket`
			WHERE id_user = '$id'
			ORDER BY pembelian_tiket.id_pembelian_tiket DESC");

		if (mysqli_num_rows($tampiluser) > 0 )
		{
			while ($pecah = $tampiluser->fetch_assoc())
			{
				$semuauser[] = $pecah;
			}
			return $semuauser;
		}
		else{
			echo "data kosong";
		}
	}


	function login_user($uid,$pass)
	{
		// enskripsi pass ke md4
		//1. mencocokan data username pss pada tabel
		//2. hitung jumlah data yg cocok
		//3. memecah data yg cocok
		//4. jika ada data yg cocok ,username n pss bener, maka login
		//5. jika tidk mka gagal login
		$pass=$pass;
		$ambildata=$this->koneksi->query("SELECT * FROM user WHERE email='$uid' AND password='$pass'");
		$hitung=$ambildata->num_rows;
		if ($hitung>0) 
		{
			$akun = $ambildata->fetch_assoc();

			$_SESSION['user'] = $akun;

			return "true";

		}
		else
		{
			return "false";
		}

	}
	public function ubahprofil($pass,$nama,$telp, $jk, $alamat,$id)
	{


		if ($pass == '' OR $pass ==NULL) {
			$this->koneksi->query("UPDATE user SET nama = '$nama',
				no_telpon='$telp',
				jenis_kelamin = '$jk',
				alamat = '$alamat'

				WHERE id_user = '".$id."'
				");
			return "sukses";
		}elseif ($pass <> '' OR $pass <> NULL) {
			$this->koneksi->query("UPDATE user SET password = '$pass',
				nama = '$nama',
				no_telpon='$telp',
				jenis_kelamin = '$jk',
				alamat = '$alamat'
				WHERE id_user = '".$id."'
				");
			return "sukses";
		}
		else
		{
			return "gagal";
		}

	}


	public function detailuser($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM user where id_user = '".$id."' ")->fetch_assoc();
		return $ambil;
	}

	function daftar_user($email,$pass,$nama,$telp,$alamat,$jk)
	{
		$this->koneksi->query("INSERT into user(email, password, nama,no_telpon, alamat, jenis_kelamin)VALUES('$email','$pass','$nama','$telp','$alamat','$jk')");
		$msg = '<div style= color:red; >Selamat</div>';

		return "sukses";

	}

}


class produk
{
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function ambilval($idb)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 0,1");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function simpancheckout($nama,$telepon_penerima,$alamat_penerima,$total_belanja,$total_berat,$nama_provinsi,$nama_kota,$tipe,$kodepos,$nama_ekspedisi,$nama_paket,$biaya_paket,$lama_paket,$total_bayar)
	{
		$det = $this->ambilval();

		$idsess = $_SESSION['user']['id_user'];
		$tglpembelian=date('Y-m-d');
		$tglbatasbayar = date('Y-m-d', strtotime($tglpembelian . "+1 days"));

		$day = date("d", $tglpembelian);

		$status_pembelian ="belum lunas";
		$status_pengiriman="Pending";
		$resi_pengiriman="Belum Ada Resi";
		$one = 1;
		$kode = "INV/".$det['id_pembelian'].$day;



		$this->koneksi->query("INSERT INTO pembelian(nama_penerima,telp_penerima,alamat_pelanggan,total_pembelian,total_berat,nama_provinsi,nama_kota,tipe,kode_pos,ekspedisi,paket_ekspedisi,biaya_pengiriman,waktu_tempuh,total_bayar,tanggal_pembelian,tanggal_batas_bayar,status_pembelian,resi_pengiriman,status_pengiriman,id_pelanggan,kode_pembelian)VALUES('$nama','$telepon_penerima','$alamat_penerima','$total_belanja','$total_berat','$nama_provinsi','$nama_kota','$tipe','$kodepos','$nama_ekspedisi','$nama_paket','$biaya_paket','$lama_paket','$total_bayar','$tglpembelian','$tglbatasbayar','$status_pembelian','$resi_pengiriman','$status_pengiriman','$idsess','$kode'); ");

		$idp = $this->koneksi->insert_id;

		$_SESSION['idlast'] = array('id'=>$this->koneksi->insert_id);
		

		$keranjang = $_SESSION['keranjang'];

		foreach ($keranjang as $key => $value) 
		{
			$semua = $this->koneksi->query("SELECT * from barang WHERE id_barang = '".$value['id']."' ");
			$row = mysqli_fetch_assoc($semua);


			$isi['id_produk']=$row['id_barang'];

			$isi['nama_beli']=$row['nama_barang'];

			$isi['harga_beli']=$row['harga'];

			$isi['jumlah_beli']=$value['jumlah'];

			$isi['berat_beli']=$row['berat_barang'];


			$id = 	$isi['id_produk'];
			$nama = 	$isi['nama_beli'];
			$harga = 	$isi['harga_beli'];
			$jumlah = 	$isi['jumlah_beli'];
			$berat = 	$isi['berat_beli'];


			$this->koneksi->query("INSERT into pembelian_detail(id_pembelian,id_produk, nama_beli, harga_beli,jumlah_beli, berat_beli)VALUES('$idp','$id','$nama','$harga','$jumlah','$berat') ");		

			unset($_SESSION['keranjang']);
			/*unset($_SESSION['idlast']);*/


		}
		return 'sukses';

	}

	function tampilproduk()
	{
		$tampilproduk = $this->koneksi->query("SELECT*FROM barang WHERE NOT tipe = 'tiket'");
		if (mysqli_num_rows($tampilproduk) > 0 )
		{
			while ($pecah = $tampilproduk->fetch_assoc())
			{
				$semuaproduk[] = $pecah;
			}
			return $semuaproduk;
		}else{
			echo "data kosong";
		}
	}
	function simpanproduk($kategori,$produk,$harga,$stok,$berat,$keterangan,$gambar)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ekstensi, $ektensiboleh))
		{
			move_uploaded_file($lokasi, "upload/produk/$namafoto");
			$this->koneksi->query("INSERT INTO barang(nama_barang,harga,tipe,stok,keterangan,berat_barang,foto)VALUES('$produk','$harga','$kategori','$stok','$keterangan','$berat','$namafoto') ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function ambilproduk($idb)
	{
		$ambil = $this->koneksi->query("SELECT * FROM barang WHERE id_barang = '$idb' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function hapusproduk($idb)
	{
		$det = $this->ambilproduk($idb);
		$deletefoto = $det['foto'];

		if (file_exists("upload/produk/$deletefoto"))
		{
			unlink("upload/produk/$deletefoto");
		}

		$this->koneksi->query("DELETE 
			FROM barang WHERE id_barang = '$idb'");
	}

	function simpanubahproduk($kategori,$produk,$harga,$stok,$berat,$keterangan,$gambar,$id)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");


		if ($namafoto=='') 
		{

			move_uploaded_file($lokasi, "upload/produk/$namafoto");
			$this->koneksi->query("UPDATE barang SET 
				nama_barang = '$produk',
				harga = '$harga',
				stok = '$stok',
				berat_barang = '$berat',
				keterangan = '$keterangan',
				tipe = '$kategori'
				WHERE id_barang = '$id'
				");
			return "sukses";

		}else{


			if (in_array($ekstensi, $ektensiboleh))
			{
				move_uploaded_file($lokasi, "upload/produk/$namafoto");
				$this->koneksi->query("UPDATE barang SET 
					nama_barang = '$produk',
					harga = '$harga',
					stok = '$stok',
					berat_barang = '$berat',
					keterangan = '$keterangan',
					tipe = '$kategori',
					foto = '$namafoto '
					WHERE id_barang = '$id'
					");
				return "sukses";
			}
			else
			{
				return "gagal";
			}

		}

	}

	function simpankeranjang($id,$jumlah)
	{

		$_SESSION['keranjang'][] = array('id'=>$id,'jumlah'=>$jumlah);
		
		return "sukses";




	}

	function hapuskeranjang($id)
	{
		unset($_SESSION['keranjang'][$id]);

		return "sukses";
	}



}


class tiket
{
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	

	function ambilidne()
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian_tiket ORDER BY id_pembelian_tiket DESC LIMIT 0,1");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	public function printtiket($id)
	{
		$all = $this->koneksi->query("SELECT*FROM pembelian_detail_tiket WHERE id_pembelian_detail_tiket = '$id' ")->fetch_assoc();
		return $all;

	}


	function simpanbelitiket($harga,$id,$nama,$email,$telp,$jumlah,$tgltiket,$regotiket,$namatiket,$tempat)
	{


		$det = $this->ambilidne();

		$tglpembelian=date('Y-m-d');

		$timestamp = strtotime($tglpembelian);
		$kodedate =  date("d", $timestamp);

		$status_pembelian ="Pending";
		$status_pembayaran ="belum ada pembayaran";
		$rand = '';
		$rand = rand(10,100);

		$totalbayar = $harga*$jumlah;


		$kode ="TKT/".$det['id_pembelian_tiket'].'/'.$kodedate.'/'.$rand;
		



		$this->koneksi->query("INSERT INTO pembelian_tiket(total_pembelian,id_pelanggan,nama_penerima,email_penerima,telp_penerima,jumlah_pembelian,kode_pembelian,tanggal_pembelian,total_bayar,status_pembelian,pembayaran,tanggal_event_tiket,nama_event_tiket)VALUES('$harga','$id','$nama','$email','$telp','$jumlah','$kode','$tglpembelian','$totalbayar','$status_pembelian','$status_pembayaran','$tgltiket','$namatiket')");

		$idp = $this->koneksi->insert_id;


		$_SESSION['idlasttiket'] = array('id'=>$this->koneksi->insert_id);

		for ($i=0; $i < $jumlah; $i++)
		{ 

			$rand = rand();
			$kode ="PEMTKT/".$det['id_pembelian_tiket'].'/'.$kodedate.'/'.$rand;

			$this->koneksi->query("INSERT INTO pembelian_detail_tiket(id_pembelian_tiket,id_tiket,tanggal_beli,harga_beli,nama_beli,tempat_beli)VALUES('$idp','$kode','$tgltiket','$harga','$namatiket','$tempat') ");


		}


		return "sukses";
	}

	public function ambil_pembelian_tiket($id)
	{

		$tampipembelian = $this->koneksi->query("SELECT*FROM pembelian_tiket WHERE pembelian_tiket.`id_pembelian_tiket` = '".$id."' ")->fetch_assoc();
		return $tampipembelian;
	}

	function tampiltiket()
	{
		$tampiltiket = $this->koneksi->query("SELECT*FROM tiket order by id_tiket DESC");
		if (mysqli_num_rows($tampiltiket) > 0 )
		{
			while ($pecah = $tampiltiket->fetch_assoc())
			{
				$semuatiket[] = $pecah;
			}
			return $semuatiket;
		}else{
			echo "data kosong";
		}
	}
	function simpantiket($nama,$tempat,$tanggal,$harga,$keterangan,$gambar)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ekstensi, $ektensiboleh))
		{
			move_uploaded_file($lokasi, "upload/tiket/$namafoto");
			$this->koneksi->query("INSERT INTO tiket(nama_tiket,tempat,tanggal,harga,keterangan,gambar)VALUES('$nama','$tempat','$tanggal','$harga','$keterangan','$namafoto') ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function ambiltiket($idb)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tiket WHERE id_tiket = '$idb' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function hapusproduk($idb)
	{
		$det = $this->ambilproduk($idb);
		$deletefoto = $det['foto'];

		if (file_exists("upload/produk/$deletefoto"))
		{
			unlink("upload/produk/$deletefoto");
		}

		$this->koneksi->query("DELETE 
			FROM barang WHERE id_barang = '$idb'");
	}

	function simpanubahproduk($kategori,$produk,$harga,$stok,$berat,$keterangan,$gambar,$id)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");


		if ($namafoto=='') 
		{

			move_uploaded_file($lokasi, "upload/produk/$namafoto");
			$this->koneksi->query("UPDATE barang SET 
				nama_barang = '$produk',
				harga = '$harga',
				stok = '$stok',
				berat_barang = '$berat',
				keterangan = '$keterangan',
				tipe = '$kategori'
				WHERE id_barang = '$id'
				");
			return "sukses";

		}else{


			if (in_array($ekstensi, $ektensiboleh))
			{
				move_uploaded_file($lokasi, "upload/produk/$namafoto");
				$this->koneksi->query("UPDATE barang SET 
					nama_barang = '$produk',
					harga = '$harga',
					stok = '$stok',
					berat_barang = '$berat',
					keterangan = '$keterangan',
					tipe = '$kategori',
					foto = '$namafoto '
					WHERE id_barang = '$id'
					");
				return "sukses";
			}
			else
			{
				return "gagal";
			}

		}

	}

	function simpankeranjang($id,$jumlah)
	{

		$_SESSION['keranjang'][] = array('id'=>$id,'jumlah'=>$jumlah);
		
		return "sukses";




	}

	function hapuskeranjang($id)
	{
		unset($_SESSION['keranjang'][$id]);

		return "sukses";
	}



}


class pembelian 
{
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function simpanresi($id,$resi)
	{


		$input = $this->koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi'  WHERE id_pembelian = '$id'");
		
		$this->koneksi->query("UPDATE pembelian SET status_pengiriman = 'Dikirm'  WHERE id_pembelian = '$id'");
		
		if ($input) 
		{
			return "sukses";
		}else
		{
			return "gagal";
		}
		
	}

	public function konfirmasitiket($id)
	{
		$newstat = 'Approved';

		$input = $this->koneksi->query("UPDATE pembelian_tiket SET status_pembelian = '$newstat' WHERE id_pembelian_tiket = '$id' ");

			$this->koneksi->query("UPDATE pembelian_tiket SET pembayaran = 'Lunas'  WHERE id_pembelian_tiket = '$id'");

		if ($input)
		{
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	public function ambil_pembelian($id)
	{

		$tampipembelian = $this->koneksi->query("SELECT*FROM pembelian LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.`id_pembelian` LEFT JOIN USER ON pembelian.`id_pelanggan` = user.`id_user`	WHERE pembelian.`id_pembelian` = '".$id."' ");
		if (mysqli_num_rows($tampipembelian) > 0 )
		{
			while ($pecah = $tampipembelian->fetch_assoc())
			{
				$semua[] = $pecah;
			}
			return $semua;
		}else{
			echo "data kosong";
		}	
	}

	public function ambilpembayaran($id)
	{
		$ambil = $this->koneksi->query("SELECT*FROM pembayaran WHERE id_pembelian = '".$id."' ");
		if (mysqli_num_rows($ambil) > 0)
		{
			$pecah = $ambil->fetch_assoc();
			return $pecah;
		}else{
			echo "";
		}

	}

	public function ambilpembayarantiket($id)
	{
		$ambil = $this->koneksi->query("SELECT*FROM pembayaran_tiket WHERE id_pembelian = '".$id."' ");
		if (mysqli_num_rows($ambil) > 0)
		{
			$pecah = $ambil->fetch_assoc();
			return $pecah;
		}else{
			echo "";
		}

	}

	public function ambilpembayaran_($id)
	{

		$tampilpembayaran = $this->koneksi->query("SELECT*FROM pembayaran WHERE id_pembelian = '".$id."' ");
		if (mysqli_num_rows($tampilpembayaran) > 0 )
		{
			while ($pecah = $tampilpembayaran->fetch_assoc())
			{
				$semua[] = $pecah;
			}
			return $semua;
		}else{
			echo "data kosong";
		}	
	}

	public function tampilpembelian()
	{
		$tampilpembelian = $this->koneksi->query("SELECT*FROM pembelian
			LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.`id_pembelian` LEFT JOIN USER ON pembelian.`id_pelanggan` = user.`id_user` GROUP BY pembelian.id_pembelian");
		if (mysqli_num_rows($tampilpembelian) > 0 )
		{
			while ($pecah = $tampilpembelian->fetch_assoc())
			{
				$semua[] = $pecah;
			}
			return $semua;
		}else{
			echo "data kosong";
		}	
	}

	public function tampilpembeliantiket()
	{
		$tampil = $this->koneksi->query("SELECT * FROM pembelian_tiket
			LEFT JOIN USER ON pembelian_tiket.`id_pelanggan` = user.`id_user`
			LEFT JOIN pembelian_detail_tiket ON pembelian_tiket.`id_pembelian_tiket` = pembelian_detail_tiket.`id_pembelian_tiket`
			GROUP BY pembelian_tiket.`id_pembelian_tiket` ORDER BY pembelian_tiket.id_pembelian_tiket DESC ");

		while ($semua = $tampil->fetch_assoc())
		{
			$all[] = $semua;
		}
		return $all;

	}	


	function simpankonfirmasi($kode,$id_pembelian,$nominal,$bank,$nama,$tanggal,$gambar)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ekstensi, $ektensiboleh))
		{
			move_uploaded_file($lokasi, "admin/upload/konfirmasi/$namafoto");
			$this->koneksi->query("INSERT INTO pembayaran(kode_pembelian,id_pembelian,jumlah_pembayaran,bank_pembayaran,nama_pembayaran,tanggal_pembayaran,bukti_pembayaran)VALUES('$kode','$id_pembelian','$nominal','$bank','$nama','$tanggal','$namafoto') ");


			$this->koneksi->query("UPDATE pembelian SET status_pembelian = 'Sudah konfirmasi'  WHERE id_pembelian = '$id_pembelian'");
			unset($_SESSION['idlast']);

			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	function simpankonfirmasitiket($kode,$id_pembelian,$nominal,$bank,$nama,$tanggal,$gambar)
	{
		$namafoto = $gambar["name"];
		$lokasi = $gambar["tmp_name"];

		$ekstensi = pathinfo($namafoto,PATHINFO_EXTENSION);
		$ektensiboleh=array("jpg","png","jprg","gif","JPG","PNG");

		if (in_array($ekstensi, $ektensiboleh))
		{
			move_uploaded_file($lokasi, "admin/upload/konfirmasitiket/$namafoto");
			$this->koneksi->query("INSERT INTO pembayaran_tiket(kode_pembelian,id_pembelian,jumlah_pembayaran,bank_pembayaran,nama_pembayaran,tanggal_pembayaran,bukti_pembayaran)VALUES('$kode','$id_pembelian','$nominal','$bank','$nama','$tanggal','$namafoto') ");


			$this->koneksi->query("UPDATE pembelian_tiket SET pembayaran = 'Sudah konfirmasi'  WHERE id_pembelian_tiket = '$id_pembelian'");
			unset($_SESSION['idlasttiket']);

			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
}



class pesan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	public function tampilpesan()
	{
		$tampil = $this->koneksi->query("SELECT* FROM pesan");
		if (mysqli_num_rows($tampil)>0)
		{
			while ($arr = $tampil->fetch_assoc()) {
				$semua[] = $arr;
			}
			return $semua;
		}
		else
		{
			echo "data kosong";
		}
	}

	public function simpanpesan($nama,$email,$telp,$pesan)
	{
		if ($email !=='') {
			
			$this->koneksi->query("INSERT into pesan(nama, email,telp,pesan)VALUES('$nama','$email','$telp','$pesan')");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}


}

class kategori
{
	
	function tampil_kategori()
	{
		$ambildata=mysql_query("SELECT*FROM kategori");
		if (mysql_num_rows($ambildata)>0)
		{
			while ($kat=mysql_fetch_assoc($ambildata))
				$data[]=$kat;
			return $data;
		}
		else
		{
			echo "kategori kosong";
		}
	}

	function simpan_kategori($kategori)
	{
		mysql_query("INSERT INTO kategori(kategori) VALUES('$kategori')");
	}
	function hapus_kategori($idnya)
	{
		mysql_query("DELETE FROM kategori WHERE id_kategori='$idnya'");
	}
	function ambil_kategori($idnya)
	{
		$ambil=mysql_query("SELECT*FROM kategori WHERE id_kategori='$idnya'");
		$kat=mysql_fetch_assoc($ambil);
		$data[]=$kat;
		return $data;
	}
	function ubah_kategori($kategori,$idnya)
	{
		mysql_query("UPDATE kategori set kategori='$kategori' WHERE id_kategori='$idnya'");
	}
}




class berita
{
	function tampil_berita()
	{
		$tampilberita=mysql_query("SELECT * FROM berita a join kategori b on a.id_kategori=b.id_kategori WHERE penulis='$_SESSION[username]'");
		if (mysql_num_rows($tampilberita) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilberita)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong berita";
		}
	}

	function tampil_berita_sidebar()
	{
		$tampilberita=mysql_query("SELECT * FROM berita a join kategori b on a.id_kategori=b.id_kategori");
		if (mysql_num_rows($tampilberita) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilberita)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong berita";
		}
	}

	function tampil_berita_depan()
	{
		$tampilberita=mysql_query("SELECT * FROM berita a join kategori b on a.id_kategori=b.id_kategori limit 8");
		if (mysql_num_rows($tampilberita) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilberita)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong berita";
		}
	}

	function tampil_berita_kategori($idk)
	{
		$tampilberita=mysql_query("SELECT * FROM berita a join kategori b on a.id_kategori=b.id_kategori where b.id_kategori = '$idk'");
		if (mysql_num_rows($tampilberita) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilberita)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong berita";
		}
	}
	function ambil_berita($idb)
	{
		$ambil=mysql_query("SELECT*FROM berita WHERE id_berita='$idb'");
		$a=mysql_fetch_assoc($ambil);
		$data[]=$a;
		return $data;
	}
	function simpan_berita($judul,$kategori,$isi,$gambar)
	{
		$hariini=date('Y-m-d');
		$kate=$kategori;
		$namagambar=$gambar['name'];
		$lokasigambar=$gambar['tmp_name'];
		move_uploaded_file($lokasigambar, "../assets/images/article/$namagambar");

		if (empty($kate)) {
			$query=mysql_query("INSERT INTO berita(judul,id_kategori,penulis,tanggal,isi,gambar)VALUES('$judul','99','$_SESSION[username]',$hariini','$isi','$namagambar')");
		}
		else
		{
			$query=mysql_query("INSERT INTO berita(judul,id_kategori,penulis,tanggal,isi,gambar)VALUES('$judul','$kategori','$_SESSION[username]','$hariini','$isi','$namagambar')");
		}
	}
	function hapus_berita($idnya)
	{
		mysql_query("DELETE FROM berita WHERE id_berita='$idnya'");
	}
	function ubah_berita($idb,$judul,$kategori,$isi,$gambar)
	{
		if ($gambar['error']==0) 
		{
			$namagambar=$gambar['name'];
			$lokasigambar=$gambar['tmp_name'];
			move_uploaded_file($lokasigambar, "../assets/images/article/$namagambar");
			mysql_query("UPDATE berita SET judul='$judul',id_kategori='$kategori',isi='$isi',gambar='$namagambar' WHERE id_berita='$idb'");
		}

		else
		{
			mysql_query("UPDATE berita SET judul='$judul',id_kategori='$kategori',isi='$isi' WHERE id_berita='$idb'");
		}
	}

}


/**
* 
*/
class apiongkir
{
	
	function tampil_provinsi()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ad7c27478d6afda259fb9abe62aeeaf9"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else
		{
			$dataprovinsi = json_decode($response,TRUE);
			$dataprovinsi = $dataprovinsi['rajaongkir']['results'];

			return $dataprovinsi;

		}
	}

	function tampil_kota($id_provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ad7c27478d6afda259fb9abe62aeeaf9"

			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$datakota= json_decode($response,TRUE);
			$datakota = $datakota['rajaongkir']['results'];

			return $datakota;
		}
	}

	function tampil_ongkir($id_kota_asal,$id_kota_tujuan,$berat,$ekspedisi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_kota_asal&destination=$id_kota_tujuan&weight=$berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key:ad7c27478d6afda259fb9abe62aeeaf9"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$dataongkir = json_decode($response,TRUE);
			$dataongkir = $dataongkir['rajaongkir']['results']['0']['costs'];
			return $dataongkir;	
		}
	}



}



class halamanstatis 
{
	
	function tampil_halamanstatis()
	{
		$tampilhalamanstatis=mysql_query("SELECT * FROM halamanstatis");
		if (mysql_num_rows($tampilhalamanstatis) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilhalamanstatis)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong halamanstatis";
		}
	}

	function tampil_halamanstatis1()
	{
		$tampilhalamanstatis=mysql_query("SELECT * FROM halamanstatis where id_hal = '4'");
		if (mysql_num_rows($tampilhalamanstatis) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilhalamanstatis)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong halamanstatis";
		}
	}

	function tampil_halamanstatis2()
	{
		$tampil = mysql_query("SELECT * FROM halamanstatis where id_hal BETWEEN 5 and 100 and status ='AKtif' ");
		if (mysql_num_rows($tampil) > 0)
		{
			while ($val = mysql_fetch_assoc($tampil))
				$data[] = $val;
			return $data;
		}
		else {
			echo "data kosong";
		}
	}
	function tampil_paket_depan()
	{
		$tampilpaket=mysql_query("SELECT * FROM paket where status='Aktif' limit 4");
		if (mysql_num_rows($tampilpaket) > 0)
		{
			while ($a=mysql_fetch_assoc($tampilpaket)) 
				$data[]=$a;
			return $data;
		}
		else
		{
			echo"kosong paket";
		}
	}

	
	function simpan_halaman($judul,$isi,$status)
	{

		$query=mysql_query("INSERT INTO halamanstatis(judul,isi,status)VALUES('$judul','$isi','$status')");
		
	}
	function ambil_halaman($idb)
	{
		$ambil=mysql_query("SELECT*FROM halamanstatis WHERE id_hal='$idb'");
		$a=mysql_fetch_assoc($ambil);
		$data[]=$a;
		return $data;
	}
	function ubah_halamanstatis($idb,$judul,$isi,$status)
	{
		if ($gambar['error']==0) 
		{
			$namagambar=$gambar['name'];
			$lokasigambar=$gambar['tmp_name'];
			move_uploaded_file($lokasigambar, "../assets/images/subpackage/$namagambar");
			mysql_query("UPDATE halamanstatis SET judul='$judul',isi='$isi',status='$status' WHERE id_hal='$idb'");
		}

		else
		{
			mysql_query("UPDATE halamanstatis SET judul='$judul',isi='$isi',status='$status' WHERE id_hal='$idb'");
		}
	}
}





//instance class database
$profil=new profil($mysqli);
$pengguna=new pengguna($mysqli);
$gallery=new gallery($mysqli);
$album=new album($mysqli);
$lagu=new lagu($mysqli);
$produk=new produk($mysqli);
$user=new user($mysqli);
$pembelian=new pembelian($mysqli);
$pesan=new pesan($mysqli);
$agenda=new agenda($mysqli);
$tiket=new tiket($mysqli);
$apiongkir=new apiongkir();

?>