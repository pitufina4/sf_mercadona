<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



/**
* @Route("/principal")
*/
class PrincipalController extends Controller
{
    /**
     * @Route("/", name="principal_index")
     */
    public function index()
    {
        return $this->render('principal/index.html.twig');
    }

    /**
     * @Route("/recibirform", name="recibir_formulario")
     */
    public function recibirFormulario(Request $request)
    {
		$codigopostal = $request->request->get('cp');

		if ($codigopostal == '46001') {

			return $this->redirectToRoute ('tienda_home');
		}
		else{
			return $this->redirectToRoute ('principal_index');
		}
    }



}
