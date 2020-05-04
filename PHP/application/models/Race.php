<?php
// TODO vistes

class Race extends CI_Model
{
	private $race_name;
	private $description;
	private $multiply_hp;
	private $multiply_attack;
	private $multiply_defense;
	private $multiply_accuracy;

	public function getRaceName()
	{
		return $this->race_name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getMultiplyHp()
	{
		return $this->multiply_hp;
	}

	public function getMultiplyAttack()
	{
		return $this->multiply_attack;
	}

	public function getMultiplyDefense()
	{
		return $this->multiply_defense;
	}

	public function getMultiplyAccuracy()
	{
		return $this->multiply_accuracy;
	}

	public function __construct()
	{
		$this->race_name = '';
		$this->description = '';
		$this->multiply_hp = '';
		$this->multiply_attack = '';
		$this->multiply_defense = '';
		$this->multiply_accuracy = '';

		// Càrrega i obertura de la BBDD
		$this->load->database('rpg');
	}

	public function createRaceFromRawObject($data)
	{
		$race = new Race();

		$race->race_name = $data->race_name;
		$race->description = $data->description;
		$race->multiply_hp = $data->multiply_hp;
		$race->multiply_attack = $data->multiply_attack;
		$race->multiply_defense = $data->multiply_defense;
		$race->multiply_accuracy = $data->multiply_accuracy;

		return $race;
	}

	public function getRaces()
	{
		// SELECT * FROM Races;
		$query = $this->db->get('races');
		$races = [];

		// Generar a partir del resultat de la query, una array de tipus Race
		foreach ($query->result() as $data) {
			$race = $this->createRaceFromRawObject($data);
			array_push($races, $race);
		}

		return $races;
	}

	public function getRaceByName($name)
	{
		// Generar query amb la condició del nom
		$condition = array('race_name' => $name);
		$query = $this->db->get_where('races', $condition);

		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createRaceFromRawObject($query->result()[0]);
	}

	public function addNewRace($race_name, $description, $multiply_hp, $multiply_attack, $multiply_defense, $multiply_accuracy)
	{
		// Creació array de Race
		$data = array(
			'race_name' => $race_name,
			'description' => $description,
			'multiply_hp' => $multiply_hp,
			'multiply_attack' => $multiply_attack,
			'multiply_defense' => $multiply_defense,
			'multiply_accuracy' => $multiply_accuracy
		);

		// Insertar a la BBDD
		$this->db->insert('races', $data);
	}
}
