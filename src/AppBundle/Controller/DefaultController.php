<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/app/rawresponse", name="raw_response")
     */
    public function rawAction()
    {
        return new Response('This is a raw response from inside controller');
    }

    /**
     * @Route("/app/hello/{name}", name="hello")
     */
    public function helloAction($name)
    {
        return $this->render('default/hello.html.twig', array(
            'name' => $name
        ));
    }

    /**
     * @Route("/app/json", defaults={"_format"="json"}, name="json")
     */
    public function jsonAction()
    {
        $test = array("format"=>"json");
        return new Response(json_encode($test));
    }

    /**
     * @Route("/app/format.{_format}",
     *          defaults={"_format"="html"},
     *          requirements = { "_format" = "html|xml|json" },
     *          name="format"
     * )
     */
    public function formatAction($_format)
    {
        return $this->render('default/format.'.$_format.'.twig');
    }

    /**
     * @Route("/app/engine", name="engine")
     * @Template(engine="php")
     */
    public function engineAction()
    {
        return array("lingua"=>"italiano");
    }

}
