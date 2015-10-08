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
    public function __construct(\Doctrine\ORM\EntityManager $em ){

        $this->em = $em;
    }

    /***
     * @param \Novamoda\MayorBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Novamoda\MayorBundle\Model\ResultPaginacion
     */
    public function obtenerProformasPaginado($paginacion,$array){

        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('NovamodaMayorBundle:Proformas');
        $query = $repo->createQueryBuilder('alr');
        $query = $repo->filtrarDatos($query,$array);
        if(!is_null($paginacion->contiene)){
            $query = $repo->consultaContiene($query,["nombre","almacen","marca","responsable","nro_factura"],$paginacion->contiene);
        }
        $result->total=$repo->total($query);
        if(!$paginacion->isEmpty()){
            $query = $repo->obtenerElementosPaginados($query,$paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;

        return $result;
    }

    public function guardarProforma($archivo, $data){

//        var_dump($data);
        var_dump($archivo[0]);
        $file = new \SplFileObject($archivo[0]["url_archivo"]);
        $reader = new CsvReader($file);
//        $reader->setHeaderRowNumber(0);
        $row = $reader->getFields();
        var_dump($row);
        foreach ($reader as $row) {
            var_dump($row);die();
            // $row will be an array containing the comma-separated elements of the line:
            // array(
            //   0 => 'James',
            //   1 => 'Bond'
            //   etc...
            // )
        }

        return null;
    }

}