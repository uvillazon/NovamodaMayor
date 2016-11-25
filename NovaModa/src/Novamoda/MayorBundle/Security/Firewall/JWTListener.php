<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Novamoda\MayorBundle\Security\Firewall;


use Novamoda\MayorBundle\Security\Authentication\Token\JWTUserToken;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Tests\StringableObject;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Novamoda\MayorBundle\Security\Authentication\Token\WsseUserToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class JWTListener implements ListenerInterface
{
    /**
     * @var $container Container
     */
    protected $container;
    protected $tokenStorage;
    protected $authenticationManager;
    protected $secret = "developmentSessionSecret";

    public function __construct(TokenStorageInterface $tokenStorage, AuthenticationManagerInterface $authenticationManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * This interface must be implemented by firewall listeners.
     *
     * @param GetResponseEvent $event
     */
    public function handle(GetResponseEvent $event)
    {

        $request = $event->getRequest();
        $response = new Response();
        $encoder = str_replace("Bearer ", "", $request->headers->get('Authorization'));
//        var_dump($encoder);
        if (empty($encoder)|| $encoder =="undefined") {
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
            $event->setResponse($response);
        } else {
            try {
               $decoded = JWT::decode($encoder, $this->secret, array('HS256'));
                $token = new JWTUserToken();
                $token->setRawToken($decoded);
                $this->container->set("JWTToken", $token);
                $this->container->set("JWTUser", $decoded->usuario);
                return;
            } catch (\Exception $a) {
                if ($a->getMessage() === "Expired token") {
                    $response->setContent($a->getMessage());
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    $event->setResponse($response);
                } else {
                    $response->setContent($a->getMessage() + " " + $encoder);
                    var_dump($a->getMessage());
                    $response->setStatusCode(Response::HTTP_FAILED_DEPENDENCY);
                    $event->setResponse($response);
                }
            }
        }
    }

    public function setContainer(Container $container = null)
    {
        $this->container = $container;
    }
}