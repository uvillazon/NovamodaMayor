<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:01
 */
namespace Novamoda\MayorBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;
use Novamoda\MayorBundle\Entity\DetallesProforma;
use Novamoda\MayorBundle\Entity\Repository\BaseRepository;

/**
 * ProformasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DetallesProformaRepository extends BaseRepository
{
    public function guardarDetalle($data , $proforma){
        $result ="";
//        var_dump($data);
        try{
            $detalle = new DetallesProforma();
            $detalle->setColumna($data["columna"]);
            $detalle->setIdProforma($data["id_proforma"]);
            $detalle->setFila($data["fila"]);
            $detalle->setValor($data["valor"]);
            $detalle->setProforma($proforma);

//            var_dump($detalle);die();
            $this->_em->persist($detalle);
//            $this->_em->flush();
            $result= $detalle->getIdDetalle();
        }
        catch(\Exception $e){
            $result = $e->getMessage();
        }
        return $result;
    }
}
