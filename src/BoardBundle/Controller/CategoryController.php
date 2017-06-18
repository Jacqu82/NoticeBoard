<?php

namespace BoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BoardBundle\Entity\Category;
use BoardBundle\Form\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{

    /**
     * @Route("/createCat", name="createCategory")
     */
    public function createAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return new Response('Dodałeś kategorię');
        }
        return $this->render('BoardBundle:Category:create_category.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/showAllCategories", name="showAllCategories")
     * @Method("GET")
     * @Template("BoardBundle:Category:showAll.html.twig")
     */
    public function showAllCategoriesAction()
    {
        $categoryRepository = $this->getDoctrine()->getRepository('BoardBundle:Category');
        $category = $categoryRepository->findAll();
        if (!$category) {
            throw new NotFoundHttpException('Nie znaleziono kategorii');
        }
        return ['categories' => $category];
    }

}
