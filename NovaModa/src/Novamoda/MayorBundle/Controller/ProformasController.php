<?php

namespace Novamoda\MayorBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Novamoda\MayorBundle\Model\CsvModel;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

    /**
     * lista de Modelos paginados formato de paginacion
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
     *   description = "Obtener Lista de Modelos",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getModelosAction(Request $request)
    {
        $paginacion = $this->obtenerPaginacion($request);
        /**
         * @var \Novamoda\MayorBundle\Services\ProformasService $servicio
         */
        $servicio = $this->get('mayorbundle.proformas_service');
        $array = $request->query;
        $result = $servicio->obtenerModelos($array->get('id_proforma'));
        return $result;
    }

    /**
     * Este Metodo Guarda una Proforma
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Guardar Proforma",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postProformasAction(Request $request)
    {
        $data = $request->request->all();
        $csv = new CsvModel($request->files);
        $servicio = $this->get('mayorbundle.proformas_service');
        $valid = $csv->isValid();
        if ($valid->success) {
            $result = $servicio->guardarProforma($csv->getArchivos(), $data);
        } else {
            $result = $valid;
        }
        return $result;
    }

    /**
     * Este Recupera todos los datos de profomrmas
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener datos Proforma",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postProformaAction($id)
    {
        $servicio = $this->get('mayorbundle.proformas_service');

        $result = $servicio->obtenerProformaPorId($id);
        return $result;
    }


    /**
     * Este Metodo Guarda un Detalle
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Guardar DEtalle",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postDetallesAction(Request $request)
    {
        $data = $request->request->all();
//        $result = array("success" => true, "msg" => "Archivos no validos");
//        return $result;
//        var_dump($data);die();

        $servicio = $this->get('mayorbundle.proformas_service');

        $result = $servicio->actualizarDetalle($data);

        return $result;
    }

    /**
     * Este Metodo Guarda un Detalle
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Guardar DEtalle",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postAsignarAction(Request $request)
    {
        $data = $request->request->all();
        $j = json_decode($data["detalles"]);
        $servicio = $this->get('mayorbundle.proformas_service');
        foreach ($j as $detalle) {
            $result = $servicio->actualizarDetalle(array("columna" => "CLIENTE", "fila" => $detalle->fila, "valor" => $data["cliente"], "id_proforma" => $data["id_proforma"]));
            $result = $servicio->actualizarDetalle(array("columna" => "VENDEDOR", "fila" => $detalle->fila, "valor" => $data["vendedor"], "id_proforma" => $data["id_proforma"]));
        }
        return $result;
    }

    /**
     * lista de Modelos paginados formato de paginacion
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
     *   description = "Obtener Lista de Modelos",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getCodigosBarrasAction(Request $request)
    {

        $servicio = $this->get('mayorbundle.proformas_service');
        $array = $request->query;
        $result = $servicio->obtenerDetallesCaja($array->get('id_proforma'),$array->get('fila'));
        return $result;
    }

    /**
     * Este Metodo Guarda Codigos de Barra
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Guardar DEtalle",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postCodigosAction(Request $request)
    {
        $data = $request->request->all();
//        var_dump($data);die();
        $detalles = json_decode($data["detalles"]);
        $servicio = $this->get('mayorbundle.proformas_service');
        $result = $servicio->guardarCodigosBarra($data["id_proforma"],$data["fila"],$detalles);

//        foreach ($j as $detalle) {
//            $result = $servicio->actualizarDetalle(array("columna" => "CLIENTE", "fila" => $detalle->fila, "valor" => $data["cliente"], "id_proforma" => $data["id_proforma"]));
//            $result = $servicio->actualizarDetalle(array("columna" => "VENDEDOR", "fila" => $detalle->fila, "valor" => $data["vendedor"], "id_proforma" => $data["id_proforma"]));
//        }
        return $result;
    }

    /**
     * Este Metodo Guarda Codigos de Barra
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @ApiDoc(
     *   resource = true,
     *   description = "Guardar DEtalle",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function postEliminarAction(Request $request)
    {
        $data = $request->request->all();
        $servicio = $this->get('mayorbundle.proformas_service');
        $result = $servicio->eliminarProforma($data["id_proforma"]);
        return $result;
    }

//eliminarProforma

}
