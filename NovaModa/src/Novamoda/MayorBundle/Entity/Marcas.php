<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marcas
 *
 * @ORM\Table(name="marcas", uniqueConstraints={@ORM\UniqueConstraint(name="codigobarra", columns={"codigobarra"})}, indexes={@ORM\Index(name="fk_2", columns={"idproveedor"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\MarcasRepository")
 */
class Marcas
{
    /**
     * @var string
     *
     * @ORM\Column(name="idmarca", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmarca;

    /**
     * @var string
     *
     * @ORM\Column(name="idproveedor", type="string", length=20, nullable=true)
     */
    private $idproveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=50, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarra", type="string", length=50, nullable=true)
     */
    private $codigobarra;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=500, nullable=true)
     */
    private $imagen;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=20, nullable=true)
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="pedido", type="string", length=50, nullable=true)
     */
    private $pedido;

    /**
     * @var string
     *
     * @ORM\Column(name="origen", type="string", length=50, nullable=true)
     */
    private $origen;

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=20, nullable=true)
     */
    private $talla;

    /**
     * @var integer
     *
     * @ORM\Column(name="opcion", type="integer", nullable=true)
     */
    private $opcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="opcionb", type="integer", nullable=false)
     */
    private $opcionb;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=10, nullable=false)
     */
    private $tipo = 'pedido';

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=20, nullable=false)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="idgrupo", type="string", length=3, nullable=false)
     */
    private $idgrupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroorden", type="integer", nullable=false)
     */
    private $numeroorden = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="opcioncategoria", type="integer", nullable=false)
     */
    private $opcioncategoria = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=10, nullable=false)
     */
    private $estado = 'activo';

    /**
     * @var integer
     *
     * @ORM\Column(name="formatomayor", type="integer", nullable=false)
     */
    private $formatomayor = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="encargado", type="string", length=20, nullable=false)
     */
    private $encargado = '-';



    /**
     * Get idmarca
     *
     * @return string
     */
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    /**
     * Set idproveedor
     *
     * @param string $idproveedor
     *
     * @return Marcas
     */
    public function setIdproveedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;

        return $this;
    }

    /**
     * Get idproveedor
     *
     * @return string
     */
    public function getIdproveedor()
    {
        return $this->idproveedor;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Marcas
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
     * Set codigobarra
     *
     * @param string $codigobarra
     *
     * @return Marcas
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Marcas
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
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Marcas
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Marcas
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
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Marcas
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
     * Set pedido
     *
     * @param string $pedido
     *
     * @return Marcas
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return string
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set origen
     *
     * @param string $origen
     *
     * @return Marcas
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set talla
     *
     * @param string $talla
     *
     * @return Marcas
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
     * Set opcion
     *
     * @param integer $opcion
     *
     * @return Marcas
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
     * Set opcionb
     *
     * @param integer $opcionb
     *
     * @return Marcas
     */
    public function setOpcionb($opcionb)
    {
        $this->opcionb = $opcionb;

        return $this;
    }

    /**
     * Get opcionb
     *
     * @return integer
     */
    public function getOpcionb()
    {
        return $this->opcionb;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Marcas
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
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Marcas
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set idgrupo
     *
     * @param string $idgrupo
     *
     * @return Marcas
     */
    public function setIdgrupo($idgrupo)
    {
        $this->idgrupo = $idgrupo;

        return $this;
    }

    /**
     * Get idgrupo
     *
     * @return string
     */
    public function getIdgrupo()
    {
        return $this->idgrupo;
    }

    /**
     * Set numeroorden
     *
     * @param integer $numeroorden
     *
     * @return Marcas
     */
    public function setNumeroorden($numeroorden)
    {
        $this->numeroorden = $numeroorden;

        return $this;
    }

    /**
     * Get numeroorden
     *
     * @return integer
     */
    public function getNumeroorden()
    {
        return $this->numeroorden;
    }

    /**
     * Set opcioncategoria
     *
     * @param integer $opcioncategoria
     *
     * @return Marcas
     */
    public function setOpcioncategoria($opcioncategoria)
    {
        $this->opcioncategoria = $opcioncategoria;

        return $this;
    }

    /**
     * Get opcioncategoria
     *
     * @return integer
     */
    public function getOpcioncategoria()
    {
        return $this->opcioncategoria;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Marcas
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
     * Set formatomayor
     *
     * @param integer $formatomayor
     *
     * @return Marcas
     */
    public function setFormatomayor($formatomayor)
    {
        $this->formatomayor = $formatomayor;

        return $this;
    }

    /**
     * Get formatomayor
     *
     * @return integer
     */
    public function getFormatomayor()
    {
        return $this->formatomayor;
    }

    /**
     * Set encargado
     *
     * @param string $encargado
     *
     * @return Marcas
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;

        return $this;
    }

    /**
     * Get encargado
     *
     * @return string
     */
    public function getEncargado()
    {
        return $this->encargado;
    }
}
