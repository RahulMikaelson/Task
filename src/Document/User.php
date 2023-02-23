<?php
namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document as Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id as Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field as Field;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Document
 */
class User implements UserInterface,PasswordAuthenticatedUserInterface{

    /**
     * @Id
     */
    private $id;

    /**
     * @Field(type="string")
     */
    private $firstName;
    /**
     * @Field(type="string")
     */
    private $lastName;

    /**
     * @Field(type="string")
     */
    private $email;

    /**
     * @Field(type="string")
     */
    private $password;
    public function __construct() {
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * @param mixed $lastName 
	 * @return self
	 */
	public function setLastName($lastName): self {
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}

	// /**
	//  * @return mixed
	//  */
	// public function getPassword() {
	// 	return $this->password;
	// }
	
	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password): self {
		$this->password = $password;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * @param mixed $firstName 
	 * @return self
	 */
	public function setFirstName($firstName): self {
		$this->firstName = $firstName;
		return $this;
	}
	/**
	 * Returns the roles granted to the user.
	 *
	 * public function getRoles()
	 * {
	 * return ['ROLE_USER'];
	 * }
	 *
	 * Alternatively, the roles might be stored in a ``roles`` property,
	 * and populated in any number of different ways when the user object
	 * is created.
	 * @return array<string>
	 */
	public function getRoles(): array {
		return [];
	}
	
	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 * @return mixed
	 */
	public function eraseCredentials() {
	}
	
	/**
	 * Returns the identifier for this user (e.g. username or email address).
	 * @return string
	 */
	public function getUserIdentifier(): string {
		return "hi";
	}
	/**
	 * Returns the hashed password used to authenticate the user.
	 *
	 * Usually on authentication, a plain-text password will be compared to this value.
	 * @return null|string
	 */
	public function getPassword(): ?string {
		return $this->password;
	}
}
