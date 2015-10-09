<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proformas
 *
 * @ORM\Table(name="proformas")
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\ProformasRepository")
 */
class Proformas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proforma", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProforma;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reg", type="datetime", nullable=false)
     */
    private $fechaReg = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=50, nullable=true)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="almacen", type="string", length=50, nullable=true)
     */
    private $almacen;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=50, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_archivo", type="string", length=255, nullable=true)
     */
    private $nombreArchivo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_archivo", type="string", length=255, nullable=true)
     */
    private $tipoArchivo;

    /**
     * @var string
     *
     * @ORM\Column(name="url_archivo", type="string", length=255, nullable=true)
     */
    private $urlArchivo;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_factura", type="string", length=255, nullable=true)
     */
    private $nroFactura;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=true)
     */
    private $estado;


}

