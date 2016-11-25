<?php

namespace Novamoda\MayorBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Date;

class TokenController extends BaseController
{


    /**
     * @Rest\Post("/")
     * @param Request $request
     * @return mixed
     */
    public function postTokenAction(Request $request)
    {
        $servicio= $this->get('mayorbundle.autenticacion_service');
        $array = $request->request->all();
        $result = $servicio->generarTokenPorUsuario($array);
        return $result;
    }
}
