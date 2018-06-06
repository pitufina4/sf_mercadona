<?php

namespace App\Controller;


use App\Entity\Producto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;



/**
* @Route("/tienda")
*/
class TiendaController extends Controller
{

	/**
     * @Route("/", name="tienda_home")
     */
    public function listadoProducto()
    {
        $repo = $this-> getDoctrine()->getRepository(Producto::class);
        $productos = $repo->findAll();
dump($productos);
        return $this->render ('tienda/index.html.twig', [
            'productos' => $productos,
        ]);
    }



	/**
     * @Route("/jsonlist", name="tienda_jsonlist")
     */
    public function jsonClientes()
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $serializer = new Serializer(array($normalizer), array($encoder));

        $repo = $this->getDoctrine()->getRepository(Producto::class);
        $productos = $repo->findAll();
        $jsonClientes = $serializer->serialize($productos, 'json');        

        $respuesta = new Response($jsonProductos);

        return $respuesta;

    }


}
