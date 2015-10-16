<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:01
 */
namespace Novamoda\MayorBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Novamoda\MayorBundle\Entity\Kardexdetallepar;
use Novamoda\MayorBundle\Entity\Repository\BaseRepository;

/**
 * ProformasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class KardexdetalleparRepository extends BaseRepository
{
    public function guardarKardexPar($datos, $detalles)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        try {
//            $numero = $this->obtenerMaximo("numero");
            foreach ($detalles as $detalle) {
                $kardex = new Kardexdetallepar();
//                $numero = $numero + 1;
                $kardex->setIdmodelo($datos["idmodelo"]);
                $kardex->setIdkardex($datos["id_kardex"]);
//                $kardex->setNumero($numero);
                $kardex->setIdingreso($datos["id_proforma"]);
                $kardex->setAlmacen($datos["almacen"]);
                $kardex->setIdalmacen($datos["idalmacen"]);
                $kardex->setCodigobarra($detalle->codigobarra);
                $kardex->setCodigobarraean13(substr($detalle->codigobarra, 0, strlen($detalle->codigobarra) - 1));
                $kardex->setTalla($detalle->talla);
                $kardex->setSaldocantidad($detalle->cantidad);
                $kardex->setIdkardexdetalle(" ");
                $kardex->setIdimpresion("13");
                $this->_em->persist($kardex);

            }
            $this->_em->flush();
            $result->success = true;
            $result->id = $kardex->getIdkardexunico();
        } catch (\Exception $e) {
            $result->success = false;
            $result->msg = $e->getMessage();
        }
        return $result;
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
