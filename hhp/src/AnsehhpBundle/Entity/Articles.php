<?php

namespace AnsehhpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="AnsehhpBundle\Repository\ArticlesRepository")
	
 */
class Articles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="titleArticle", type="string", length=150, nullable=false)
     */
    private $titlearticle;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text", length=65535, nullable=false)
     */
    private $article;

    /**
     * @var integer
     *
     * @ORM\Column(name="link", type="integer", nullable=false)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArt", type="date", nullable=false)
     */
    private $dateart;

    /**
     * Get idarticle
     * @return idarticle
     * */
    public function getIdArticle()
    {
        return $this->idarticle;
    }

    /**
     * Set titlearticle
     * 
     * @param string $titlearticle
     * 
     * @return titlearticle
     * */
    public function setTitleArticle($titlearticle)
    {
        $this->titlearticle = $titlearticle;
        return $this;
    }
    /**
     * Get titlearticle
     * 
     * @param string $titlearticle
     * 
     * @return titlearticle
     * */
    public function getTitleArticle()
    {

        return $this->titlearticle;
    }

    /**
     * Set article
     * 
     * @param string $article
     * 
     * @return article
     * */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }
    /**
     * Get titlearticle
     * @return article
     * */
    public function getArticle()
    {

        return $this->article;
    }

    /**
     * Set link
     * 
     * @param string $link
     * 
     * @return link
     * */
    public function setlink($link)
    {
        $this->link = $link;
        return $this;
    }
    /**
     * Get titlearticle
     * @return link
     * */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set $dateart
     * 
     * @param string $dateart
     * 
     * @return \DateTime dateart
     * */
    public function setdateart($dateart)
    {
        $this->dateart = $dateart;
        return $this;
    }
    /**
     * Get dateart
     * @return dateart
     * */
    public function getdateart()
    {
        return $this->dateart;
    }
}