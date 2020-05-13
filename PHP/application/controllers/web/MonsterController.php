<?php


class MonsterController extends CI_Controller
{
	public function __construct()
	{
		// Carrega del controllador
		parent::__construct();

		$this->load->model('monster');

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

	public function viewMonsters()
	{
		$contentData['monsters'] = $this->monster->getMonsters();
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/monsters', $contentData);
		$this->load->view('templates/footer');
	}

	public function addNewMonster()
	{
		// carregar llibreria validador formulari
		$this->load->library('form_validation');

		// parametres de restricció
		$this->form_validation->set_rules('monster_name', 'Nombre', 'required');
		$this->form_validation->set_rules('description', 'Descripción', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		$this->form_validation->set_rules('attack', 'Ataque', 'required');
		$this->form_validation->set_rules('defense', 'Defensa', 'required');
		$this->form_validation->set_rules('accuracy', 'Precisión', 'required');
		$this->form_validation->set_rules('gold', 'Oro', 'required');
		$this->form_validation->set_rules('xp_give', 'Experiencia', 'required');

		if ($this->form_validation->run() === false) {
			$contentData['monsters'] = $this->monster->getMonsters();
			$headerData['uname'] = $this->session->userdata('username');

			$this->load->view('templates/header', $headerData);
			$this->load->view('templates/menu');
			$this->load->view('pages/add_monster', $contentData);
			$this->load->view('templates/footer');
		} else {
			// formulari correcte
			$this->monster->addNewMonster(
				$this->input->post('monster_name'),
				$this->input->post('description'),
				$this->input->post('hp'),
				$this->input->post('attack'),
				$this->input->post('defense'),
				$this->input->post('accuracy'),
				$this->input->post('gold'),
				$this->input->post('xp_given')
			);
			redirect('monsters');
		}
	}

	public function viewMonster($name){
		$contentData['monster'] = $this->monster->getMonsterByName($name);
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/monster', $contentData);
		$this->load->view('templates/footer');
	}
}
