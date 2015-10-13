<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallesProforma
 *
 * @ORM\Table(name="detalles_proforma", indexes={@ORM\Index(name="id_proforma", columns={"id_proforma"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\DetallesProformaRepository")
 */
class DetallesProforma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_detalle", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proforma", type="bigint", nullable=false)
     */
    private $idProforma;
    /**
     * @var integer
     *
     * @ORM\Column(name="fila", type="integer", nullable=false)
     */
    private $fila;

    /**
     * @var integer
     *
     * @ORM\Column(name="columna", type="integer", nullable=false)
     */
    private $columna;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=255, nullable=false)
     */
    private $valor;

    /**
     * @var \Proformas
     *
     * @ORM\ManyToOne(targetEntity="Proformas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proforma", referencedColumnName="id_proforma")
     * })
     */
    private $proforma;



    /**
     * Get idDetalle
     *
     * @return integer
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * Set idProforma
     *
     * @param integer $idProforma
     *
     * @return DetallesProforma
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
     * @return DetallesProforma
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

    /**
     * Set columna
     *
     * @param integer $columna
     *
     * @return DetallesProforma
     */
    public function setColumna($columna)
    {
        $this->columna = $columna;
    
        return $this;
    }

    /**
     * Get columna
     *
     * @return integer
     */
    public function getColumna()
    {
        return $this->columna;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return DetallesProforma
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set proforma
     *
     * @param \Novamoda\MayorBundle\Entity\Proformas $proforma
     *
     * @return DetallesProforma
     */
    public function setProforma(\Novamoda\MayorBundle\Entity\Proformas $proforma = null)
    {
        $this->proforma = $proforma;
    
        return $this;
    }

    /**
     * Get proforma
     *
     * @return \Novamoda\MayorBundle\Entity\Proformas
     */
    public function getProforma()
    {
        return $this->proforma;
    }
}
