<?php

namespace RestaurantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RestaurantBundle\Entity\Customer;
use RestaurantBundle\Form\CustomerType;
use RestaurantBundle\Entity\Orders;

class ClientController extends Controller
{
    /**
     * Lists all Product entities.
     *
     * @Route("/index", name="client_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('RestaurantBundle:Product')->findAll();



        if ($request->isMethod('POST')) {

            $order = new Orders();
            $order->setProduct($em->getRepository
            ('RestaurantBundle:Product')->find($_POST['product']));

            $order->setCustomer($em->getRepository
            ('RestaurantBundle:Customer')->find($_POST['customer']));

            $order->setProductQuantity($_POST['quantity']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('RestaurantBundle:client:client.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * Lists all Orders entities.
     *
     * @Route("/", name="order_client")
     * @Method("GET")
     */
    public function orderClientAction()
    {
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository('RestaurantBundle:Orders')->findAll();


        return $this->render('RestaurantBundle:client:order_client.html.twig', array(
            'orders' => $orders,
        ));
    }

}
