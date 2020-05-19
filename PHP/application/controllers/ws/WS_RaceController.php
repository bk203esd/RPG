<?php

use \chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'controllers/ws/WS_MainController.php');

class WS_RaceController extends WS_MainController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('race');
	}

	public function getRaces_get()
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$races = $this->race->getRaces();

		if (count($races) == 0) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Razas no encontradas.'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			foreach ($races as $race) {
				array_push($message, $race->toArray());
			}
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getRaces_options(){
		parent::setOptions();
	}
}
