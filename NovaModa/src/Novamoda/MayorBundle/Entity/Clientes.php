<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\ClientesRepository")
 */
class Clientes
{
    /**
     * @var string
     *
     * @ORM\Column(name="idcliente", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=15, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=50, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=10, nullable=true)
     */
    private $nit;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=40, nullable=false)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=20, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=30, nullable=false)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="item", type="string", length=10, nullable=true)
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=6, nullable=true)
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=false)
     */
    private $estado = 'ACTIVO';

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="saldoactual", type="decimal", precision=7, scale=2, nullable=false)
     */
    private $saldoactual;

    /**
     * @var string
     *
     * @ORM\Column(name="idciudad", type="string", length=10, nullable=false)
     */
    private $idciudad = 'ciu-1000';

    /**
     * @var string
     *
     * @ORM\Column(name="tipocliente", type="string", length=30, nullable=false)
     */
    private $tipocliente = 'cliente';



    /**
     * Get idcliente
     *
     * @return string
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Clientes
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Clientes
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Clientes
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
     * Set nit
     *
     * @param string $nit
     *
     * @return Clientes
     */
    public function setNit($nit)
    {
        $this->nit = $nit;
    
        return $this;
    }

    /**
     * Get nit
     *
     * @return string
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Clientes
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
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Clientes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Clientes
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Clientes
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    
        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set item
     *
     * @param string $item
     *
     * @return Clientes
     */
    public function setItem($item)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Clientes
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Clientes
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Clientes
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
     * Set saldoactual
     *
     * @param string $saldoactual
     *
     * @return Clientes
     */
    public function setSaldoactual($saldoactual)
    {
        $this->saldoactual = $saldoactual;
    
        return $this;
    }

    /**
     * Get saldoactual
     *
     * @return string
     */
    public function getSaldoactual()
    {
        return $this->saldoactual;
    }

    /**
     * Set idciudad
     *
     * @param string $idciudad
     *
     * @return Clientes
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
     * Set tipocliente
     *
     * @param string $tipocliente
     *
     * @return Clientes
     */
    public function setTipocliente($tipocliente)
    {
        $this->tipocliente = $tipocliente;
    
        return $this;
    }

    /**
     * Get tipocliente
     *
     * @return string
     */
    public function getTipocliente()
    {
        return $this->tipocliente;
    }
}
