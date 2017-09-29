<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping;

/**
 * @Mapping\Entity
 * @Mapping\Table(name="user")
 */
class User
{
	/**
	 * @Mapping\Column(type="integer")
	 * @Mapping\Id
	 * @Mapping\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @Mapping\Column(type="text", name="first_name")
	 */
	private $firstName;

	/**
	 * @Mapping\Column(type="text", name="middle_name")
	 */
	private $middleName;

	/**
	 * @Mapping\Column(type="text", name="last_name")
	 */
	private $lastName;

	public function getId()
	{
		return $this->id;
	}
	
	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getMiddleName()
	{
		return $this->middleName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	public function setMiddleName($middleName)
	{
		$this->middleName = $middleName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
}