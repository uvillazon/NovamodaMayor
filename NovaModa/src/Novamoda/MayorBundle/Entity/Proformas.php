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
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Proformas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Proformas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return Proformas
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set almacen
     *
     * @param string $almacen
     *
     * @return Proformas
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get almacen
     *
     * @return string
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Proformas
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set nombreArchivo
     *
     * @param string $nombreArchivo
     *
     * @return Proformas
     */
    public function setNombreArchivo($nombreArchivo)
    {
        $this->nombreArchivo = $nombreArchivo;

        return $this;
    }

    /**
     * Get nombreArchivo
     *
     * @return string
     */
    public function getNombreArchivo()
    {
        return $this->nombreArchivo;
    }

    /**
     * Set tipoArchivo
     *
     * @param string $tipoArchivo
     *
     * @return Proformas
     */
    public function setTipoArchivo($tipoArchivo)
    {
        $this->tipoArchivo = $tipoArchivo;

        return $this;
    }

    /**
     * Get tipoArchivo
     *
     * @return string
     */
    public function getTipoArchivo()
    {
        return $this->tipoArchivo;
    }

    /**
     * Set urlArchivo
     *
     * @param string $urlArchivo
     *
     * @return Proformas
     */
    public function setUrlArchivo($urlArchivo)
    {
        $this->urlArchivo = $urlArchivo;

        return $this;
    }

    /**
     * Get urlArchivo
     *
     * @return string
     */
    public function getUrlArchivo()
    {
        return $this->urlArchivo;
    }

    /**
     * Set nroFactura
     *
     * @param string $nroFactura
     *
     * @return Proformas
     */
    public function setNroFactura($nroFactura)
    {
        $this->nroFactura = $nroFactura;

        return $this;
    }

    /**
     * Get nroFactura
     *
     * @return string
     */
    public function getNroFactura()
    {
        return $this->nroFactura;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Proformas
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
