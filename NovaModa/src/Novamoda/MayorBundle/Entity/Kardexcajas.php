<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kardexcajas
 *
 * @ORM\Table(name="kardexcajas", indexes={@ORM\Index(name="idkardex", columns={"idkardex"}), @ORM\Index(name="idmodelo", columns={"idmodelo"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\KardexcajasRepository")
 */
class Kardexcajas
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
     * @ORM\Column(name="idmodelo", type="string", length=20, nullable=true)
     */
    private $idmodelo;

    /**
     * @var string
     *
     * @ORM\Column(name="idtienda", type="string", length=20, nullable=true)
     */
    private $idtienda;

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarra", type="string", length=20, nullable=true)
     */
    private $codigobarra;

    /**
     * @var string
     *
     * @ORM\Column(name="saldocantidad", type="decimal", precision=4, scale=1, nullable=true)
     */
    private $saldocantidad = '0.0';

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroparesfila", type="integer", nullable=false)
     */
    private $numeroparesfila = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="totalparescaja", type="integer", nullable=false)
     */
    private $totalparescaja = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="numerocajas", type="decimal", precision=4, scale=1, nullable=false)
     */
    private $numerocajas = '0.0';

    /**
     * @var string
     *
     * @ORM\Column(name="precioventa", type="decimal", precision=22, scale=2, nullable=true)
     */
    private $precioventa = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="preciounitario", type="decimal", precision=22, scale=11, nullable=true)
     */
    private $preciounitario = '0.00000000000';

    /**
     * @var string
     *
     * @ORM\Column(name="preciototalcaja", type="decimal", precision=22, scale=11, nullable=true)
     */
    private $preciototalcaja = '0.00000000000';

    /**
     * @var string
     *
     * @ORM\Column(name="idingresoetalle", type="string", length=20, nullable=true)
     */
    private $idingresoetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="idoperacion", type="string", length=20, nullable=true)
     */
    private $idoperacion;

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
     * @var integer
     *
     * @ORM\Column(name="cantidadlector", type="integer", nullable=false)
     */
    private $cantidadlector = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="idimpresion", type="string", length=20, nullable=false)
     */
    private $idimpresion;



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
     * @return Kardexcajas
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
     * Set idmodelo
     *
     * @param string $idmodelo
     *
     * @return Kardexcajas
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
     * Set idtienda
     *
     * @param string $idtienda
     *
     * @return Kardexcajas
     */
    public function setIdtienda($idtienda)
    {
        $this->idtienda = $idtienda;

        return $this;
    }

    /**
     * Get idtienda
     *
     * @return string
     */
    public function getIdtienda()
    {
        return $this->idtienda;
    }

    /**
     * Set codigobarra
     *
     * @param string $codigobarra
     *
     * @return Kardexcajas
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
     * @param string $saldocantidad
     *
     * @return Kardexcajas
     */
    public function setSaldocantidad($saldocantidad)
    {
        $this->saldocantidad = $saldocantidad;

        return $this;
    }

    /**
     * Get saldocantidad
     *
     * @return string
     */
    public function getSaldocantidad()
    {
        return $this->saldocantidad;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Kardexcajas
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
     * Set numeroparesfila
     *
     * @param integer $numeroparesfila
     *
     * @return Kardexcajas
     */
    public function setNumeroparesfila($numeroparesfila)
    {
        $this->numeroparesfila = $numeroparesfila;

        return $this;
    }

    /**
     * Get numeroparesfila
     *
     * @return integer
     */
    public function getNumeroparesfila()
    {
        return $this->numeroparesfila;
    }

    /**
     * Set totalparescaja
     *
     * @param integer $totalparescaja
     *
     * @return Kardexcajas
     */
    public function setTotalparescaja($totalparescaja)
    {
        $this->totalparescaja = $totalparescaja;

        return $this;
    }

    /**
     * Get totalparescaja
     *
     * @return integer
     */
    public function getTotalparescaja()
    {
        return $this->totalparescaja;
    }

    /**
     * Set numerocajas
     *
     * @param string $numerocajas
     *
     * @return Kardexcajas
     */
    public function setNumerocajas($numerocajas)
    {
        $this->numerocajas = $numerocajas;

        return $this;
    }

    /**
     * Get numerocajas
     *
     * @return string
     */
    public function getNumerocajas()
    {
        return $this->numerocajas;
    }

    /**
     * Set precioventa
     *
     * @param string $precioventa
     *
     * @return Kardexcajas
     */
    public function setPrecioventa($precioventa)
    {
        $this->precioventa = $precioventa;

        return $this;
    }

    /**
     * Get precioventa
     *
     * @return string
     */
    public function getPrecioventa()
    {
        return $this->precioventa;
    }

    /**
     * Set preciounitario
     *
     * @param string $preciounitario
     *
     * @return Kardexcajas
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
     * Set preciototalcaja
     *
     * @param string $preciototalcaja
     *
     * @return Kardexcajas
     */
    public function setPreciototalcaja($preciototalcaja)
    {
        $this->preciototalcaja = $preciototalcaja;

        return $this;
    }

    /**
     * Get preciototalcaja
     *
     * @return string
     */
    public function getPreciototalcaja()
    {
        return $this->preciototalcaja;
    }

    /**
     * Set idingresoetalle
     *
     * @param string $idingresoetalle
     *
     * @return Kardexcajas
     */
    public function setIdingresoetalle($idingresoetalle)
    {
        $this->idingresoetalle = $idingresoetalle;

        return $this;
    }

    /**
     * Get idingresoetalle
     *
     * @return string
     */
    public function getIdingresoetalle()
    {
        return $this->idingresoetalle;
    }

    /**
     * Set idoperacion
     *
     * @param string $idoperacion
     *
     * @return Kardexcajas
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
     * @return Kardexcajas
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
     * @return Kardexcajas
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
     * @return Kardexcajas
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
     * @return Kardexcajas
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
     * @return Kardexcajas
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
     * Set cantidadlector
     *
     * @param integer $cantidadlector
     *
     * @return Kardexcajas
     */
    public function setCantidadlector($cantidadlector)
    {
        $this->cantidadlector = $cantidadlector;

        return $this;
    }

    /**
     * Get cantidadlector
     *
     * @return integer
     */
    public function getCantidadlector()
    {
        return $this->cantidadlector;
    }

    /**
     * Set idimpresion
     *
     * @param string $idimpresion
     *
     * @return Kardexcajas
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
}
