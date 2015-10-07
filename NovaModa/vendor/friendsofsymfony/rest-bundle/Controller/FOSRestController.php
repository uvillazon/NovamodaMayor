<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Base Controller for Controllers using the View functionality of FOSRestBundle.
 *
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 */
abstract class FOSRestController extends Controller
{
    /**
     * Creates a view.
     *
     * Convenience method to allow for a fluent interface.
     *
     * @param mixed $data
     * @param int   $statusCode
     * @param array $headers
     *
     * @return View
     */
    protected function view($data = null, $statusCode = null, array $headers = [])
    {
        return View::create($data, $statusCode, $headers);
    }

    /**
     * Creates a Redirect view.
     *
     * Convenience method to allow for a fluent interface.
     *
     * @param string $url
     * @param int    $statusCode
     * @param array  $headers
     *
     * @return View
     */
    protected function redirectView($url, $statusCode = Response::HTTP_FOUND, array $headers = [])
    {
        return View::createRedirect($url, $statusCode, $headers);
    }

    /**
     * Creates a Route Redirect View.
     *
     * Convenience method to allow for a fluent interface.
     *
     * @param string $route
     * @param mixed  $parameters
     * @param int    $statusCode
     * @param array  $headers
     *
     * @return View
     */
    protected function routeRedirectView($route, array $parameters = [], $statusCode = Response::HTTP_CREATED, array $headers = [])
    {
        return View::createRouteRedirect($route, $parameters, $statusCode, $headers);
    }

    /**
     * Converts view into a response object.
     *
     * Not necessary to use, if you are using the "ViewResponseListener", which
     * does this conversion automatically in kernel event "onKernelView".
     *
     * @param View $view
     *
     * @return Response
     */
    protected function handleView(View $view)
    {
        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
