<?php
define('document_root', $_SERVER['DOCUMENT_ROOT']."/oop");


include(document_root."/config/Config.php");
class Crud{
	protected $nama,$alamat,$id,$koneksi;
	function __construct(){
		$obj = new Config();
		$this->koneksi = $obj->Koneksi();
	}

	function insert($nama,$alamat){
		$this->nama 	= $nama;
		$this->alamat	= $alamat;
		$statement = $this->koneksi->prepare("INSERT INTO orang (nama,alamat) VALUES (:nama,:alamat)");
		$statement->bindParam(':nama',$nama);
		$statement->bindParam(':alamat',$alamat);
		$act = $statement->execute();
		if($act === TRUE){
			return $act;
		}
		else{
			return FALSE;
		}
	}

	function update($nama,$alamat,$id){
		$this->nama 	= $nama;
		$this->alamat	= $alamat;
		$this->id 		= $id;
		$statement = $this->koneksi->prepare("UPDATE orang SET nama=:nama,alamat=:alamat WHERE id=:id");
		$statement->bindParam(':nama',$nama);
		$statement->bindParam(':alamat',$alamat);
		$statement->bindParam(':id',$id);
		$act = $statement->execute();
		if($act === TRUE){
			echo "data berhasil di update";
		}
		else{
			echo "data gagal di update";
		}
	}

	function delete($id){
		$this->id 	= $id;
		$statement 	= $this->koneksi->prepare("DELETE FROM orang WHERE id=:id");
		$statement->bindParam(':id',$id);
		$act = $statement->execute();
		if($act === TRUE){
			echo "data berhasil di hapus";
		}
		else{
			echo "data gagal di hapus";
		}
	}

	function selectAll(){
		$statement 	= $this->koneksi->prepare("SELECT * FROM orang");
		$act 		= $statement->execute();
		return $statement->fetchAll();
	}

	function selectWhere($id){
		$statement 	= $this->koneksi->prepare("SELECT * FROM orang WHERE id=:id");
		$statement->bindParam(':id',$id);
		$act 		= $statement->execute();
		return $statement->fetchAll();
	}

}