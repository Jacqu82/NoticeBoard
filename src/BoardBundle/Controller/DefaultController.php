<?php

namespace BoardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BoardBundle:Default:base.html.twig', ['data' => [
            'userName' => $this->getUser(),
        ]]);
    }

    /**
     * @Route("showAllUsers", name="showAllUsers")
     * @Method("GET")
     * @Template("BoardBundle:User:showAllUsers.html.twig")
     */
    public function showAllUsersAction()
    {
        $userRepository = $this->getDoctrine()->getRepository('BoardBundle:User');
        $user = $userRepository->findAll();
        if (!$user) {
            throw new NotFoundHttpException('Nie znaleziono usera');
        }
        return ['users' => $user];
    }
}
