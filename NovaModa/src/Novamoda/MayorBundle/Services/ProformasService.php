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
use Novamoda\MayorBundle\Entity\DetallesProforma;
use Proxies\__CG__\Novamoda\MayorBundle\Entity\Proformas;
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

    public function obtenerProformaPorId($id)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        $repo = $this->em->getRepository('NovamodaMayorBundle:Proformas');
        $proforma = $repo->find($id);
        if (is_null($proforma)) {
            $result->success = false;
            $result->msg = "No existe el registro";
        } else {
            $result->success = true;
            $result->msg = "Proceso Ejecutado Correctamente";
            $proforma->cargarFecha();
            $result->data = $proforma;
        }
        return $result;

    }

    public function guardarProforma($archivo, $data)
    {

//        var_dump($data);die();
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        try {
            $repo = $this->em->getRepository('NovamodaMayorBundle:Proformas');
            $repoDet = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');
            $idProforma = $repo->guardarProforma($data, $archivo[0]);
            if (is_numeric($idProforma)) {
                $file = new \SplFileObject($archivo[0]["url_archivo"]);
                $reader = new CsvReader($file, ";");
                $proforma = $repo->find($idProforma);

                foreach ($reader as $key => $value) {
                    foreach ($value as $key1 => $value1) {
                        $repoDet->guardarDetalle(array("columna" => $key1, "fila" => $key, "valor" => $value1, "id_proforma" => $idProforma), $proforma);
//                        var_dump($res);
                    }
                    $repoDet->guardarDetalle(array("columna" => $key1 + 1, "fila" => $key, "valor" => $key == 0 ? "CLIENTE" : "", "id_proforma" => $idProforma), $proforma);

                }
                $this->em->flush();
                $result->msg = "proceso Ejecutado Correctamente";
                $result->success = true;
                $result->id = $idProforma;
                $result->data = $proforma;


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

    public function obtenerModelos($idProforma)
    {
        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');

        $rows = $repo->obtenerDetallesPorProforma($idProforma);
        $result->rows = $rows;
        $result->success = true;
        $result->total = count($rows);
        return $result;
    }

    public function obtenerTallas($idProforma, $fila)
    {
        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');

        $rows = $repo->obtenerDetallesTallasPorProforma($idProforma, $fila);
        $result->rows = $rows;
        $result->success = true;
        $result->total = count($rows);
        return $result;
    }

    public function actualizarDetalle($data)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        $repoDet = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');
        $res = $repoDet->actualizarDetalle($data);
        if (is_numeric($res)) {
            $result->success = true;
            $result->msg = "proceso Ejectuado Correctamente";
        } else {
            $result->success = false;
        }
        return $result;

    }

    public function obtenerDetallesCaja($idProforma, $fila)
    {
        $result = new \Novamoda\MayorBundle\Model\ResultPaginacion();
        $repoDet = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');
        $detalles = $repoDet->findBy(array("idProforma" => $idProforma, "fila" => $fila));
        $rows = array();
        foreach ($detalles as $detalle) {

            /**
             * @var DetallesProforma $detalle
             */
//            var_dump($detalle->getValor());
            $talla = $repoDet->esTalla($detalle->getColumna(), $idProforma);
            if (count($talla) > 0) {
                if ($detalle->getValor() > 0) {
                    $cnt = 0;
//                    var_dump($talla);
                    while ($cnt < $detalle->getValor()) {

                        $row = array();
                        $row["cantidad"] = 1;
                        $row["talla"] = $talla["talla"];
                        $row["codigobarra"] = null;
//                        var_dump($row);
                        array_push($rows, $row);
                        $cnt++;
                    }
                }


            }

        }
        $result->rows = $rows;
        $result->total = count($rows);

//        var_dump($idProforma);
//        var_dump($fila);
        return $result;
    }

    public function guardarCodigosBarra($idProforma, $fila, $detalles)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        $repoDet = $this->em->getRepository('NovamodaMayorBundle:ProformaCodbarras');
        $repoModelo = $this->em->getRepository('NovamodaMayorBundle:Modelo');
        $repoKardexCaja = $this->em->getRepository('NovamodaMayorBundle:Kardexcajas');
        $repoKardex = $this->em->getRepository('NovamodaMayorBundle:Kardexdetallepar');
        $repoPro = $this->em->getRepository('NovamodaMayorBundle:Proformas');

        $res = $repoDet->guardarDetallesCodBarra($idProforma, $fila, $detalles);
        if (is_numeric($res)) {
            $this->actualizarDetalle(array("columna" => "ESTADO", "fila" => $fila, "valor" => "1", "id_proforma" => $idProforma));
            $datosAdicionales = $this->obtenerDatosAdicionalesModelo($idProforma, $fila);
            $resModelo = $repoModelo->guardarModelo($idProforma, $datosAdicionales);
            if ($resModelo->success) {
                $datosAdicionales["idmodelo"] = $resModelo->id;
                $resKardexCaja = $repoKardexCaja->guardarKardexCaja($datosAdicionales);
                if ($resKardexCaja->success) {
                    $datosAdicionales["id_kardex"] = $resKardexCaja->id;
//                    var_dump($datosAdicionales);
                    $res = $repoKardex->guardarKardexPar($datosAdicionales, $detalles);
                    $repoPro->cambiarEstado($datosAdicionales);
//                    var_dump($res);
                    $result->success = true;
                    $result->msg = "Proceso Ejectuado Correctamente";
                } else {
                    $result->success = false;
                    $result->msg = $resKardexCaja->msg;
                }
            } else {

                $result->success = false;
                $result->msg = $resModelo->msg;
            }

        } else {
            $result->success = false;
            $result->msg = $res;
        }

//        guardarDetallesCodBarra
        return $result;
    }

    public function obtenerDatosAdicionalesModelo($idProforma, $fila)
    {
        $result = array();
        $repoProforma = $this->em->getRepository('NovamodaMayorBundle:Proformas');
        $repoCliente = $this->em->getRepository('NovamodaMayorBundle:Clientes');
        $repoEmpleado = $this->em->getRepository('NovamodaMayorBundle:Empleados');
        $repoDetalle = $this->em->getRepository('NovamodaMayorBundle:DetallesProforma');
        $proforma = $repoProforma->find($idProforma);
        if (!is_null($proforma)) {
            /**
             * @var Proformas $proforma
             */
            $columnaCliente = $repoDetalle->obtenerColumnaPorEncabezado($idProforma, "CLIENTE");
            $columnaVendedor = $repoDetalle->obtenerColumnaPorEncabezado($idProforma, "VENDEDOR");
            $codCliente = $repoDetalle->findOneBy(array("fila" => $fila, "idProforma" => $idProforma, "columna" => $columnaCliente))->getValor();
            $codVendedor = $repoDetalle->findOneBy(array("fila" => $fila, "idProforma" => $idProforma, "columna" => $columnaVendedor))->getValor();
            $cliente = $repoCliente->findOneBy(array("codigo" => $codCliente));
            $vendedor = $repoEmpleado->findOneBy(array("codigo" => $codVendedor));

            $result["id_proforma"] = $idProforma;
            $result["almacen"] = $proforma->getAlmacen();
            $result["idcliente"] = $cliente->getIdcliente();
//            $result["idalmacen"] = $proforma->getIdAlmacen();
            $result["cliente"] = $codCliente;
            $result["idvendedor"] = $vendedor->getIdempleado();
            $result["vendedor"] = $codVendedor;
            $result["idalmacen"] = $proforma->getIdAlmacen();
            $result["idmarca"] = $proforma->getIdMarca();
            $result["fechaIngreso"] = $proforma->getFecha()->format("m-Y");
            $result["codigo"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "CODIGO");
            $result["color"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "COLOR");
            $result["material"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "MATERIAL");
            $result["pares"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "PARES");
            $result["precio_venta"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "PRECIO VENTA");
            $result["precio_unitario"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "UNITARIO");
            $result["total"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "TOTAL");
            $result["talla"] = $repoDetalle->obtenerValorPorEncabezado($idProforma, $fila, "TALLA");


        }
        return $result;
    }

    public function eliminarProforma($id)
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();

        $repoPro = $this->em->getRepository('NovamodaMayorBundle:Proformas');
        $res = $repoPro->eliminarProforma($id);
        if (is_numeric($res)) {
            $result->success = true;
            $result->msg = "Proceso Ejecutado Correctamente";
        } else {
            $result->success = false;
            $result->msg = $res;
        }
        return $result;
    }

}