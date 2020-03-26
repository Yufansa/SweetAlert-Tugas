<?php 
include '../database.php';
class buku
{
	private $connect;
	private $table;
	private $primary;
	private $fields;

	public function __construct()
	{
		$db = new database();
		$this->connect=$db->connect();
		$this->table ='buku';
		$this->primary='idbuku';
		$this->fields =['idbuku','judul','pengarang','penerbit','sinopsis','gambar'];
	} 

	public function get(){
		$query="SELECT * FROM ".$this->table;
		$result=mysqli_query($this->connect,$query);
		$data=[];
		while($row=mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}

	public function delete($idbuku){
		$query= "DELETE FROM ".$this->table;
		$query.=" WHERE idbuku='".$idbuku."'";
		
		$res=mysqli_query($this->connect,$query);
		return $res;
	}

	public function add($data){
		$minta=json_decode(json_encode($data));
		$query= "INSERT INTO buku";
		$query .=" VALUES ('".$minta->idbuku."','".$minta->judul."','".$minta->pengarang."','".$minta->penerbit."','".$minta->sinopsis."','".$minta->gambar."')";
		$res=mysqli_query($this->connect,$query);
		return $res;
	}

	public function update($data){
		$minta= json_decode(json_encode($data));
		$query  = "UPDATE buku SET ";
		$filter = " WHERE ";
		foreach($minta as $key=>$row){

			if(in_array($key,$this->fields)){
				$query .="`".$key."`='".$row."',"; 
			}

			if($key ==$this->primary){ 
				$filter .="`".$key."`=".$row;
			}
		}
		$query_sambung = rtrim($query,",").$filter;

		$res = mysqli_query($this->connect, $query_sambung);	
		return $res;
	
}
}
?>

