<?php


class Classe extends CI_Model
{
	private $clas_name;
	private $description;
	private $multiply_hp;
	private $multiply_attack;
	private $multiply_defense;
	private $multiply_accuracy;

	public function getClasName()
	{
		return $this->clas_name;
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
		$this->clas_name = '';
		$this->description = '';
		$this->multiply_hp = '';
		$this->multiply_attack = '';
		$this->multiply_defense = '';
		$this->multiply_accuracy = '';

		// Càrrega i obertura de la BBDD
		$this->load->database('rpg');
	}

	public function createClassFromRawObject($data)
	{
		$clas = new Classe();

		$clas->clas_name = $data->clas_name;
		$clas->description = $data->description;
		$clas->multiply_hp = $data->multiply_hp;
		$clas->multiply_attack = $data->multiply_attack;
		$clas->multiply_defense = $data->multiply_defense;
		$clas->multiply_accuracy = $data->multiply_accuracy;

		return $clas;
	}

	public function getClasses()
	{
		// SELECT * FROM Classes;
		$query = $this->db->get('classes');
		$classes = [];

		// Generar a partir del resultat de la query, una array de tipus Class
		foreach ($query->result() as $data) {
			$class = $this->createClassFromRawObject($data);
			array_push($classes, $class);
		}

		return $classes;
	}

	public function getClassByName($name)
	{
		$condition = "UPPER(clas_name) = UPPER('" . $name . "')";
		$this->db->where($condition);
		$query = $this->db->get('classes');

		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createClassFromRawObject($query->result()[0]);
	}

	public function addNewClass($clas_name, $description, $multiply_hp, $multiply_attack, $multiply_defense, $multiply_accuracy)
	{
		// Creació array de Race
		$data = array(
			'clas_name' => $clas_name,
			'description' => $description,
			'multiply_hp' => $multiply_hp,
			'multiply_attack' => $multiply_attack,
			'multiply_defense' => $multiply_defense,
			'multiply_accuracy' => $multiply_accuracy
		);

		// Insertar a la BBDD
		$this->db->insert('classes', $data);
	}

	public function toArray()
	{
		return array(
			'clas_name' => $this->clas_name,
			'description' => $this->description,
			'multiply_hp' => $this->multiply_hp,
			'multiply_attack' => $this->multiply_attack,
			'multiply_defense' => $this->multiply_defense,
			'multiply_accuracy' => $this->multiply_accuracy
		);
	}
}
