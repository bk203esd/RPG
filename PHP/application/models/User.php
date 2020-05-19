<?php


class User extends CI_Model
{
	private $user_name;
	private $email;

	public function getUserName()
	{
		return $this->user_name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function __construct()
	{
		$this->user_name = '';
		$this->email = '';

		$this->load->database('rpg');
	}

	public function createUserFromRawObject($data)
	{
		$user = new User();

		$user->user_name = $data->user_name;
		$user->email = $data->email;

		return $user;
	}

	public function toArray()
	{
		return array(
			'user_name' => $this->user_name,
			'email' => $this->email
		);
	}

	public function getUserEmail($email)
	{
		$condition = array('email' => $email);
		$query = $this->db->get_where('users', $condition);

		if ($query->num_rows() != 1) return null;
		else return $this->createUserFromRawObject($query->result()[0]);
	}

	public function checkUserEmail($email)
	{
		$data = array('email' => $email);
		$query = $this->db->get_where('users', $data);
		if ($query->num_rows() != 1) return false;
		return true;
	}
}
