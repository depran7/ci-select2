<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$nrp = $this->input->get('nrp');
		$this->load->model('Mhs_model', 'mhs');
		$data['mhs'] = $this->mhs->getMhs($nrp);
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET");
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}
