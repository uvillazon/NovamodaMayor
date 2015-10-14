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
class MarcasService
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
    public function obtenerMarcasPaginado($paginacion, $array)
    {

        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('NovamodaMayorBundle:Marcas');
        $query = $repo->createQueryBuilder('mar');
        $query = $repo->filtrarDatos($query, $array);
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["nombre", "codigo", "categoria"], $paginacion->contiene);
        }
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;

        return $result;
    }

}