<?php

use \chriskacerguis\RestServer\RestController;

class WS_CharacterController extends WS_MainController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('classe');
		$this->load->model('race');
	}

	public function getClasses_get()
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$classes = $this->classe->getClasses();

		if (count($classes) == 0) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Classes no encontradas.'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			foreach ($classes as $clas) {
				array_push($message, $clas->toArray());
			}
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getClasses_options()
	{
		parent::setOptions();
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

	public function getRaces_options()
	{
		parent::setOptions();
	}

	public function createCharacter_post(){

	}
}
