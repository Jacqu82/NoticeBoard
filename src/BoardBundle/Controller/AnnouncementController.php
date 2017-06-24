<?php

namespace BoardBundle\Controller;

use BoardBundle\BoardBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\File\File;
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

            $file = $announcement->getPhotoPath();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('path_directory'),
                $fileName);
            $announcement->setPhotoPath($fileName);

            $validator = $this->get('validator');
            $errors = $validator->validate($announcement);
            if (count($errors) > 0) {
                return $this->render('BoardBundle:Announcement:create.html.twig', array('errors' => $errors));
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($announcement);
            $em->flush();

            return $this->redirectToRoute('showAll', array('id' => $announcement->getId()));
        }
        return $this->render('BoardBundle:Announcement:create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/show", name="showAll")
     */
    public function showAllAction()
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->findBy(array(), array('id' => 'DESC'));
        if (!$announcement) {
            throw new NotFoundHttpException('Nie znaleziono żadnych ogłoszeń');
        }
        return $this->render('BoardBundle:Announcement:show.html.twig', array('announcements' => $announcement));
    }

    /**
     * @Route("/show_details/{id}", name="show_details")
     */
    public function showAction($id)
    {
        $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $announcement = $announcementRepository->find($id);
        if (!$announcement) {
            return new Response('Ogłoszenie o ' . $id . ' nie istnieje');
        }
        return $this->render('BoardBundle:Announcement:show_details.html.twig', array('announcement' => $announcement));
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

        $form = $this->createForm(new AnnouncementType(), $announcement, array(
            'noPhoto' => true
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($announcementUser != $loggedUser) {
                return new Response('Nie możesz edytować tego ogłoszenia!');
            }

            $validator = $this->get('validator');
            $errors = $validator->validate($announcement);
            if (count($errors) > 0) {
                return $this->render('BoardBundle:Announcement:edit.html.twig', array('errors' => $errors,
                    'announcement' => $announcement));
            }

            $announcement = $form->getData();
            $file = $announcement->getPhotoPath();
            $announcement->setPhotoPath($file);
            $em = $this->getDoctrine()->getManager();
            $em->persist($announcement);
            $em->flush();

            return $this->redirectToRoute('show_details', array('id' => $announcement->getId()));
        }
        if (!$announcement) {
            return new Response('Nie ma takiego ogłoszenia!');
        }
        return $this->render('BoardBundle:Announcement:edit.html.twig', array('announcement' => $announcement,
            'form' => $form->createView()));
    }

    /**
     * @Route("/switchPhoto/{id}", name="switchPhoto")
     */
    public function switchPhotoAction(Request $request, $id)
    {
        $photoRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
        $photo = $photoRepository->find($id);

        $announcementUser = $photo->getUser();
        $loggedUser = $this->get('security.token_storage')->getToken()->getUser();

        $photoForm = $this->createForm(new AnnouncementType(), $photo, array(
            'noPhoto' => false,
            'justPhoto' => true
        ));

        $photoForm->handleRequest($request);

        if ($photoForm->isSubmitted()) {
            $file = $photo->getPhotoPath();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                $this->getParameter('path_directory'),
                $fileName);
            $photo->setPhotoPath($fileName);

            if ($announcementUser != $loggedUser) {
                return new Response('Nie możesz edytować tego zdjęcia!');
            }

            $photo = $photoForm->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);
            $em->flush();

            return $this->redirectToRoute('show_details', array('id' => $photo->getId()));
        }
        return $this->render('BoardBundle:Announcement:switch_photo.html.twig', array('photo' => $photo,
            'form' => $photoForm->createView()));
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
            return new Response('Nie możesz usunąć tego ogłoszenia!');
        }

        if (!$announcement) {
            throw new NotFoundHttpException('Nie ma ogłoszenia o takim id!');
        }
        $em->remove($announcement);
        $em->flush();

        return $this->redirectToRoute('showAll', array('id' => $announcement->getId()));
    }
}
