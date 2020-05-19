<?php

use \chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'controllers/ws/WS_MainController.php');

class WS_ItemController extends WS_MainController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item');
	}

	public function getItems_get()
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$items = $this->item->getItems();

		if (count($items) == 0) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Items no encontrados.'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			foreach ($items as $item) {
				array_push($message, $item->toArray());
			}

			parent::setHeaders();
			$this->response($message, $httpcode);
		}
	}

	public function getItems_options()
	{
		parent::setOptions();
	}

	public function getItem_get($name)
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$item = $this->item->getItemByName($name);

		if ($item == null) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Item ' . $name . ' no encontrado.'
			);
		} else {
			$httpcode = RestController::HTTP_OK;

			parent::setHeaders();
			$this->response($item->toArray(), $httpcode);
		}
	}

	public function getItem_options($name)
	{
		parent::setOptions();
	}
}
