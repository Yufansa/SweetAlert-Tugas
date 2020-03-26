<?php 
include "buku.php";
$buku = new buku();
$klik = $_POST['klik'];
$hasil=[];

switch ($klik) {
	case 'get':
		$data = $buku->get();
		echo json_encode($data);
		break;

	case 'delete':
		$idbuku = (isset($_POST['idbuku']))?$_POST['idbuku']:0;
		$res= $buku->delete($idbuku);
		$hasil['status']= $res;
		json_encode($hasil);
		break;
	
	case 'add':
		$res = $buku->add($_POST);

		$hasil['status'] = $res;
        if($res){
            $hasil['messages'] = "Data Berhasil disimpan";
        }
        else{
            $hasil['messages'] = "Gagal Menyimpan Data";
        }
            
        echo json_encode($hasil);
		break;

	case 'update':
		$res = $buku->update($_POST);
		$hasil['status']=$res;
		if ($res) 
            $hasil['messages'] = "Data Berhasil dirubah";
            
        else
            $hasil['messages'] = "Gagal Merubah Data";
           
        echo json_encode($hasil);
		
		break;
}
 ?>