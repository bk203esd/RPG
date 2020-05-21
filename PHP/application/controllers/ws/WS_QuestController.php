<?php

use \chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'controllers/ws/WS_MainController.php');

class WS_QuestController extends WS_MainController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('quest');
		$this->load->model('done');
	}

	public function getQuests_get()
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}

		$quests = $this->quest->getQuests();
		if (count($quests) == 0) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Quest no encontradas.'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			foreach ($quests as $quest) {
				array_push($message, $quest->toArray());
			}
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getQuests_options()
	{
		parent::setOptions();
	}

	public function getQuest_get($quest_name)
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}

		$quest = $this->quest->getQuestByName($quest_name);

		if ($quest == null) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'Character ' . $msg . ' no encontrado.'
			);
		} else {
			$httpcode = RestController::HTTP_OK;
			$message = $quest->toArray();
		}

		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getQuest_options($quest_name)
	{
		parent::setOptions();
	}

	public function getQuestsDoneByName_get($char_name)
	{
		list($msg, $code) = $this->checkAuthorization();

		if ($code !== true) {
			parent::setHeaders();
			$this->response($msg, $code);
			return;
		}

			$qDones = $this->done->getDonesByUserByName($char_name);

		if (count($qDones) == 0) {
			$httpcode = RestController::HTTP_NOT_FOUND;
			$message = array(
				'msg' => 'No hay misiones hechas per el personaje ' . $char_name . '.'
			);
		} else {
			$message = [];
			$httpcode = RestController::HTTP_OK;
			foreach ($qDones as $qDone) {
				array_push($message, $qDone->toArray());
			}
		}
		parent::setHeaders();
		$this->response($message, $httpcode);
	}

	public function getQuestsDoneByName_options($char_name)
	{
		parent::setOptions();
	}
}
