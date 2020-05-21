<?php

use \chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'controllers/ws/WS_MainController.php');

class WS_CharacterController extends WS_MainController
{
	public function __construct($config = 'rest')
	{
		parent::__construct($config);

		$this->load->model('character');
		$this->load->model('user');
	}

	public function getCharacters_get()
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}

		$user = $this->user->getUserEmail($msg);

		if ($user == null || $user->getEmail() != $msg) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Correu ' . $msg . ' no trobat'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			$characters = $this->character->getCharactersByUser($user->getUserName());
			foreach ($characters as $character) {
				array_push($message, $character->toArray());
			}
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getCharacters_options()
	{
		parent::setOptions();
	}

	public function getCharacter_get($char_name)
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}
		$character = $this->character->getCharacterByName($char_name);
		if ($character == null) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Character ' . $msg . ' no encontrado.'
			);
		} else {
			$httpcode = RestController::HTTP_OK;
			$message = $character->toArray();
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getCharacter_options($char_name)
	{
		parent::setOptions();
	}
}
