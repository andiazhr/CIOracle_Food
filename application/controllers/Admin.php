<?php

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->model('Food_model');
		$this->load->helper('url_helper');
	}
	
	public function koneksi()
	{
		$this->load->view('admin/koneksi');
	}

	public function index()
	{
		$data['stok_makanan']=$this->Food_model->get_stok_makanan();
		$data['stok_minuman']=$this->Food_model->get_stok_minuman();
		$data['total_pendapatan']=$this->Food_model->get_total_pendapatan();
		$this->load->view('admin/index', $data);
	}
	
	public function makanan()
	{
		$data['makanan']=$this->Food_model->get_makanan_list();
		$data['stok_makanan']=$this->Food_model->get_stok_makanan();
		$this->load->view('admin/makanan', $data);
	}
	
	public function minuman()
	{
		$data['minuman']=$this->Food_model->get_minuman_list();
		$data['stok_minuman']=$this->Food_model->get_stok_minuman();
		$this->load->view('admin/minuman',$data);
	}
	
	public function pesanan()
	{
		$data['pesanan']=$this->Food_model->get_pesanan();
		$data['total_pendapatan']=$this->Food_model->get_total_pendapatan();
		$this->load->view('admin/pesanan',$data);
	}

	//add data
	public function addmakanan()
	{
		$this->load->view('admin/addmakanan');
	}
	
	public function add_makanan()
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
			'NAMA_MAKANAN' => $this->input->post('NAMA_MAKANAN'),
			'TOPPING' => $this->input->post('TOPPING'),
			'GAMBAR_MAKANAN' => $GAMBAR_MAKANAN,
			'ICON_MK' => $ICON_MK,
			'DESKRIPSI_MAKANAN' => $this->input->post('DESKRIPSI_MAKANAN'),
			'HARGA_MAKANAN' => $this->input->post('HARGA_MAKANAN'),
			'STOK_MAKANAN' => $this->input->post('STOK_MAKANAN')
		);

		$this->Food_model->action_addmakanan($data);

		$this->load->view('admin/addmakanan');
		redirect('admin/makanan');
		
	}
	
	public function addminuman()
	{
		$this->load->view('admin/addminuman');

	}
	
	public function add_minuman()
	{
		$NAMA_MINUMAN = $this->input->post('NAMA_MINUMAN');
		$GAMBAR_MINUMAN = $this->input->post('GAMBAR_MINUMAN');		
		$GAMBAR_TOPPING_MM = $this->input->post('GAMBAR_TOPPING_MM');
		$DESKRIPSI_MINUMAN = $this->input->post('DESKRIPSI_MINUMAN');
		$HARGA_MINUMAN = $this->input->post('HARGA_MINUMAN');
		$STOK_MINUMAN = $this->input->post('STOK_MINUMAN');

		$this->Food_model->action_addminuman($NAMA_MINUMAN,$GAMBAR_MINUMAN,$GAMBAR_TOPPING_MM,$DESKRIPSI_MINUMAN,$HARGA_MINUMAN,$STOK_MINUMAN);

		$this->load->view('admin/addminuman');
		redirect('admin/minuman');
		
	}
	
	//update data
	public function updatemakanan($ID_MAKANAN)
	{
		if($this->input->post('submit')) {
				$this->Food_model->action_updatemakanan($ID_MAKANAN);
				redirect('admin/makanan');
			}
		$data['makanan'] = $this->Food_model->getmakanan_by_id($ID_MAKANAN);
		$this->load->view('admin/updatemakanan', $data);
	}
	
	public function updateminuman($ID_MINUMAN)
	{
		if($this->input->post('submit')) {
				$this->Food_model->action_updateminuman($ID_MINUMAN);
				redirect('admin/minuman');
			}
		$data['minuman'] = $this->Food_model->getminuman_by_id($ID_MINUMAN);
		$this->load->view('admin/updateminuman', $data);
	}
	
	//read data
	public function readmakanan($ID_MAKANAN)
	{
		$data['makanan'] = $this->Food_model->getmakanan_by_id($ID_MAKANAN);
		$this->load->view('admin/readmakanan', $data);
	}
	
	public function readminuman($ID_MINUMAN)
	{
		$data['minuman'] = $this->Food_model->getminuman_by_id($ID_MINUMAN);
		$this->load->view('admin/readminuman', $data);
	}
	
	public function readpesanan($ID_PESANAN)
	{
		$data['makanan'] = $this->Food_model->getmakanan_by_id($ID_PESANAN);
		$data['minuman'] = $this->Food_model->getminuman_by_id($ID_PESANAN);
		$data['pesanan'] = $this->Food_model->getpesanan_by_id($ID_PESANAN);
		$this->load->view('admin/readpesanan', $data);
	}
	
	//menghapus data
	public function deletemakanan($ID_MAKANAN = NULL)
	{
		$this->Food_model->action_deletemakanan($ID_MAKANAN);
		redirect('admin/makanan', 'refresh');
	}

	public function deleteminuman($ID_MINUMAN = NULL)
	{
		$this->Food_model->action_deleteminuman($ID_MINUMAN);
		redirect('admin/minuman', 'refresh');
	}

	public function deletetransaksi($id_transaksi = NULL)
	{
		$this->Food_model->action_deletetransaksi($id_transaksi);
		redirect('admin/transaksi', 'refresh');
	}
	
	public function deletepesanan($ID_PESANAN = NULL)
	{
		$this->Food_model->action_deletepesanan($ID_PESANAN);
		redirect('admin/pesanan', 'refresh');
	}
}
