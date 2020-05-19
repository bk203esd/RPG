<?php


class Character extends CI_Model
{
	private $char_name;
	private $description;
	private $xp;
	private $lvl;
	private $max_hp;
	private $attack;
	private $defense;
	private $accuracy;
	private $gold;
	private $clas_name;
	private $race_name;
	private $user_name;

	public function getCharName()
	{
		return $this->char_name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getXp()
	{
		return $this->xp;
	}

	public function getLvl()
	{
		return $this->lvl;
	}

	public function getMaxHp()
	{
		return $this->max_hp;
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

	public function getClasName()
	{
		return $this->clas_name;
	}

	public function getRaceName()
	{
		return $this->race_name;
	}

	public function getUserName()
	{
		return $this->user_name;
	}

	public function __construct()
	{
		$this->char_name = '';
		$this->description = '';
		$this->xp = '';
		$this->lvl = '';
		$this->max_hp = '';
		$this->attack = '';
		$this->defense = '';
		$this->accuracy = '';
		$this->gold = '';
		$this->clas_name = '';
		$this->race_name = '';
		$this->user_name = '';

		// Càrrega i obertura de la BBD
		$this->load->database('rpg');

		// Càrrega de models
		$this->load->model('classe');
		$this->load->model('race');
	}

	public function createCharacterFromRawObject($data)
	{
		$character = new Character();

		$character->char_name = $data->clas_name;
		$character->description = $data->description;
		$character->xp = $data->xp;
		$character->lvl = $data->lvl;
		$character->max_hp = $data->max_hp;
		$character->attack = $data->attack;
		$character->defense = $data->defense;
		$character->accuracy = $data->accuracy;
		$character->gold = $data->gold;
		$character->clas_name = $data->clas_name;
		$character->race_name = $data->race_name;
		$character->user_name = $data->user_name;

		return $character;
	}

	public function toArray()
	{
		return array(
			'char_name' => $this->clas_name,
			'description' => $this->description,
			'xp' => $this->xp,
			'lvl' => $this->lvl,
			'max_hp' => $this->max_hp,
			'attack' => $this->attack,
			'defense' => $this->defense,
			'accuracy' => $this->accuracy,
			'gold' => $this->gold,
			'clas_name' => $this->clas_name,
			'race_name' => $this->race_name,
			'user_name' => $this->user_name
		);
	}

	public function getCharacterByName($name)
	{
		$condition = "UPPER(char_name) = UPPER('" . $name . "')";
		$this->db->where($condition);
		$query = $this->db->get('chracters');

		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createCharacterFromRawObject($query->result()[0]);
	}

	public function getCharactersByUser($user_name)
	{
		$condition = "user_name = '" . $user_name . "'";
		$this->db->where($condition);
		$query = $this->db->get('characters');
		$characters = [];
		if ($query->num_rows() <= 0) return null;
		else {
			foreach ($query->result() as $data) {
				$character = $this->createCharacterFromRawObject($data);
				array_push($characters, $character);
			}
			return $characters;
		}
	}

	public function addNewCharacter(
		$char_name, $description,
		$xp = 0,
		$lvl = 1,
		$max_hp = 100,
		$attack = 5,
		$defense = 5,
		$accuracy = 5,
		$gold = 200,
		$clas_name, $race_name, $user_name
	)
	{
		// Obtenir les dades de les Races i classes
		$classe = $this->classe->getClassByName($clas_name);

		$race = $this->race->getRaceByName($race_name);

		$data = array(
			'char_name' => $char_name,
			'description' => $description,
			'xp' => $xp,
			'lvl' => $lvl,
			'max_hp' => ($max_hp * $classe->getMultiplyHp()) + ($max_hp * $race->getMultiplyHp()),
			'attack' => ($attack * $classe->getMultiplyAttack()) + ($attack * $race->getMultiplyAttack()),
			'defense' => ($defense * $classe->getMultiplyDefense()) + ($defense * $race->getMultiplyDefense()),
			'accuracy' => ($accuracy * $classe->getMultiplyAccuracy()) + ($accuracy * $race->getMultiplyAccuracy()),
			'gold' => $gold,
			'clas_name' => $clas_name,
			'race_name' => $race_name,
			'user_name' => $user_name
		);

		// Insertar a la BBDD
		$this->db->insert('characters', $data);
	}
}
