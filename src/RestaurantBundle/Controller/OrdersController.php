<?php

namespace RestaurantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RestaurantBundle\Entity\Orders;
use RestaurantBundle\Form\OrdersType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Orders controller.
 *
 * @Route("/orders")
 */
class OrdersController extends Controller
{
    /**
     * Lists all Orders entities.
     *
     * @Route("/", name="orders_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('RestaurantBundle:Orders')->findAll();

        return $this->render('RestaurantBundle:orders:index.html.twig', array(
            'clients' => $clients,
        ));
    }




    /**
     * Displays a form to edit an existing Orders entity.
     *
     * @Route("/{id}/edit", name="orders_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction($id)
    {

            $em = $this->getDoctrine()->getManager();
            $order = $em->getRepository('RestaurantBundle:Customer')->find($id);
            $order->setStatus('ok');
            $em->persist($order);
            $em->flush();

            $clients = $em->getRepository('RestaurantBundle:Orders')->findAll();

        return $this->render('RestaurantBundle:orders:index.html.twig', array(
            'clients' => $clients));
    }

    /**
     * Deletes a Orders entity.
     *
     * @Route("/{id}", name="orders_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository
        ('RestaurantBundle:Orders')->find($id);


        $em->remove($product);
        $em->flush();

        return new Response('Usunięto o id:' . $id);
    }


}
