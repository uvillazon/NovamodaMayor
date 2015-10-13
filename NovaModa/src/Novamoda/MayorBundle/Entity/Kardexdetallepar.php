<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kardexdetallepar
 *
 * @ORM\Table(name="kardexdetallepar", indexes={@ORM\Index(name="idkardex", columns={"idkardex"}), @ORM\Index(name="idmodelo", columns={"idmodelo"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\KardexdetalleparRepository")
 */
class Kardexdetallepar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idkardexunico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idkardexunico;

    /**
     * @var string
     *
     * @ORM\Column(name="idkardex", type="string", length=20, nullable=false)
     */
    private $idkardex;

    /**
     * @var string
     *
     * @ORM\Column(name="idkardexdetalle", type="string", length=20, nullable=false)
     */
    private $idkardexdetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="idmodelo", type="string", length=20, nullable=true)
     */
    private $idmodelo;

    /**
     * @var string
     *
     * @ORM\Column(name="idingreso", type="string", length=20, nullable=true)
     */
    private $idingreso;

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarra", type="string", length=20, nullable=true)
     */
    private $codigobarra;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldocantidad", type="integer", nullable=true)
     */
    private $saldocantidad = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=5, nullable=false)
     */
    private $talla;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="preciounitario", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $preciounitario = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="idoperacion", type="string", length=10, nullable=true)
     */
    private $idoperacion = 'no';

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarraean13", type="string", length=20, nullable=true)
     */
    private $codigobarraean13;

    /**
     * @var integer
     *
     * @ORM\Column(name="generado", type="integer", nullable=false)
     */
    private $generado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="unido", type="string", length=12, nullable=false)
     */
    private $unido = 'no';

    /**
     * @var string
     *
     * @ORM\Column(name="fallado", type="string", length=1, nullable=false)
     */
    private $fallado = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="idperiodo", type="integer", nullable=false)
     */
    private $idperiodo = '8';

    /**
     * @var string
     *
     * @ORM\Column(name="idimpresion", type="string", length=20, nullable=false)
     */
    private $idimpresion;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=20, nullable=false)
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="preciounitariobs", type="decimal", precision=11, scale=5, nullable=false)
     */
    private $preciounitariobs = '0.00000';

    /**
     * @var integer
     *
     * @ORM\Column(name="lector", type="integer", nullable=false)
     */
    private $lector = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="vendido", type="integer", nullable=false)
     */
    private $vendido = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="kardex", type="integer", nullable=false)
     */
    private $kardex = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="almacen", type="string", length=20, nullable=false)
     */
    private $almacen = 'I';



    /**
     * Get idkardexunico
     *
     * @return integer
     */
    public function getIdkardexunico()
    {
        return $this->idkardexunico;
    }

    /**
     * Set idkardex
     *
     * @param string $idkardex
     *
     * @return Kardexdetallepar
     */
    public function setIdkardex($idkardex)
    {
        $this->idkardex = $idkardex;

        return $this;
    }

    /**
     * Get idkardex
     *
     * @return string
     */
    public function getIdkardex()
    {
        return $this->idkardex;
    }

    /**
     * Set idkardexdetalle
     *
     * @param string $idkardexdetalle
     *
     * @return Kardexdetallepar
     */
    public function setIdkardexdetalle($idkardexdetalle)
    {
        $this->idkardexdetalle = $idkardexdetalle;

        return $this;
    }

    /**
     * Get idkardexdetalle
     *
     * @return string
     */
    public function getIdkardexdetalle()
    {
        return $this->idkardexdetalle;
    }

    /**
     * Set idmodelo
     *
     * @param string $idmodelo
     *
     * @return Kardexdetallepar
     */
    public function setIdmodelo($idmodelo)
    {
        $this->idmodelo = $idmodelo;

        return $this;
    }

    /**
     * Get idmodelo
     *
     * @return string
     */
    public function getIdmodelo()
    {
        return $this->idmodelo;
    }

    /**
     * Set idingreso
     *
     * @param string $idingreso
     *
     * @return Kardexdetallepar
     */
    public function setIdingreso($idingreso)
    {
        $this->idingreso = $idingreso;

        return $this;
    }

    /**
     * Get idingreso
     *
     * @return string
     */
    public function getIdingreso()
    {
        return $this->idingreso;
    }

    /**
     * Set codigobarra
     *
     * @param string $codigobarra
     *
     * @return Kardexdetallepar
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
     * Set saldocantidad
     *
     * @param integer $saldocantidad
     *
     * @return Kardexdetallepar
     */
    public function setSaldocantidad($saldocantidad)
    {
        $this->saldocantidad = $saldocantidad;

        return $this;
    }

    /**
     * Get saldocantidad
     *
     * @return integer
     */
    public function getSaldocantidad()
    {
        return $this->saldocantidad;
    }

    /**
     * Set talla
     *
     * @param string $talla
     *
     * @return Kardexdetallepar
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Kardexdetallepar
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
     * Set preciounitario
     *
     * @param string $preciounitario
     *
     * @return Kardexdetallepar
     */
    public function setPreciounitario($preciounitario)
    {
        $this->preciounitario = $preciounitario;

        return $this;
    }

    /**
     * Get preciounitario
     *
     * @return string
     */
    public function getPreciounitario()
    {
        return $this->preciounitario;
    }

    /**
     * Set idoperacion
     *
     * @param string $idoperacion
     *
     * @return Kardexdetallepar
     */
    public function setIdoperacion($idoperacion)
    {
        $this->idoperacion = $idoperacion;

        return $this;
    }

    /**
     * Get idoperacion
     *
     * @return string
     */
    public function getIdoperacion()
    {
        return $this->idoperacion;
    }

    /**
     * Set codigobarraean13
     *
     * @param string $codigobarraean13
     *
     * @return Kardexdetallepar
     */
    public function setCodigobarraean13($codigobarraean13)
    {
        $this->codigobarraean13 = $codigobarraean13;

        return $this;
    }

    /**
     * Get codigobarraean13
     *
     * @return string
     */
    public function getCodigobarraean13()
    {
        return $this->codigobarraean13;
    }

    /**
     * Set generado
     *
     * @param integer $generado
     *
     * @return Kardexdetallepar
     */
    public function setGenerado($generado)
    {
        $this->generado = $generado;

        return $this;
    }

    /**
     * Get generado
     *
     * @return integer
     */
    public function getGenerado()
    {
        return $this->generado;
    }

    /**
     * Set unido
     *
     * @param string $unido
     *
     * @return Kardexdetallepar
     */
    public function setUnido($unido)
    {
        $this->unido = $unido;

        return $this;
    }

    /**
     * Get unido
     *
     * @return string
     */
    public function getUnido()
    {
        return $this->unido;
    }

    /**
     * Set fallado
     *
     * @param string $fallado
     *
     * @return Kardexdetallepar
     */
    public function setFallado($fallado)
    {
        $this->fallado = $fallado;

        return $this;
    }

    /**
     * Get fallado
     *
     * @return string
     */
    public function getFallado()
    {
        return $this->fallado;
    }

    /**
     * Set idperiodo
     *
     * @param integer $idperiodo
     *
     * @return Kardexdetallepar
     */
    public function setIdperiodo($idperiodo)
    {
        $this->idperiodo = $idperiodo;

        return $this;
    }

    /**
     * Get idperiodo
     *
     * @return integer
     */
    public function getIdperiodo()
    {
        return $this->idperiodo;
    }

    /**
     * Set idimpresion
     *
     * @param string $idimpresion
     *
     * @return Kardexdetallepar
     */
    public function setIdimpresion($idimpresion)
    {
        $this->idimpresion = $idimpresion;

        return $this;
    }

    /**
     * Get idimpresion
     *
     * @return string
     */
    public function getIdimpresion()
    {
        return $this->idimpresion;
    }

    /**
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Kardexdetallepar
     */
    public function setIdalmacen($idalmacen)
    {
        $this->idalmacen = $idalmacen;

        return $this;
    }

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
     * Set preciounitariobs
     *
     * @param string $preciounitariobs
     *
     * @return Kardexdetallepar
     */
    public function setPreciounitariobs($preciounitariobs)
    {
        $this->preciounitariobs = $preciounitariobs;

        return $this;
    }

    /**
     * Get preciounitariobs
     *
     * @return string
     */
    public function getPreciounitariobs()
    {
        return $this->preciounitariobs;
    }

    /**
     * Set lector
     *
     * @param integer $lector
     *
     * @return Kardexdetallepar
     */
    public function setLector($lector)
    {
        $this->lector = $lector;

        return $this;
    }

    /**
     * Get lector
     *
     * @return integer
     */
    public function getLector()
    {
        return $this->lector;
    }

    /**
     * Set vendido
     *
     * @param integer $vendido
     *
     * @return Kardexdetallepar
     */
    public function setVendido($vendido)
    {
        $this->vendido = $vendido;

        return $this;
    }

    /**
     * Get vendido
     *
     * @return integer
     */
    public function getVendido()
    {
        return $this->vendido;
    }

    /**
     * Set kardex
     *
     * @param integer $kardex
     *
     * @return Kardexdetallepar
     */
    public function setKardex($kardex)
    {
        $this->kardex = $kardex;

        return $this;
    }

    /**
     * Get kardex
     *
     * @return integer
     */
    public function getKardex()
    {
        return $this->kardex;
    }

    /**
     * Set almacen
     *
     * @param string $almacen
     *
     * @return Kardexdetallepar
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
}
