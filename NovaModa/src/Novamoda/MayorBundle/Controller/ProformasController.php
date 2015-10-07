<?php

namespace Novamoda\MayorBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ProformasController extends BaseController
{
    public function indexAction()
    {
        return $this->render('NovamodaMayorBundle:Proformas:index.html.twig');
    }

    /**
     * lista de los tipos de Alarma paginados formato de paginacion
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Lista de Tipos de Alarmas",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getProformasAction(Request $request)
    {
        $paginacion = $this->obtenerPaginacion($request);
        /**
         * @var \Novamoda\MayorBundle\Services\ProformasService $servicio
         */
        $servicio = $this->get('mayorbundle.proformas_service');
        $array = $request->query;
        $result = $servicio->obtenerProformasPaginado($paginacion, $array);
        return $result;
    }
}
