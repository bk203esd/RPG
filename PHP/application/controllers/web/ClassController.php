<?php


class ClassController extends CI_Controller
{
	public function __construct()
	{
		// Carrega del controllador
		parent::__construct();

		$this->load->model('classe');

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

	public function viewClasses()
	{
		$contentData['classes'] = $this->classe->getClasses();

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pages/classes', $contentData);
		$this->load->view('templates/footer');
	}

	public function addNewClass()
	{
		// carregar llibreria validador formulari
		$this->load->library('form_validation');

		// parametres de restricció
		$this->form_validation->set_rules('clas_name', 'Nombre', 'required');
		$this->form_validation->set_rules('description', 'Descripción', 'required');
		$this->form_validation->set_rules('multiply_hp', 'Multiplicador HP', 'required');
		$this->form_validation->set_rules('multiply_attack', 'Multiplicador Ataque', 'required');
		$this->form_validation->set_rules('multiply_defense', 'Multiplicador Defensa', 'required');
		$this->form_validation->set_rules('multiply_accuracy', 'Multiplicador Precisió', 'required');

		if ($this->form_validation->run() === false) {
			$contentData['classes'] = $this->classe->getClasses();

			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('pages/add_class', $contentData);
			$this->load->view('templates/footer');
		} else {
			// formulari correcte
			$this->classe->addNewClass(
				$this->input->post('clas_name'),
				$this->input->post('description'),
				$this->input->post('multiply_hp'),
				$this->input->post('multiply_attack'),
				$this->input->post('multiply_defense'),
				$this->input->post('multiply_accuracy')
			);
			redirect('classes');
		}
	}
}
