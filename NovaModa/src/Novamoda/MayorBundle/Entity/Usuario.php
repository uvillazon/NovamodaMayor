<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\UsuarioRepository")
 */
class Usuario
{
    
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="idusuario", type="string", length=255)
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="idrol", type="string", length=255)
     */
    private $idrol;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=255)
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=255)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="ci", type="string", length=255)
     */
    private $ci;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="paswd", type="string", length=255)
     */
    private $paswd;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;


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
     * Set idusuario
     *
     * @param string $idusuario
     *
     * @return Usuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    
        return $this;
    }

    /**
     * Get idusuario
     *
     * @return string
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set idrol
     *
     * @param string $idrol
     *
     * @return Usuario
     */
    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;
    
        return $this;
    }

    /**
     * Get idrol
     *
     * @return string
     */
    public function getIdrol()
    {
        return $this->idrol;
    }

    /**
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Usuario
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Usuario
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    
        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Usuario
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    
        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set ci
     *
     * @param string $ci
     *
     * @return Usuario
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    
        return $this;
    }

    /**
     * Get ci
     *
     * @return string
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Usuario
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set paswd
     *
     * @param string $paswd
     *
     * @return Usuario
     */
    public function setPaswd($paswd)
    {
        $this->paswd = $paswd;
    
        return $this;
    }

    /**
     * Get paswd
     *
     * @return string
     */
    public function getPaswd()
    {
        return $this->paswd;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Usuario
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

