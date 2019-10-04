<?php

namespace AnsehhpBundleEntity;

use Doctrine\ORM\Mapping as ORM;
// use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv", indexes={@ORM\Index(name="member_id", columns={"memberId"}), @ORM\Index(name="member_id_2", columns={"memberId"})})
 * @ORM\Entity(repositoryClass="AnsehhpBundle\Repository\RdvRepository")
 */
class Rdv
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRdv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrdv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rdvDate", type="date", nullable=false)
     */
    private $rdvdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rdvTime", type="time", nullable=false)
     */
    private $rdvtime;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", nullable=false)
     */
    private $topic;

    /**
     * @var \Members
     *
     * @ORM\ManyToOne(targetEntity="AnsehhpBundle\Entity\Members")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="memberId",referencedColumnName="idMember")
     * }) 
     */
    private $memberid;

    /**
     * Get idrdv
     * @return idrdv
     * */
    public function getIdrdv()
    {
        return $this->idrdv;
    }

    /**
     * Set rdvdate
     * 
     * @param \DateTime $rdvdate
     * 
     * @return rdvdate
     * */
    public function setRdvDate($rdvdate)
    {
        $this->rdvdate = $rdvdate;
        return $this;
    }
    /**
     * Get rdvdate
     * 
     * @param string $rdvdate
     * 
     * @return rdvdate
     * */
    public function getRdvDate()
    {

        return $this->rdvdate;
    }

    /**
     * Set rdvtime
     * 
     * @param string $rdvtime
     * 
     * @return rdvtime
     * */
    public function setRdvTime($rdvtime)
    {
        $this->rdvtime = $rdvtime;
        return $this;
    }
    /**
     * Get rdvtime
     * 
     * @param string $rdvtime
     * 
     * @return rdvtime
     * */
    public function getRdvTime()
    {

        return $this->rdvtime;
    }

    /**
     * Set topic
     * 
     * @param string $topic
     * 
     * @return $topic
     * */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * Get topic
     * @return topic
     * */
    public function getTopic()
    {

        return $this->article;
    }

    /**
     * Get memberid
     * @return memberid
     * */
    public function getMemberid()
    {
        return $this->memberid;
    }
    /**
     * Get idmember
     * @return idmember
     * */
    public function getIdmember()
    {
        return $this->idmember;
    }

}