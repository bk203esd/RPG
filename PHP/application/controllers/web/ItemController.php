<?php


class ItemController extends CI_Controller
{
	public function __construct()
	{
		// Carrega del controllador
		parent::__construct();

		$this->load->model('item');

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

	public function viewItems()
	{
		$contentData['items'] = $this->item->getItems();

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pages/items', $contentData);
		$this->load->view('templates/footer');
	}

	public function addNewItem()
	{
		// carregar llibreria validador formulari
		$this->load->library('form_validation');

		// parametres de restricció
		$this->form_validation->set_rules('item_name', 'Nombre', 'required');
		$this->form_validation->set_rules('description', 'Descripción', 'required');
		$this->form_validation->set_rules('attack_increase', 'Incremento Ataque', 'required');
		$this->form_validation->set_rules('defense_increase', 'Incremento Defensa', 'required');
		$this->form_validation->set_rules('accuracy_increase', 'Incremento Precisión', 'required');
		$this->form_validation->set_rules('price', 'Precio', 'required');
		$this->form_validation->set_rules('img', 'Imagen', 'required');

		if ($this->form_validation->run() === false) {
			$contentData['items'] = $this->item->getItems();

			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('pages/add_item', $contentData);
			$this->load->view('templates/footer');
		} else {
			// formulari correcte
			$this->race->addNewRace(
				$this->input->post('item_name'),
				$this->input->post('description'),
				$this->input->post('attack_increase'),
				$this->input->post('defense_increase'),
				$this->input->post('accuracy_increase'),
				$this->input->post('price'),
				$this->input->post('img')
			);
			redirect('items');
		}
	}

	public function viewItem($name)
	{
		$contentData['item'] = $this->item->getItemByName($name);

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pages/item', $contentData);
		$this->load->view('templates/footer');
	}
}
