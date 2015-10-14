<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:01
 */
namespace Novamoda\MayorBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Novamoda\MayorBundle\Entity\ProformaCodbarras;
use Novamoda\MayorBundle\Entity\Repository\BaseRepository;

/**
 * ProformasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProformaCodbarrasRepository extends BaseRepository
{
    public function guardarDetallesCodBarra($idProforma, $fila, $detalles)
    {

        var_dump($detalles);
        try {
            foreach ($detalles as $detalle) {
                $det = new ProformaCodbarras();
                $det->setCodigobarra($detalle->codigobarra);
                $det->setCantidad($detalle->cantidad);
                $det->setTalla($detalle->talla);
                $det->setFila($fila);
                $det->setIdProforma($idProforma);
                $this->_em->persist($det);

            }
            $this->_em->flush();
            return $idProforma;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
