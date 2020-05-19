<?php


class Done extends CI_Model
{
	private $quest_name;
	private $char_name;
	private $user_name;

	public function getQuestName()
	{
		return $this->quest_name;
	}

	public function getCharName()
	{
		return $this->char_name;
	}

	public function getUserName()
	{
		return $this->user_name;
	}

	public function __construct()
	{
		$this->char_name = '';
		$this->user_name = '';
		$this->quest_name = '';

		$this->load->database('rpg');
	}

	public function createDoneFromRawObject($data)
	{
		$done = new Done();

		$done->quest_name = $data->quest_name;
		$done->char_name = $data->char_name;
		$done->user_name = $data->user_name;

		return $done;
	}

	public function getDonesByUserByName($char_name)
	{
		$condition = "char_name = '" . $char_name . "'";
		$this->db->where($condition);
		$query = $this->db->get('done');

		if ($query->num_rows() > 0) {
			$dones = [];
			foreach ($query->result() as $data) {
				$done = $this->createDoneFromRawObject($data);
				array_push($dones, $done);
			}

			return $dones;
		} else return null;
	}

	public function toArray()
	{
		return array(
			'quest_name' => $this->quest_name,
			'user_name' => $this->user_name,
			'char_name' => $this->char_name
		);
	}
}
