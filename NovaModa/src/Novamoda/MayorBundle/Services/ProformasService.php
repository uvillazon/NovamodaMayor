<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:11
 */

namespace Novamoda\MayorBundle\Services;

use Doctrine\ORM\EntityManager;
use Novamoda\MayorBundle\Entity;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Ddeboer\DataImport\Reader\CsvReader;

class ProformasService
{
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
    }

    /***
     * @param \Novamoda\MayorBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Novamoda\MayorBundle\Model\ResultPaginacion
     */
    public function obtenerProformasPaginado($paginacion, $array)
    {

        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('NovamodaMayorBundle:Proformas');
        $query = $repo->createQueryBuilder('alr');
        $query = $repo->filtrarDatos($query, $array);
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["nombre", "almacen", "marca", "responsable", "nro_factura"], $paginacion->contiene);
        }
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;

        return $result;
    }

    public function guardarProforma($archivo, $data)
    {

        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        try {
            $repo = $this->em->getRepository('NovamodaMayorBundle:Proformas');
            $repoDet = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');
            $idProforma = $repo->guardarProforma($data);
            if (is_numeric($idProforma)) {
                $file = new \SplFileObject($archivo[0]["url_archivo"]);
                $reader = new CsvReader($file, ";");
                $proforma = $repo->find($idProforma);

                foreach ($reader as $key => $value) {
                    foreach ($value as $key1 => $value1) {
                        $repoDet->guardarDetalle(array("columna" => $key1, "fila" => $key, "valor" => $value1, "id_proforma" => $idProforma),$proforma);
//                        var_dump($res);
                    }

                }
                $this->em->flush();
                $result->msg = "proceso Ejecutado Correctamente";
                $result->success = true;


            } else {
                $result->msg = $idProforma;
                $result->success = false;
            }
        } catch (\Exception $e) {
            $result->msg = $e->getMessage();
            $result->success = false;
        }
        return $result;
    }

}