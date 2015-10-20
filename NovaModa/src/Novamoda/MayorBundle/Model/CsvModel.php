<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 08/10/2015
 * Time: 16:58
 */

namespace Novamoda\MayorBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;


class CsvModel
{
    /**
     * @var array
     */
    private $archivos = array();
    private $files;

    /**
     * @param FileBag $files
     */
    public function __construct($files)
    {
        $this->files = $files;
        $directory = "uploads/";
        if (count($files) > 0) {
            /**
             * @var UploadedFile $uploadedFile
             */
            foreach ($files as $uploadedFile) {
                if (file_exists($directory . "" . $uploadedFile->getClientOriginalName())) {
                    unlink($directory . "" . $uploadedFile->getClientOriginalName());
                }
                $tipoArchivo = $uploadedFile->getClientMimeType();
                $file = $uploadedFile->move($directory, $uploadedFile->getClientOriginalName());
                array_push($this->archivos, array("nombre_archivo" => $file->getFilename(), "tipo_archivo" => $tipoArchivo, "extension" => $file->getExtension(), "url_archivo" => $file->getRealPath()));
            }
        }
    }

    public function getArchivos()
    {
        return $this->archivos;
    }

    /**
     * @return RespuestaSP
     */
    public function isValid()
    {
        $result = new \Novamoda\MayorBundle\Model\RespuestaSP();
        $result->success = false;
        foreach ($this->archivos as $file) {
            if ($file["tipo_archivo"] === "application/vnd.ms-excel") {
                $result->success = true;
            } else {
                $result->success = false;
                $this->eliminarArchivos();
                $result->msg = "Archivo No valido ".$file["tipo_archivo"];
                break;
            }
        }
        return $result;
    }
    public function eliminarArchivos(){
        foreach ($this->archivos as $file ) {
            unlink($file["url_archivo"]);
        }
    }
    /**
     * @param UploadedFile $file
     * @return bool
     */
//    public function esArchivoCsv($file){
////        var_dump($file->getMimeType());die();
//        if($file->getMimeType() === "application/vnd.ms-excel"){
//            $this->isValid = true;
//        }
//        else{
//            $this->isValid = false;
//        }
//        return $this->isValid;
//
//    }

}