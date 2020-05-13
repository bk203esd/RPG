<?php


class Quest extends CI_Model
{
	private $quest_name;
	private $description;
	private $item_reward;
	private $quantity_item;
	private $gold_reward;
	private $monster_name;
	private $xp_reward;
	private $repeatable;

	public function getQuestName()
	{
		return $this->quest_name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getItemReward()
	{
		return $this->item_reward;
	}

	public function getQuantityItem()
	{
		return $this->quantity_item;
	}

	public function getGoldReward()
	{
		return $this->gold_reward;
	}

	public function getMonsterName()
	{
		return $this->monster_name;
	}

	public function getXpReward()
	{
		return $this->xp_reward;
	}

	public function getRepeatable()
	{
		return $this->repeatable;
	}

	public function __construct()
	{
		$this->quest_name = '';
		$this->description = '';
		$this->item_reward = '';
		$this->quantity_item = '';
		$this->gold_reward = '';
		$this->monster_name = '';
		$this->xp_reward = '';
		$this->repeatable = '';

		// Carrega i obertura de la BBDD
		$this->load->database('rpg');
	}

	public function createQuestFromRawObjtect($data)
	{
		$quest = new Quest();

		$quest->quest_name = $data->quest_name;
		$quest->description = $data->description;
		$quest->item_reward = $data->item_reward;
		$quest->quantity_item = $data->quantity_item;
		$quest->gold_reward = $data->gold_reward;
		$quest->monster_name = $data->monster_name;
		$quest->xp_reward = $data->xp_reward;
		$quest->repeatable = $data->repeatable;

		return $quest;
	}

	public function getQuests()
	{
		$query = $this->db->get('quests');
		$quests = [];

		// Generar a partir del resultat de la query, una array de tipus Race
		foreach ($query->result() as $data) {
			$quest = $this->createQuestFromRawObjtect($data);
			array_push($quests, $quest);
		}

		return $quests;
	}

	public function getQuestByName($name)
	{
		// Generar query amb la condició del nom
		$condition = "UPPER(quest_name) = UPPER('" . $name . "')";
		$this->db->where($condition);
		$query = $this->db->get('quests');
		// Comprovar si hi ha algun resultat
		if ($query->num_rows() != 1) return null;
		else return $this->createQuestFromRawObjtect($query->result()[0]);
	}

	public function addNewQuest($quest_name, $description, $item_reward, $quantity_item, $gold_reward, $monster_name, $xp_reward, $repeatable)
	{
		$data = array(
			'quest_name' => $quest_name,
			'description' => $description,
			'item_reward' => $item_reward,
			'quantity_item' => $quantity_item,
			'gold_reward' => $gold_reward,
			'monster_name' => $monster_name,
			'xp_reward' => $xp_reward,
			'repeatable' => $repeatable
		);

		// Insertar a la BBD
		$this->db->insert('quests', $data);
	}

	public function toArray()
	{
		return array(
			'quest_name' => $this->quest_name,
			'description' => $this->description,
			'item_reward' => $this->item_reward,
			'quantity_item' => $this->quantity_item,
			'gold_reward' => $this->gold_reward,
			'monster_name' => $this->monster_name,
			'xp_reward' => $this->xp_reward,
			'repeatable' => $this->repeatable
		);
	}
}
