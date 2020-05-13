<?php
/**
 * Controlador que s'encarregarà de carragar la pàgina inicial
 */

class HomeController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		/** Càrrega de helpers */
		$this->load->helper('url');

		$this->load->library('ion_auth');

		if ($this->ion_auth->logged_in()) {
			// session_start() -> accés $_SESSION
			$this->load->library('session');
		} else {
			// redirecció al login
			redirect('login', 'refresh');
		}
	}

	/** Funció per carregar les pàgines */
	public function view($page = 'home')
	{
		/** La constant APPPATH conté la ruta fins a la carpeta application*/
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('pages/home');
		$this->load->view('pages/BigMenu');
		$this->load->view('templates/footer');
	}
}
