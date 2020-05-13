<?php

use \chriskacerguis\RestServer\RestController;

class WS_ClassController extends WS_MainController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classe');
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

	public function getClass_get($name)
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$clas = $this->classe->getClassByName($name);

		if ($clas == null) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Classe ' . $name . ' no encontrado.'
			);
		} else {
			$httpcode = RestController::HTTP_OK;
			$message = $clas->toArray();
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getClass_options($name)
	{
		parent::setOptions();
	}
}
