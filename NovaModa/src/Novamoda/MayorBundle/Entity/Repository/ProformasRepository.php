<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:01
 */
namespace Novamoda\MayorBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;
use Novamoda\MayorBundle\Entity\Proformas;
use Novamoda\MayorBundle\Entity\Repository\BaseRepository;

/**
 * ProformasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProformasRepository extends BaseRepository
{

    /**
     * @param $data
     * @return int|string
     */
    public function guardarProforma($data,$archivo){
        $result = "0";
        try{
//            var_dump($data);
            $date = date_create_from_format('d/m/Y', $data["fecha"]);
//            var_dump($date);
            $proforma = new Proformas();
            $proforma->setAlmacen($data["almacen"]);
            $proforma->setIdAlmacen($data["idalmacen"]);
            $proforma->setIdMarca($data["idmarca"]);
            $proforma->setNombreArchivo($archivo["nombre_archivo"]);
            $proforma->setTipoArchivo($archivo["tipo_archivo"]);
            $proforma->setUrlArchivo($archivo["url_archivo"]);
            $proforma->setMarca($data["marca"]);
            $proforma->setEstado("NUEVO");
            $proforma->setNombre($data["nombre"]);
            $proforma->setNroFactura($data["nro_factura"]);
            $proforma->setFecha($date);
//        $proforma->set
            $this->_em->persist($proforma);
            $this->_em->flush();
            $result = $proforma->getIdProforma();
        }
        catch(\Exception $e){

//            var_dump($e);
            $result = $e->getMessage();
        }
       return $result;
    }
}
