<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:21
 */

namespace Novamoda\MayorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Novamoda\MayorBundle\Model\PaginacionModel;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    public function obtenerPaginacion(Request $request)
    {
        $paginacion = new PaginacionModel();
        $paginacion->contiene= $request->query->get('contiene');
        $paginacion->condicion= $request->query->get('condicion');
        $paginacion->dir = $request->query->get('dir');
        $paginacion->sort = $request->query->get('sort');
        $paginacion->limit = $request->query->get('limit');
        $paginacion->start = $request->query->get('start');
        $paginacion->startDate = $request->query->get('startDate');
        $paginacion->endDate = $request->query->get('endDate');
        return $paginacion;
    }

}