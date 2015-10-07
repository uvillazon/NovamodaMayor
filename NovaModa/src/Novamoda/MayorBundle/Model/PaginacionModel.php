<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:05
 */

namespace Novamoda\MayorBundle\Model;


class PaginacionModel
{

    public $dir;
    public $limit;
    public $page;
    public $sort;
    public $start;
    public $condicion;
    public $contiene;
    public $startDate;
    public $endDate;

    /**
     * @return bool
     */
    public function isEmpty(){
        $result= true;
        foreach ( $this as $prop =>  $val ) {
            if(!is_null($val)){
                $result=false;
                break;
            }
        }
        return $result;
    }
}