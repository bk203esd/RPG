<?php


class Item extends CI_Model
{
	private $item_name;
	private $description;
	private $attack_increase;
	private $defense_increase;
	private $accuracy_increase;
	private $price;

	public function getItemName()
	{
		return $this->item_name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getAttackIncrease()
	{
		return $this->attack_increase;
	}

	public function getDefenseIncrease()
	{
		return $this->defense_increase;
	}

	public function getAccuracyIncrease()
	{
		return $this->accuracy_increase;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function __construct()
	{
		$this->item_name = '';
		$this->description = '';
		$this->attack_increase = '';
		$this->defense_increase = '';
		$this->accuracy_increase = '';
		$this->price = '';

		// Càrrega i obertura de la BBD
		$this->load->database('rpg');
	}

	public function createItemFromRawObject($data)
	{
		$item = new Item();

		$item->item_name = $data->item_name;
		$item->description = $data->description;
		$item->attack_increase = $data->attack_increase;
		$item->defense_increase = $data->defense_increase;
		$item->accuracy_increase = $data->accuracy_increase;
		$item->price = $data->price;

		return $item;
	}

	public function getItems()
	{
		// SELECT * FROM Items;
		$query = $this->db->get('items');
		$items = [];

		// Generar a partir del resultat de la query, una array de tipus Item
		foreach ($query->result() as $data) {
			$item = $this->createItemFromRawObject($data);
			array_push($items, $item);
		}

		return $items;
	}

	public function getItemByName($name)
	{
		// Generar query amb la condició del nom
		$condition = "UPPER(item_name) = UPPER('" . $name . "')";
		$this->db->where($condition);
		$query = $this->db->get('items');

		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createItemFromRawObject($query->result()[0]);
	}

	public function addNewItem($item_name, $description, $attack_increase, $defense_increase, $accuracy_increase, $price)
	{
		// Creació array de Item
		$data = array(
			'clas_name' => $item_name,
			'description' => $description,
			'attack_increase' => $attack_increase,
			'defense_increase' => $defense_increase,
			'accuracy_increase' => $accuracy_increase,
			'price' => $price,
		);

		// Insertar a la BBDD
		$this->db->insert('items', $data);
	}

	public function toArray()
	{
		return array(
			'item_name' => $this->item_name,
			'description' => $this->description,
			'attack_increase' => $this->attack_increase,
			'defense_increase' => $this->defense_increase,
			'accuracy_increase' => $this->accuracy_increase,
			'price' => $this->price
		);
	}
}
