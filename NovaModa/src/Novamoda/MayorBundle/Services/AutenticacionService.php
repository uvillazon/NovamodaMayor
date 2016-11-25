<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 07/10/2015
 * Time: 09:11
 */

namespace Novamoda\MayorBundle\Services;

use Novamoda\MayorBundle\Entity;
use Firebase\JWT\JWT;
use Novamoda\MayorBundle\Model\RespuestaSP;

class AutenticacionService
{
    protected $em;
    protected $repoUsuario;
    protected $key = "developmentSessionSecret";

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
        $this->repoUsuario = $em->getRepository("NovamodaMayorBundle:Usuario");
    }

    public function generarTokenPorUsuario($data)
    {
//        var_dump($data);
        $result = new RespuestaSP();
        try {
            $psw = md5($data["password"]);
//            var_dump($psw);
            /**
             * @var Entity\Usuario $user
             */
            $user = $this->repoUsuario->findOneBy(array("login" => $data["username"], "paswd" => $psw));
            if (!is_null($user)) {
                $usuario = array(
                    "login" => $user->getLogin(),
                    "nombre" => $user->getNombre() . " " . $user->getApellido1() . " " . $user->getApellido2(),
                    "perfil" => $user->getIdrol(),
                    "id_usuario" => $user->getIdusuario(),
                    "estado" => $user->getEstado()
                );
                $token = [
                    "exp" => time() + 3600,
                    "usuario" => $usuario

                ];
                $jwt = JWT::encode($token, $this->key);
                $data = array(
                    "token" => $jwt,
                    "usuario" => $usuario
                );
                $result->success = true;
                $result->data = $data;
                $result->msg = "laaaaaaaaaaaaa contrasena o el usuario es incorrecto.";
            } else {
                $result->success = false;
                $result->msg = "la contrasena o el usuario es incorrecto.";
            }

        } catch (\Exception $e) {
            $result->success = false;
            $result->msg = $e->getMessage();
        }
        return $result;

    }

}