<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Food_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['makanan']=$this->Food_model->get_makanan();
		$data['minuman']=$this->Food_model->get_minuman();
		$this->load->view('user/index', $data);
	}

	public function insert_pesanan()
	{
		$NAMA_PELANGGAN = $this->input->post('NAMA_PELANGGAN');
		$NO_HP_PELANGGAN = $this->input->post('NO_HP_PELANGGAN');		
		$TANGGAL_PEMBELIAN = $this->input->post('TANGGAL_PEMBELIAN');
		$ALAMAT_PELANGGAN = $this->input->post('ALAMAT_PELANGGAN');
		$ID_MAKANAN = $this->input->post('ID_MAKANAN');
		$JUMBEL_MAKANAN = $this->input->post('JUMBEL_MAKANAN');
		$ID_MINUMAN = $this->input->post('ID_MINUMAN');
		$JUMBEL_MINUMAN = $this->input->post('JUMBEL_MINUMAN');

		$this->Food_model->sp_insert_pesanan($NAMA_PELANGGAN,$NO_HP_PELANGGAN,$TANGGAL_PEMBELIAN,$ALAMAT_PELANGGAN,$ID_MAKANAN,$JUMBEL_MAKANAN,$ID_MINUMAN,$JUMBEL_MINUMAN);
	}

	public function checkout()
	{
		$this->load->view('user/checkout');
	}
	
	// public function add_pesanan()
	// {
	// 	$NAMA_PELANGGAN = $this->input->post('NAMA_PELANGGAN');
	// 	$NO_HP_PELANGGAN = $this->input->post('NO_HP_PELANGGAN');		
	// 	$TANGGAL_PEMBELIAN = $this->input->post('TANGGAL_PEMBELIAN');
	// 	$ALAMAT_PELANGGAN = $this->input->post('ALAMAT_PELANGGAN');
	// 	$ID_MAKANAN = $this->input->post('ID_MAKANAN');
	// 	$JUMBEL_MAKANAN = $this->input->post('JUMBEL_MAKANAN');
	// 	$ID_MINUMAN = $this->input->post('ID_MINUMAN');
	// 	$JUMBEL_MINUMAN = $this->input->post('JUMBEL_MINUMAN');

	// 	$this->Food_model->action_addpesanan($NAMA_PELANGGAN,$NO_HP_PELANGGAN,$TANGGAL_PEMBELIAN,$ALAMAT_PELANGGAN,$ID_MAKANAN,$JUMBEL_MAKANAN,$ID_MINUMAN,$JUMBEL_MINUMAN);

	// 	redirect('user/checkout');
		
	// }
	
}
