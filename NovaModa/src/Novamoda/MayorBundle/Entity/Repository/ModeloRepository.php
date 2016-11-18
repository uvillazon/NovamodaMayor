<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:01
 */
namespace Novamoda\MayorBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Novamoda\MayorBundle\Entity\Modelo;
use Novamoda\MayorBundle\Entity\Repository\BaseRepository;

/**
 * ProformasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModeloRepository extends BaseRepository
{
    public function guardarModelo($idProforma, $datos)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        try {
            $numero = $this->obtenerMaximo("numero") + 1;
            $modelo = new Modelo();
            $modelo->setIdmodelo("m-" . $numero);
            $modelo->setNumero($numero);
            $modelo->setIdmodelodetalle("mod-" . $numero);
            $modelo->setIdingreso($idProforma);
            $modelo->setBoleta($datos["id_proforma"]);
            $modelo->setCliente($datos["cliente"]);
            $modelo->setFechaingreso($datos["fechaIngreso"]);
            $modelo->setIdmarca($datos["idmarca"]);
            $modelo->setIdcliente($datos["idcliente"]);
            $modelo->setIdvendedor($datos["idvendedor"]);
            $modelo->setCodigo($datos["codigo"]);
            $modelo->setIdcoleccion("col-37");
            $modelo->setCliente($datos["item"]);
            $modelo->setTalla(" ");
            $modelo->setFecha(new \DateTime());
            $modelo->setHora(new \DateTime());
            $modelo->setColor($datos["color"]);
            $modelo->setMaterial($datos["material"]);
            $modelo->setNumeroparesfila($datos["total"]);
            $modelo->setTotalparescaja($datos["total"]);
            $modelo->setPrecioventa($datos["precio_venta"]);
            $modelo->setPreciounitario($datos["precio_unitario"]);
            $modelo->setIdalmacen($datos["idalmacen"]);
            $this->_em->persist($modelo);
            $this->_em->flush();
            $result->success = true;
            $result->id = $modelo->getIdmodelo();

        } catch (\Exception $e) {
            $result->success = false;
            $result->msg = $e->getMessage();

        }
        return $result;
//        var_dump($datos);die();
//
//
//        var_dump($numero);di/e();

    }

//    /**
//     * @param $data
//     * @return int|string
//     */
//    public function guardarProforma($data){
//        $result = "0";
//        try{
////            var_dump($data);
//            $date = date_create_from_format('d/m/Y', $data["fecha"]);
////            var_dump($date);
//            $proforma = new Proformas();
//            $proforma->setAlmacen($data["almacen"]);
//            $proforma->setMarca($data["marca"]);
//            $proforma->setEstado("NUEVO");
//            $proforma->setNombre($data["nombre"]);
//            $proforma->setNroFactura($data["nro_factura"]);
//            $proforma->setFecha($date);
////        $proforma->set
//            $this->_em->persist($proforma);
//            $this->_em->flush();
//            $result = $proforma->getIdProforma();
//        }
//        catch(\Exception $e){
//
////            var_dump($e);
//            $result = $e->getMessage();
//        }
//       return $result;
//    }
}
