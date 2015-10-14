<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleados
 *
 * @ORM\Table(name="empleados", uniqueConstraints={@ORM\UniqueConstraint(name="codigo", columns={"codigo"})}, indexes={@ORM\Index(name="tipoempleado", columns={"idtipoempleado"}), @ORM\Index(name="idciudad", columns={"idciudad"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\EmpleadosRepository")
 */
class Empleados
{
    /**
     * @var string
     *
     * @ORM\Column(name="idempleado", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idempleado;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=50, nullable=true)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=30, nullable=true)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefeno", type="string", length=20, nullable=true)
     */
    private $telefeno;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="idtipoempleado", type="string", length=20, nullable=true)
     */
    private $idtipoempleado;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=100, nullable=true)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="idtienda", type="string", length=20, nullable=true)
     */
    private $idtienda;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=20, nullable=true)
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="idciudad", type="string", length=20, nullable=true)
     */
    private $idciudad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainicio", type="date", nullable=true)
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechabaja", type="date", nullable=true)
     */
    private $fechabaja;

    /**
     * @var string
     *
     * @ORM\Column(name="turno", type="string", length=10, nullable=false)
     */
    private $turno = 'todo';



    /**
     * Get idempleado
     *
     * @return string
     */
    public function getIdempleado()
    {
        return $this->idempleado;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Empleados
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
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Empleados
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Empleados
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set telefeno
     *
     * @param string $telefeno
     *
     * @return Empleados
     */
    public function setTelefeno($telefeno)
    {
        $this->telefeno = $telefeno;
    
        return $this;
    }

    /**
     * Get telefeno
     *
     * @return string
     */
    public function getTelefeno()
    {
        return $this->telefeno;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Empleados
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empleados
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
     * Set idtipoempleado
     *
     * @param string $idtipoempleado
     *
     * @return Empleados
     */
    public function setIdtipoempleado($idtipoempleado)
    {
        $this->idtipoempleado = $idtipoempleado;
    
        return $this;
    }

    /**
     * Get idtipoempleado
     *
     * @return string
     */
    public function getIdtipoempleado()
    {
        return $this->idtipoempleado;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Empleados
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
     * @return Empleados
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
     * Set observacion
     *
     * @param string $observacion
     *
     * @return Empleados
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Empleados
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idtienda
     *
     * @param string $idtienda
     *
     * @return Empleados
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
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Empleados
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
     * Set idciudad
     *
     * @param string $idciudad
     *
     * @return Empleados
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
     * Set fechainicio
     *
     * @param \DateTime $fechainicio
     *
     * @return Empleados
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
    
        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \DateTime
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set fechabaja
     *
     * @param \DateTime $fechabaja
     *
     * @return Empleados
     */
    public function setFechabaja($fechabaja)
    {
        $this->fechabaja = $fechabaja;
    
        return $this;
    }

    /**
     * Get fechabaja
     *
     * @return \DateTime
     */
    public function getFechabaja()
    {
        return $this->fechabaja;
    }

    /**
     * Set turno
     *
     * @param string $turno
     *
     * @return Empleados
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;
    
        return $this;
    }

    /**
     * Get turno
     *
     * @return string
     */
    public function getTurno()
    {
        return $this->turno;
    }
}
