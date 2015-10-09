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


}

