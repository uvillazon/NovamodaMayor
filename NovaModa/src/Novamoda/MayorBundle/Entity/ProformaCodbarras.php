<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProformaCodbarras
 *
 * @ORM\Table(name="proforma_codbarras")
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\ProformaCodbarrasRepository")
 */
class ProformaCodbarras
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=20, nullable=true)
     */
    private $talla;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarra", type="string", length=20, nullable=true)
     */
    private $codigobarra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proforma", type="bigint", nullable=true)
     */
    private $idProforma;

    /**
     * @var integer
     *
     * @ORM\Column(name="fila", type="integer", nullable=true)
     */
    private $fila;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set talla
     *
     * @param string $talla
     *
     * @return ProformaCodbarras
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     *
     * @return string
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return ProformaCodbarras
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set codigobarra
     *
     * @param string $codigobarra
     *
     * @return ProformaCodbarras
     */
    public function setCodigobarra($codigobarra)
    {
        $this->codigobarra = $codigobarra;

        return $this;
    }

    /**
     * Get codigobarra
     *
     * @return string
     */
    public function getCodigobarra()
    {
        return $this->codigobarra;
    }

    /**
     * Set idProforma
     *
     * @param integer $idProforma
     *
     * @return ProformaCodbarras
     */
    public function setIdProforma($idProforma)
    {
        $this->idProforma = $idProforma;

        return $this;
    }

    /**
     * Get idProforma
     *
     * @return integer
     */
    public function getIdProforma()
    {
        return $this->idProforma;
    }

    /**
     * Set fila
     *
     * @param integer $fila
     *
     * @return ProformaCodbarras
     */
    public function setFila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get fila
     *
     * @return integer
     */
    public function getFila()
    {
        return $this->fila;
    }
}
