<?php


class Inventory extends CI_Model
{
	private $quantity;
	private $char_name;
	private $item_name;
	private $user_name;

	public function getQuantity()
	{
		return $this->quantity;
	}

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
		$this->quantity = '';
		$this->char_name = '';
		$this->item_name = '';
		$this->user_name = '';

		$this->load->database('rpg');
	}

	public function createInventoryFromRawObject($data)
	{
		$inventory = new Inventory();

		$inventory->quantity = $data->quantity;
		$inventory->char_name = $data->char_name;
		$inventory->item_name = $data->item_name;
		$inventory->user_name = $data->user_name;

		return $inventory;
	}

	public function getInventoryByName($char_name)
	{
		$condition = "char_name = '" . $char_name . "'";
		$this->db->where($condition);
		$query = $this->db->get('done');

		if ($query->num_rows() > 0) {
			$inventories = [];
			foreach ($query->result() as $data) {
				$inventory = $this->createInventoryFromRawObject($data);
				array_push($inventories, $inventory);
			}

			return $inventories;
		} else return null;
	}

	public function toArray()
	{
		return array(
			'quantity' => $this->quantity,
			'char_name' => $this->char_name,
			'item_name' => $this->item_name,
			'user_name' => $this->user_name
		);
	}
}
