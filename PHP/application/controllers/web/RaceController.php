<?php


class RaceController extends CI_Controller
{
	public function __construct()
	{
		// Carrega del controllador
		parent::__construct();

		$this->load->model('race');

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

	public function viewRaces()
	{
		$contentData['races'] = $this->race->getRaces();
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/races', $contentData);
		$this->load->view('templates/footer');
	}

	public function addNewRace()
	{
		// carregar llibreria validador formulari
		$this->load->library('form_validation');

		// parametres de restricció
		$this->form_validation->set_rules('race_name', 'Nombre', 'required');
		$this->form_validation->set_rules('description', 'Descripción', 'required');
		$this->form_validation->set_rules('multiply_hp', 'Multiplicador HP', 'required');
		$this->form_validation->set_rules('multiply_attack', 'Multiplicador Ataque', 'required');
		$this->form_validation->set_rules('multiply_defense', 'Multiplicador Defensa', 'required');
		$this->form_validation->set_rules('multiply_accuracy', 'Multiplicador Precisió', 'required');

		if ($this->form_validation->run() === false) {
			$contentData['races'] = $this->race->getRaces();
			$headerData['uname'] = $this->session->userdata('username');

			$this->load->view('templates/header', $headerData);
			$this->load->view('templates/menu');
			$this->load->view('pages/add_race', $contentData);
			$this->load->view('templates/footer');
		} else {
			// formulari correcte
			$this->race->addNewRace(
				$this->input->post('race_name'),
				$this->input->post('description'),
				$this->input->post('multiply_hp'),
				$this->input->post('multiply_attack'),
				$this->input->post('multiply_defense'),
				$this->input->post('multiply_accuracy')
			);
			redirect('races');
		}
	}

	public function viewRace($name)
	{
		$contentData['race'] = $this->race->getRaceByName($name);
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/race', $contentData);
		$this->load->view('templates/footer');
	}
}
