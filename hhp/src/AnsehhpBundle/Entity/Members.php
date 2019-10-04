<?php

namespace AnsehhpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Members
 *
 * @ORM\Table(name="members")
 * @ORM\Entity(repositoryClass="AnsehhpBundle\Repository\MembersRepository")
 */
class Members
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMember", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\OneToOne(targetEntity="AnsehhpBundle\Entity\Rdv")
     */
    private $idmember;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=200, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=200, nullable=false)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="date", nullable=false)
     */
    private $dateofbirth;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=200, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="text", length=65535, nullable=false)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;


    /**
     * Get idmember
     * @return idmember
     * */
    public function getIdmember()
    {
        return $this->idmember;
    }

    /**
     * Set firstname
     * 
     * @param string $firstname
     * 
     * @return 
     * */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * Get firstname
     * 
     * @param string $firstname
     * 
     * @return 
     * */
    public function getFirstname()
    {

        return $this->firstname;
    }

    /**
     * Set lastname
     * 
     * @param string $lastname
     * */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * Get lastname
     * @return lastname
     * */
    public function getLastname()
    {

        return $this->lastname;
    }

    /**
     * Set dateofbirth
     * 
     * @param string $dateofbirth
     * 
     * @return \DateTime dateofbirth
     * */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;
        return $this;
    }
    /**
     * Get dateofbirth
     * @return dateofbirth
     * */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set $email
     * 
     * @param string $email
     * 
     * @return email 
     * */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     * @return email
     * */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set $password
     * 
     * @param string $password
     * 
     * @return password
     * */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get password
     * @return password
     * */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set $address
     * 
     * @param string $address
     * 
     * @return address
     * */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
    /**
     * Get address
     * @return address
     * */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set $country
     * 
     * @param string $country
     * 
     * @return country
     * */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
    /**
     * Get country
     * @return country
     * */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set $phone
     * 
     * @param string $phone
     * 
     * @return phone
     * */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * Get phone
     * @return phone
     * */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set $status
     * 
     * @param integer $status
     * 
     * @return status
     * */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    /**
     * Get status
     * @return status
     * */
    public function getStatus()
    {
        return $this->status;
    }
}