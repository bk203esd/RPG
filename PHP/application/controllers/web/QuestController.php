<?php


class QuestController extends CI_Controller
{
	public function __construct()
	{
		// Carrega del controllador
		parent::__construct();

		$this->load->model('quest');

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

	public function viewQuests()
	{
		$contentData['quests'] = $this->quest->getQuests();
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/quests', $contentData);
		$this->load->view('templates/footer');
	}

	public function addNewQuest()
	{
		// carregar llibreria validador formulari
		$this->load->library('form_validation');

		// parametres de restricció
		$this->form_validation->set_rules('quest_name', 'Nombre', 'required');
		$this->form_validation->set_rules('description', 'Descripción', 'required');
		$this->form_validation->set_rules('item_reward', 'Item', 'required');
		$this->form_validation->set_rules('quantity_item', 'Quanity', 'required');
		$this->form_validation->set_rules('gold_reward', 'Oro', 'required');
		$this->form_validation->set_rules('xp_reward', 'Experiencia', 'required');
		$this->form_validation->set_rules('repeatable', 'Repetible', 'required');

		if ($this->form_validation->run() === false) {
			$contentData['quests'] = $this->quest->getQuests();
			$headerData['uname'] = $this->session->userdata('username');

			$this->load->view('templates/header', $headerData);
			$this->load->view('templates/menu');
			$this->load->view('pages/add_quest', $contentData);
			$this->load->view('templates/footer');
		} else {
			// formulari correcte
			$this->quest->addNewQuest(
				$this->input->post('quest_name'),
				$this->input->post('description'),
				$this->input->post('item_reward'),
				$this->input->post('quantity_item'),
				$this->input->post('gold_reward'),
				$this->input->post('xp_reward'),
				$this->input->post('repeatable')
			);
			redirect('quests');
		}
	}

	public function viewQuest($name){
		$contentData['quest'] = $this->monster->getQuestByName($name);
		$headerData['uname'] = $this->session->userdata('username');

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/menu');
		$this->load->view('pages/quest', $contentData);
		$this->load->view('templates/footer');
	}
}
