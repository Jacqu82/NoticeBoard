<?php

namespace BoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BoardBundle\Entity\Comment;
use BoardBundle\Form\CommentType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{
    /**
     * @Route("/createComment/{id}", name="createComment")
     */
    public function createCommentAction(Request $request, $id)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $comment = $form->getData();
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $comment->setUser($user);
            $announcementRepository = $this->getDoctrine()->getRepository('BoardBundle:Announcement');
            $announcement = $announcementRepository->find($id);
            $comment->setAnnouncement($announcement);
            $comment->setDate();

            $validator = $this->get('validator');
            $errors = $validator->validate($comment);
            if (count($errors) > 0) {
                return $this->render('BoardBundle:Comment:create_comment.html.twig', array('errors' => $errors));
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('show_details', array('id' => $announcement->getId()));
        }
        return $this->render('BoardBundle:Comment:create_comment.html.twig', array('announcement' => $comment,
            'form' => $form->createView()));
    }

    /**
     * @Route("showAllComments", name="showAllComments")
     */
    public function showAllCommentsActon()
    {
        $commentRepository = $this->getDoctrine()->getRepository('BoardBundle:Comment');
        $comment = $commentRepository->findAll();
        if (!$comment) {
            throw new NotFoundHttpException('Brak komentarzy');
        }
        return $this->render('BoardBundle:Announcement:show_details.html.twig', array('comments' => $comment));
    }
}
