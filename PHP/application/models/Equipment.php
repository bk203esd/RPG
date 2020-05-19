<?php


class Equipment extends CI_Model
{
	private $char_name;
	private $item_name;
	private $user_name;

	public function getCharName()
	{
		return $this->char_name;
	}

	public function getItemName()
	{
		return $this->item_name;
	}

	public function getUserName()
	{
		return $this->user_name;
	}

	public function __construct()
	{
		$this->char_name = '';
		$this->item_name = '';
		$this->user_name = '';

		$this->load->database('rpg');
	}

	public function createEquimentFromRawObject($data)
	{
		$equip = new Equipment();

		$equip->char_name = $data->char_name;
		$equip->item_name = $data->item_name;
		$equip->user_name = $data->user_name;

		return $equip;
	}

	public function getEquipmentByName($char_name)
	{
		$condition = "char_name = '" . $char_name . "'";
		$this->db->where($condition);
		$query = $this->db->get('equipment');

		if ($query->num_rows() > 0) {
			$equipment = [];
			foreach ($query->result() as $data) {
				$equip = $this->createEquimentFromRawObject($data);
				array_push($equipment, $equip);
			}

			return $equipment;
		} else return null;
	}

	public function toArray()
	{
		return array(
			'char_name' => $this->char_name,
			'item_name' => $this->item_name,
			'user_name' => $this->user_name
		);
	}
}
