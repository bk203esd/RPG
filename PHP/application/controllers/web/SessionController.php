<?php


class SessionController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('ion_auth');
	}

	public function login()
	{
		// Carregar llibreria del formulari
		$this->load->library('form_validation');

		$this->form_validation->set_rules('uname', 'Nom d\'usuari', 'required');
		$this->form_validation->set_rules('passwd', 'Contrassenya', 'required');

		if ($this->form_validation->run() === FALSE) {
			// La primera vegada que entro a la pàgina login
			$this->load->view('templates/header');
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		} else {
			// Gestió formulari (ion_auth)
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('uname'), $this->input->post('passwd'), $remember)) {
				// Login true
				redirect('home', 'refresh');
				// Login false
			} else {
				$contentData['error'] = "Les dades inserides no són correctes";

				if ($this->ion_auth->is_max_login_attempts_exceeded($this->input->post('uname'))) {
					$contentData['error'] = "Intents d'inici de sessió superats. Intenti-ho més tard";
				}

				$this->load->view('templates/header');
				$this->load->view('pages/login', $contentData);
				$this->load->view('templates/footer');
			}
		}
	}
}
