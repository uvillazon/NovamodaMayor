<?php

namespace Novamoda\MayorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Modelo
 *
 * @ORM\Table(name="modelo", indexes={@ORM\Index(name="idingreso", columns={"idingreso"})})
 * @ORM\Entity(repositoryClass="Novamoda\MayorBundle\Entity\Repository\ModeloRepository")
 */
class Modelo
{
    /**
     * @var string
     *
     * @ORM\Column(name="idmodelo", type="string", length=20, nullable=false)
     * @ORM\Id
     */
    private $idmodelo = '';

    /**
     * @var string
     *
     * @ORM\Column(name="idmodelodetalle", type="string", length=40, nullable=false)
     */
    private $idmodelodetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="idmarca", type="string", length=20, nullable=false)
     */
    private $idmarca;

    /**
     * @var string
     *
     * @ORM\Column(name="idvendedor", type="string", length=20, nullable=false)
     */
    private $idvendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=18, nullable=false)
     */
    private $color = '-';

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="string", length=20, nullable=false)
     */
    private $material = '-';

    /**
     * @var string
     *
     * @ORM\Column(name="linea", type="string", length=20, nullable=false)
     */
    private $linea = '-';

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=20, nullable=false)
     */
    private $cliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="idingreso", type="string", length=20, nullable=true)
     */
    private $idingreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var integer
     *
     * @ORM\Column(name="generado", type="integer", nullable=false)
     */
    private $generado = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="opciont", type="integer", nullable=false)
     */
    private $opciont = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="unido", type="string", length=12, nullable=false)
     */
    private $unido = 'no';

    /**
     * @var integer
     *
     * @ORM\Column(name="inventario", type="integer", nullable=false)
     */
    private $inventario = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="rebaja", type="string", length=20, nullable=false)
     */
    private $rebaja = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=8, nullable=false)
     */
    private $estado = 'Activo';

    /**
     * @var string
     *
     * @ORM\Column(name="idcoleccion", type="string", length=20, nullable=false)
     */
    private $idcoleccion;

    /**
     * @var string
     *
     * @ORM\Column(name="idcliente", type="string", length=20, nullable=false)
     */
    private $idcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="precioventa", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $precioventa;

    /**
     * @var string
     *
     * @ORM\Column(name="preciounitario", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $preciounitario;

    /**
     * @var string
     *
     * @ORM\Column(name="preciototalcaja", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $preciototalcaja;

    /**
     * @var string
     *
     * @ORM\Column(name="numerocajas", type="decimal", precision=4, scale=1, nullable=true)
     */
    private $numerocajas = '0.0';

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroparesfila", type="integer", nullable=true)
     */
    private $numeroparesfila;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalparescaja", type="integer", nullable=true)
     */
    private $totalparescaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeracion", type="integer", nullable=false)
     */
    private $numeracion = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="modificar", type="integer", nullable=false)
     */
    private $modificar = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=5, nullable=false)
     */
    private $talla;

    /**
     * @var string
     *
     * @ORM\Column(name="idalmacen", type="string", length=10, nullable=false)
     */
    private $idalmacen = 'alm-3';

    /**
     * @var string
     *
     * @ORM\Column(name="estadotraspaso", type="string", length=20, nullable=false)
     */
    private $estadotraspaso = 'ninguno';

    /**
     * @var string
     *
     * @ORM\Column(name="fechaingreso", type="string", length=8, nullable=false)
     */
    private $fechaingreso;

    /**
     * @var string
     *
     * @ORM\Column(name="preciooficina", type="decimal", precision=11, scale=5, nullable=false)
     */
    private $preciooficina = '0.00000';

    /**
     * @var string
     *
     * @ORM\Column(name="preciobs", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $preciobs = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="tipocambio", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $tipocambio = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="boleta", type="string", length=20, nullable=false)
     */
    private $boleta;



    /**
     * Set idmodelo
     *
     * @param string $idmodelo
     *
     * @return Modelo
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
     * Set idmodelodetalle
     *
     * @param string $idmodelodetalle
     *
     * @return Modelo
     */
    public function setIdmodelodetalle($idmodelodetalle)
    {
        $this->idmodelodetalle = $idmodelodetalle;

        return $this;
    }

    /**
     * Get idmodelodetalle
     *
     * @return string
     */
    public function getIdmodelodetalle()
    {
        return $this->idmodelodetalle;
    }

    /**
     * Set idmarca
     *
     * @param string $idmarca
     *
     * @return Modelo
     */
    public function setIdmarca($idmarca)
    {
        $this->idmarca = $idmarca;

        return $this;
    }

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
     * Set idvendedor
     *
     * @param string $idvendedor
     *
     * @return Modelo
     */
    public function setIdvendedor($idvendedor)
    {
        $this->idvendedor = $idvendedor;

        return $this;
    }

    /**
     * Get idvendedor
     *
     * @return string
     */
    public function getIdvendedor()
    {
        return $this->idvendedor;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Modelo
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
     * Set color
     *
     * @param string $color
     *
     * @return Modelo
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set material
     *
     * @param string $material
     *
     * @return Modelo
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set linea
     *
     * @param string $linea
     *
     * @return Modelo
     */
    public function setLinea($linea)
    {
        $this->linea = $linea;

        return $this;
    }

    /**
     * Get linea
     *
     * @return string
     */
    public function getLinea()
    {
        return $this->linea;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return Modelo
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Modelo
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
     * Set idingreso
     *
     * @param string $idingreso
     *
     * @return Modelo
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Modelo
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
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Modelo
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set generado
     *
     * @param integer $generado
     *
     * @return Modelo
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
     * Set opciont
     *
     * @param integer $opciont
     *
     * @return Modelo
     */
    public function setOpciont($opciont)
    {
        $this->opciont = $opciont;

        return $this;
    }

    /**
     * Get opciont
     *
     * @return integer
     */
    public function getOpciont()
    {
        return $this->opciont;
    }

    /**
     * Set unido
     *
     * @param string $unido
     *
     * @return Modelo
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
     * Set inventario
     *
     * @param integer $inventario
     *
     * @return Modelo
     */
    public function setInventario($inventario)
    {
        $this->inventario = $inventario;

        return $this;
    }

    /**
     * Get inventario
     *
     * @return integer
     */
    public function getInventario()
    {
        return $this->inventario;
    }

    /**
     * Set rebaja
     *
     * @param string $rebaja
     *
     * @return Modelo
     */
    public function setRebaja($rebaja)
    {
        $this->rebaja = $rebaja;

        return $this;
    }

    /**
     * Get rebaja
     *
     * @return string
     */
    public function getRebaja()
    {
        return $this->rebaja;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Modelo
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
     * Set idcoleccion
     *
     * @param string $idcoleccion
     *
     * @return Modelo
     */
    public function setIdcoleccion($idcoleccion)
    {
        $this->idcoleccion = $idcoleccion;

        return $this;
    }

    /**
     * Get idcoleccion
     *
     * @return string
     */
    public function getIdcoleccion()
    {
        return $this->idcoleccion;
    }

    /**
     * Set idcliente
     *
     * @param string $idcliente
     *
     * @return Modelo
     */
    public function setIdcliente($idcliente)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

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
     * Set precioventa
     *
     * @param string $precioventa
     *
     * @return Modelo
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
     * @return Modelo
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
     * @return Modelo
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
     * Set numerocajas
     *
     * @param string $numerocajas
     *
     * @return Modelo
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
     * Set numeroparesfila
     *
     * @param integer $numeroparesfila
     *
     * @return Modelo
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
     * @return Modelo
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
     * Set numeracion
     *
     * @param integer $numeracion
     *
     * @return Modelo
     */
    public function setNumeracion($numeracion)
    {
        $this->numeracion = $numeracion;

        return $this;
    }

    /**
     * Get numeracion
     *
     * @return integer
     */
    public function getNumeracion()
    {
        return $this->numeracion;
    }

    /**
     * Set modificar
     *
     * @param integer $modificar
     *
     * @return Modelo
     */
    public function setModificar($modificar)
    {
        $this->modificar = $modificar;

        return $this;
    }

    /**
     * Get modificar
     *
     * @return integer
     */
    public function getModificar()
    {
        return $this->modificar;
    }

    /**
     * Set talla
     *
     * @param string $talla
     *
     * @return Modelo
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
     * Set idalmacen
     *
     * @param string $idalmacen
     *
     * @return Modelo
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
     * Set estadotraspaso
     *
     * @param string $estadotraspaso
     *
     * @return Modelo
     */
    public function setEstadotraspaso($estadotraspaso)
    {
        $this->estadotraspaso = $estadotraspaso;

        return $this;
    }

    /**
     * Get estadotraspaso
     *
     * @return string
     */
    public function getEstadotraspaso()
    {
        return $this->estadotraspaso;
    }

    /**
     * Set fechaingreso
     *
     * @param string $fechaingreso
     *
     * @return Modelo
     */
    public function setFechaingreso($fechaingreso)
    {
        $this->fechaingreso = $fechaingreso;

        return $this;
    }

    /**
     * Get fechaingreso
     *
     * @return string
     */
    public function getFechaingreso()
    {
        return $this->fechaingreso;
    }

    /**
     * Set preciooficina
     *
     * @param string $preciooficina
     *
     * @return Modelo
     */
    public function setPreciooficina($preciooficina)
    {
        $this->preciooficina = $preciooficina;

        return $this;
    }

    /**
     * Get preciooficina
     *
     * @return string
     */
    public function getPreciooficina()
    {
        return $this->preciooficina;
    }

    /**
     * Set preciobs
     *
     * @param string $preciobs
     *
     * @return Modelo
     */
    public function setPreciobs($preciobs)
    {
        $this->preciobs = $preciobs;

        return $this;
    }

    /**
     * Get preciobs
     *
     * @return string
     */
    public function getPreciobs()
    {
        return $this->preciobs;
    }

    /**
     * Set tipocambio
     *
     * @param string $tipocambio
     *
     * @return Modelo
     */
    public function setTipocambio($tipocambio)
    {
        $this->tipocambio = $tipocambio;

        return $this;
    }

    /**
     * Get tipocambio
     *
     * @return string
     */
    public function getTipocambio()
    {
        return $this->tipocambio;
    }

    /**
     * Set boleta
     *
     * @param string $boleta
     *
     * @return Modelo
     */
    public function setBoleta($boleta)
    {
        $this->boleta = $boleta;

        return $this;
    }

    /**
     * Get boleta
     *
     * @return string
     */
    public function getBoleta()
    {
        return $this->boleta;
    }
}
