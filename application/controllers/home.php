<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('array');
	}

	public function index(){
		$this->load->view('index-view');
	}

	public function ajax_get_produtos(){

		$result = $this->db->get('produto')->result();

		$data = array();
		$contador = 0;

		foreach ($result as $item) {
			$data[$contador]['id'] = $item->id;
			$data[$contador]['descricao'] = $item->descricao;
			$data[$contador]['preco'] = $item->valor;
			$data[$contador]['dtVencimento'] = $item->dtVencimento;
			$contador++;
		}

		sleep(2);

		echo json_encode($data);
	}

	public function ajax_set_produtos(){

		$data = array(
			'descricao' => $this->input->post('descricao'),
			'valor' => $this->input->post('preco'));

		/*Convert Data format BD*/
		$rData = implode("-", array_reverse(explode("/", trim($this->input->post('dtVencimento')))));
		$data['dtVencimento'] = $rData;

		sleep(3);

		$result = $this->db->insert('produto', $data);
		echo json_encode($result);
	}

	public function ajax_exclude_produtos(){

		$ID = $this->input->post('id');

		sleep(3);

		$result = $this->db->where('id', $ID)->delete('produto');
		echo json_encode($result);
	}
}