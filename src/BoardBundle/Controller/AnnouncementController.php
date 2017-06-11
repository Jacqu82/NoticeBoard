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
     * @Route("/createAnn")
     */
    public function createAction(Request $request)
    {
        $announcement = new Announcement();
        $form = $this->createForm(AnnouncementType::class, $announcement);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $announcement = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($announcement);
            $em->flush();

            return new Response('Dodałeś ogłoszenie');
        }
        return $this->render('BoardBundle:Announcement:create.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/show")
     * @template("BoardBundle:Announcement:show.html.twig")
     */
    public function showAction()
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->findAll();
        if (!$announcement) {
            throw new NotFoundHttpException('Nie znaleziono żadnych ogłoszeń');
        }
        return ['announcements' => $announcement];
    }

    /**
     * @Route("/edit")
     */
    public function editAction()
    {
        

        return $this->render('BoardBundle:Announcement:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('BoardBundle:Announcement:delete.html.twig', array(
            // ...
        ));
    }

}
