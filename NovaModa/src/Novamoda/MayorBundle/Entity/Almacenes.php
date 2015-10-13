<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Almacenes
 *
 * @ORM\Table(name="almacenes")
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\AlmacenesRepository")
 */
class Almacenes
{
    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="idciudad", type="string", length=20, nullable=true)
     */
    private $idciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=30, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=30, nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="opcion", type="integer", nullable=false)
     */
    private $opcion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=false)
     */
    private $estado = 'activo';

    /**
     * @var string
     *
     * @ORM\Column(name="nombrecompleto", type="string", length=30, nullable=false)
     */
    private $nombrecompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoalmacen", type="string", length=20, nullable=false)
     */
    private $tipoalmacen = 'mayor';



    /**
     * Get idalmacen
     *
     * @return string
     */
    public function getIdalmacen()
    {
        return $this->idalmacen;
    }

    /**
     * Set idciudad
     *
     * @param string $idciudad
     *
     * @return Almacenes
     */
    public function setIdciudad($idciudad)
    {
        $this->idciudad = $idciudad;

        return $this;
    }

    /**
     * Get idciudad
     *
     * @return string
     */
    public function getIdciudad()
    {
        return $this->idciudad;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Almacenes
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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Almacenes
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Almacenes
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Almacenes
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Almacenes
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Almacenes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Almacenes
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set opcion
     *
     * @param integer $opcion
     *
     * @return Almacenes
     */
    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;

        return $this;
    }

    /**
     * Get opcion
     *
     * @return integer
     */
    public function getOpcion()
    {
        return $this->opcion;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Almacenes
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

    /**
     * Set nombrecompleto
     *
     * @param string $nombrecompleto
     *
     * @return Almacenes
     */
    public function setNombrecompleto($nombrecompleto)
    {
        $this->nombrecompleto = $nombrecompleto;

        return $this;
    }

    /**
     * Get nombrecompleto
     *
     * @return string
     */
    public function getNombrecompleto()
    {
        return $this->nombrecompleto;
    }

    /**
     * Set tipoalmacen
     *
     * @param string $tipoalmacen
     *
     * @return Almacenes
     */
    public function setTipoalmacen($tipoalmacen)
    {
        $this->tipoalmacen = $tipoalmacen;

        return $this;
    }

    /**
     * Get tipoalmacen
     *
     * @return string
     */
    public function getTipoalmacen()
    {
        return $this->tipoalmacen;
    }
}
