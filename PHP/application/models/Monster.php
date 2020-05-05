<?php


class Monster extends CI_Model
{
	private $monster_name;
	private $description;
	private $hp;
	private $attack;
	private $defense;
	private $accuracy;
	private $gold;
	private $xp_give;

	public function getMonsterName()
	{
		return $this->monster_name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getHp()
	{
		return $this->hp;
	}

	public function getAttack()
	{
		return $this->attack;
	}

	public function getDefense()
	{
		return $this->defense;
	}

	public function getAccuracy()
	{
		return $this->accuracy;
	}

	public function getGold()
	{
		return $this->gold;
	}

	public function getXpGive()
	{
		return $this->xp_give;
	}

	public function __construct()
	{
		$this->monster_name = '';
		$this->description = '';
		$this->hp = '';
		$this->attack = '';
		$this->defense = '';
		$this->accuracy = '';
		$this->gold = '';
		$this->xp_give = '';

		// Càrrega i obertura de la BBDD
		$this->load->database('rpg');
	}

	public function createMonsterFromRawObject($data)
	{
		$monster = new Monster();

		$monster->monster_name = $data->monster_name;
		$monster->description = $data->description;
		$monster->hp = $data->hp;
		$monster->attack = $data->attack;
		$monster->defense = $data->defense;
		$monster->accuracy = $data->accuracy;
		$monster->gold = $data->gold;
		$monster->xp_give = $data->xp_give;

		return $monster;
	}

	public function getMonsters()
	{
		// SELECT * FROM Monsters;
		$query = $this->db->get('monsters');
		$monsters = [];

		// Generar a partir del resultat de la query, una array de tipus Monster
		foreach ($query->result() as $data) {
			$monster = $this->createMonsterFromRawObject($data);
			array_push($monsters, $monster);
		}

		return $monsters;
	}

	public function getMonsterByName($name)
	{
		// Generar query amb la condició del nom
		$condition = array('monster_name' => $name);
		$query = $this->db->get_where('monsters', $condition);

		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createMonsterFromRawObject($query->result()[0]);
	}

	public function addNewMonster($monster_name, $description, $hp, $attack, $defense, $accuracy, $gold, $xp_give)
	{
		// Creació array de Monster
		$data = array(
			'monster_name' => $monster_name,
			'description' => $description,
			'hp' => $hp,
			'attack' => $attack,
			'defense' => $defense,
			'accuracy' => $accuracy,
			'gold' => $gold,
			'xp_give' => $xp_give
		);

		// Insertar a la BBDD
		$this->db->insert('monsters', $data);
	}
}
