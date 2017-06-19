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
     * @Route("/createComment", name="createComment")
     */
    public function createCommentAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $comment = $form->getData();
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $comment->setUser($user);
            $comment->setDate();

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return new Response('Dodałeś komentarz');
        }
        return $this->render('BoardBundle:Comment:create_comment.html.twig', array('form' => $form->createView()));
    }
}