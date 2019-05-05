<?php
class Food_model extends CI_Model{

	function __Construct()
	{
		parent::__Construct();
	}

	//user
	function get_makanan()
	{
		$this->db->select('*');
		$this->db->from('MAKANAN');
		$this->db->order_by("ID_MAKANAN", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function get_minuman()
	{
		$this->db->select('*');
		$this->db->from('MINUMAN');
		$this->db->order_by("ID_MINUMAN", "ASC");
		$query = $this->db->get();
		return $query;
	}

	//list
	function get_makanan_list()
	{
		$this->db->select('*');
		$this->db->from('MAKANAN');
		$this->db->order_by("ID_MAKANAN", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_minuman_list()
	{
		$this->db->select('*');
		$this->db->from('MINUMAN');
		$this->db->order_by("ID_MINUMAN", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function get_pesanan()
	{
		$this->db->select('*');    
		$this->db->from('PESANAN');
		$this->db->join('MAKANAN', 'PESANAN.ID_MAKANAN = MAKANAN.ID_MAKANAN');
		$this->db->join('MINUMAN', 'PESANAN.ID_MINUMAN = MINUMAN.ID_MINUMAN');
		$this->db->order_by("ID_PESANAN", "ASC");
		$query = $this->db->get();
		return $query;
	}

	function sp_insert_pesanan($NAMA_PELANGGAN,$NO_HP_PELANGGAN,$TANGGAL_PEMBELIAN,$ALAMAT_PELANGGAN,$ID_MAKANAN,$JUMBEL_MAKANAN,$ID_MINUMAN,$JUMBEL_MINUMAN)
	{
		$db = "(DESCRIPTION=(ADDRESS_LIST = ( ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID = Azhr)))";
		$c = OCILogon("ITSFOOD", "ASUS", $db);
		$hasil;
		$sql = 'BEGIN INSERT_PESANAN(:NAMA_PELANGGAN, :NO_HP_PELANGGAN, :TANGGAL_PEMBELIAN, :ALAMAT_PELANGGAN, :ID_MAKANAN,
		:JUMBEL_MAKANAN, :ID_MINUMAN,  :JUMBEL_MINUMAN); END;';
		$result = oci_parse($c, $sql);
		oci_bind_by_name($result, 'NAMA_PELANGGAN', $NAMA_PELANGGAN);
		oci_bind_by_name($result, 'NO_HP_PELANGGAN', $NO_HP_PELANGGAN);
		oci_bind_by_name($result, 'TANGGAL_PEMBELIAN', $TANGGAL_PEMBELIAN);
		oci_bind_by_name($result, 'ALAMAT_PELANGGAN', $ALAMAT_PELANGGAN);
		oci_bind_by_name($result, 'ID_MAKANAN', $ID_MAKANAN);
		oci_bind_by_name($result, 'JUMBEL_MAKANAN', $JUMBEL_MAKANAN);
		oci_bind_by_name($result, 'ID_MINUMAN', $ID_MINUMAN);
		oci_bind_by_name($result, 'JUMBEL_MINUMAN', $JUMBEL_MINUMAN);
		oci_execute($result);
		redirect('user/checkout');
	}

	function get_stok_makanan()
	{
		$db = "(DESCRIPTION=(ADDRESS_LIST = ( ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID = Azhr)))";
		$c = OCILogon("ITSFOOD", "ASUS", $db);
		$hasil;
		$sql = 'SELECT GET_STOK_MAKANAN() as TOTAL FROM DUAL';
		$result = oci_parse($c, $sql);
		oci_execute($result);
		while($row = oci_fetch_array($result)){
			$hasil = $row['TOTAL'];
		}
		return $hasil;
	}

	function get_stok_minuman()
	{
		$db = "(DESCRIPTION=(ADDRESS_LIST = ( ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID = Azhr)))";
		$c = OCILogon("ITSFOOD", "ASUS", $db);
		$hasil;
		$sql = 'SELECT GET_STOK_MINUMAN() as TOTAL FROM DUAL';
		$result = oci_parse($c, $sql);
		oci_execute($result);
		while($row = oci_fetch_array($result)){
			$hasil = $row['TOTAL'];
		}
		return $hasil;
	}

	function get_total_pendapatan()
	{
		$db = "(DESCRIPTION=(ADDRESS_LIST = ( ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID = Azhr)))";
		$c = OCILogon("ITSFOOD", "ASUS", $db);
		$hasil;
		$sql = 'SELECT GET_TOTAL_PENDAPATAN() as TOTAL FROM DUAL';
		$result = oci_parse($c, $sql);
		oci_execute($result);
		while($row = oci_fetch_array($result)){
			$hasil = $row['TOTAL'];
		}
		return $hasil;
	}

	//menambah data
	public function action_addmakanan($data)
	{
		$this->db->insert('MAKANAN', $data);
	}

	public function action_addminuman($NAMA_MINUMAN,$GAMBAR_MINUMAN,$GAMBAR_TOPPING_MM,$DESKRIPSI_MINUMAN,$HARGA_MINUMAN,$STOK_MINUMAN)
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('GAMBAR_MINUMAN')){
			$GAMBAR_MINUMAN="";

			$error = $this->upload->display_errors();
		}
		else {
			$GAMBAR_MINUMAN = $this->upload->file_name;
		}

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('GAMBAR_TOPPING_MM')){
			$GAMBAR_TOPPING_MM="";

			$error = $this->upload->display_errors();
		}
		else {
			$GAMBAR_TOPPING_MM = $this->upload->file_name;
		}

		$data = array(
			'NAMA_MINUMAN' => $NAMA_MINUMAN,
			'GAMBAR_MINUMAN' => $GAMBAR_MINUMAN,
			'GAMBAR_TOPPING_MM' => $GAMBAR_TOPPING_MM,
			'DESKRIPSI_MINUMAN' => $DESKRIPSI_MINUMAN,
			'HARGA_MINUMAN' => $HARGA_MINUMAN,
			'STOK_MINUMAN' =>$STOK_MINUMAN
		);

		$this->db->insert('MINUMAN', $data);
	}

	public function action_addpesanan($NAMA_PELANGGAN,$NO_HP_PELANGGAN,$TANGGAL_PEMBELIAN,$ALAMAT_PELANGGAN,$ID_MAKANAN,$JUMBEL_MAKANAN,$ID_MINUMAN,$JUMBEL_MINUMAN)
	{
		$data = array(
			'NAMA_PELANGGAN' => $NAMA_PELANGGAN,
			'NO_HP_PELANGGAN' => $NO_HP_PELANGGAN,
			'TANGGAL_PEMBELIAN' => $TANGGAL_PEMBELIAN,
			'ALAMAT_PELANGGAN' => $ALAMAT_PELANGGAN,
			'ID_MAKANAN' => $ID_MAKANAN,
			'JUMBEL_MAKANAN' => $JUMBEL_MAKANAN,
			'ID_MINUMAN' => $ID_MINUMAN,
			'JUMBEL_MINUMAN' => $JUMBEL_MINUMAN
		);

		$this->db->insert('PESANAN', $data);
	}

	//mengubah data
	public function getmakanan_by_id($ID_MAKANAN)
	{
		return $this->db->get_where('MAKANAN', array('ID_MAKANAN' => $ID_MAKANAN))->row();
	}

	public function getminuman_by_id($ID_MINUMAN)
	{
		return $this->db->get_where('MINUMAN', array('ID_MINUMAN' => $ID_MINUMAN))->row();
	}
	
	public function getpesanan_by_id($ID_PESANAN)
	{
		return $this->db->get_where('PESANAN', array('ID_PESANAN' => $ID_PESANAN))->row();
	}

	public function action_updatemakanan($ID_MAKANAN)
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('GAMBAR_MAKANAN')){
			$GAMBAR_MAKANAN="";

			$error = $this->upload->display_errors();
		}
		else {
			$GAMBAR_MAKANAN = $this->upload->file_name;
		}

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('ICON_MK')){
			$ICON_MK="";

			$error = $this->upload->display_errors();
		}
		else {
			$ICON_MK = $this->upload->file_name;
		}

		$data = array(
				'ID_MAKANAN' => $ID_MAKANAN,
				'NAMA_MAKANAN' => $this->input->post('NAMA_MAKANAN'),
				'TOPPING' => $this->input->post('TOPPING'),
				'GAMBAR_MAKANAN' => $GAMBAR_MAKANAN,
				'ICON_MK' => $ICON_MK,
				'DESKRIPSI_MAKANAN' => $this->input->post('DESKRIPSI_MAKANAN'),
				'HARGA_MAKANAN' => $this->input->post('HARGA_MAKANAN'),
				'STOK_MAKANAN' => $this->input->post('STOK_MAKANAN')
				);
				
			$this->db->where('ID_MAKANAN', $ID_MAKANAN);
			$this->db->update('MAKANAN', $data);
	}

	public function action_updateminuman($ID_MINUMAN)
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('GAMBAR_MINUMAN')){
			$GAMBAR_MINUMAN="";

			$error = $this->upload->display_errors();
		}
		else {
			$GAMBAR_MINUMAN = $this->upload->file_name;
		}

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']= '2000';
		$config['max_width']= '10000';
		$config['overwrite']= true;
		$config['max_height']= '10000';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('GAMBAR_TOPPING_MM')){
			$GAMBAR_TOPPING_MM="";

			$error = $this->upload->display_errors();
		}
		else {
			$GAMBAR_TOPPING_MM = $this->upload->file_name;
		}

		$data = array(
				'ID_MINUMAN' => $ID_MINUMAN,
				'NAMA_MINUMAN' => $this->input->post('NAMA_MINUMAN'),
				'GAMBAR_MINUMAN' => $GAMBAR_MINUMAN,
				'GAMBAR_TOPPING_MM' => $GAMBAR_TOPPING_MM,
				'DESKRIPSI_MINUMAN' => $this->input->post('DESKRIPSI_MINUMAN'),
				'HARGA_MINUMAN' => $this->input->post('HARGA_MINUMAN'),
				'STOK_MINUMAN' => $this->input->post('STOK_MINUMAN')
				);
				
			$this->db->where('ID_MINUMAN', $ID_MINUMAN);
			$this->db->update('MINUMAN', $data);
	}

	//menghapus data
	public function action_deletemakanan($ID_MAKANAN)
	{
		$this->db->where('ID_MAKANAN', $ID_MAKANAN);
		$this->db->delete('MAKANAN');
	}

	public function action_deleteminuman($ID_MINUMAN)
	{
		$this->db->where('ID_MINUMAN', $ID_MINUMAN);
		$this->db->delete('MINUMAN');
	}

	public function action_deletepesanan($ID_PESANAN)
	{
		$this->db->where('ID_PESANAN', $ID_PESANAN);
		$this->db->delete('PESANAN');
	}
}