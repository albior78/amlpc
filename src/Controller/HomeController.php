<?php

namespace App\Controller;

use App\Entity\Carouselhome;
use App\Entity\Message;
use App\Repository\CarouselhomeRepository;
use App\Repository\MessageRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(CarouselhomeRepository $repo, Request $request): Response
    {
        //Carousel homepage
        $carouselhomes = $repo->findby(["active"=>1]);

        return $this->render('home/home.html.twig', [
            'carouselhomes' => $carouselhomes
        ]);
    }
    /**
     * @Route("/home/message", name="message", methods={"GET","POST"})
     */
    public function newMessage(MessageRepository $repo, Request $request, EntityManagerInterface $man, Message $message = null): Response
    {
        //recup message
        if(!$message)
        {
            $message = new Message;
        }
        if ($request->request->count() > 0)
        {
            
            $message->setNom($request->request->get('nom'))
                    ->setPrenom($request->request->get('prenom'))
                    ->setEmail($request->request->get('email'))
                    ->setTel($request->request->get('tel'))
                    ->setQuestion($request->request->get('question'))
                    ->setDatetime(new DateTime());
            if (!$message->getId()) 
            {
                $msg = "Votre message a bien été envoyé !!";
            }
            $man->persist($message);
            $man->flush();
            $this->addFlash('warning', $msg);
            return $this->redirectToRoute('message');
        }
        return $this->render('home/message.html.twig', [   
        ]);
    }
}
