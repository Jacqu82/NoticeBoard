<?php

namespace BoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BoardBundle\Entity\Announcement;
use BoardBundle\Form\AnnouncementType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AnnouncementController extends Controller
{
    /**
     * @Route("/createAnn", name="create")
     */
    public function createAction(Request $request)
    {
        $announcement = new Announcement();
        $form = $this->createForm(AnnouncementType::class, $announcement);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $announcement = $form->getData();
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $announcement->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($announcement);
            $em->flush();

            return new Response('Dodałeś ogłoszenie');
        }
        return $this->render('BoardBundle:Announcement:create.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/show", name="showAll")
     * @template("BoardBundle:Announcement:show.html.twig")
     */
    public function showAllAction()
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->findAll();
        if (!$announcement) {
            throw new NotFoundHttpException('Nie znaleziono żadnych ogłoszeń');
        }
        return ['announcements' => $announcement];
    }

    /**
     * @Route("/show_details/{id}", name="show_details")
     * @template("BoardBundle:Announcement:show_details.html.twig")
     */
    public function showAction($id)
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->find($id);
        if (!$announcement) {
            return new Response('Ogłoszenie o '.$id.' nie istnieje');
        }
        return ['announcement' => $announcement];
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editAction(Request $request, $id)
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->find($id);

        $announcementUser = $announcement->getUser();
        $loggedUser = $this->get('security.token_storage')->getToken()->getUser();


        if ($announcementUser != $loggedUser) {
            return new Response('Nie możesz edytować tego ogłoszenia');
        }

        $form = $this->createForm(AnnouncementType::class, $announcement);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $announcement = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($announcement);
            $em->flush();

            return new Response('Zmodyfikowałeś ogłoszenie');
        }
        if (!$announcement) {
            return new Response('Nie ma takiego ogłoszenia!');
        }
        return $this->render('BoardBundle:Announcement:edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $announcement = $em->getRepository('BoardBundle:Announcement')->find($id);

        $announcementUser = $announcement->getUser();
        $loggedUser = $this->get('security.token_storage')->getToken()->getUser();

        if ($announcementUser != $loggedUser) {
            return new Response('Nie możesz usunąć tego ogłoszenia');
        }

        if (!$announcement) {
            throw new NotFoundHttpException('Nie ma ogłoszenia o takim id!');
        }
        $em->remove($announcement);
        $em->flush();

        return new Response('Pomyślnie usunołeś ogłoszenie');
    }

}
