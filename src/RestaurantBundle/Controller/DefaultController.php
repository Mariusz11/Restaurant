<?php

namespace RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SMSApi\Client;
use SMSApi\Api\SmsFactory;
use SMSApi\Exception\SmsapiException;

class DefaultController extends Controller
{
//    /**
//     * @Route("/test")
//     */
//    public function indexAction()
//    {
//       // $client = Client::createFromToken('8f1vM6Z8PNse5uPmMfaD9AcjBwTG68qHpb4UH90e');
//$login = $this->getParemeter('smsapilogin');
//$password = $this->getParameter('smsapipassword')
////Lub wykorzystując login oraz hasło w md5
//$client = new Client($login);
//$client->setPasswordHash(md5($password));
//
//        $smsapi = new SmsFactory;
//        $smsapi->setClient($client);
//
//        try {
//            $actionSend = $smsapi->actionSend();
//
//            $actionSend->setTo('519439744');
//            $actionSend->setText('');
//            //$actionSend->setSender('info'); //Pole nadawcy, lub typ wiadomości: 'ECO', '2Way'
//
//            $response = $actionSend->execute();
//
//            foreach ($response->getList() as $status) {
//                dump($status->getNumber() . ' ' . $status->getPoints() . ' ' . $status->getStatus());
//            }
//        } catch (SmsapiException $exception) {
//            dump('ERROR: ' . $exception->getMessage());
//        }return $this->render('RestaurantBundle:Default:index.html.twig');
//    }
}
