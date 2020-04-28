<?php
/**
 * Controlador que s'encarregarà de carragar la pàgina inicial
 */

class HomeController extends CI_Controller
{

	private $cookie;

	public function __construct()
	{
		parent::__construct();

		/** Càrrega de helpers */
		$this->load->helper('url');
		$this->load->helper('cookie');
	}

	/** Funció per carregar les pàgines */
	public function view($page = 'home')
	{
		/** La constant APPPATH conté la ruta fins a la carpeta application*/
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}


		$this->load->view('templates/header');
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}
}
