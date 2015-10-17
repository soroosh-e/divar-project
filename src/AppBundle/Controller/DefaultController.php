<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/admin")
     */
    public function adminPageAction() {

        return $this->render("default/admin.html.twig");
    }

    /**
     * @Route("/admin/add-category")
     */
    public function addCategoryAction(Request $request) {
        $category = new \AppBundle\Entity\Category();
        $form = $this->createFormBuilder($category)
                ->add("name")
                ->add("description")
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $cat = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
        }
        $show = $this->getDoctrine()->getRepository("AppBundle:Category")->findAll();

        return $this->render("default/add-category.html.twig", array("form" => $form->createView(), "show" => $show));
    }

    /**
     * @Route("/admin/add-city")
     */
    public function addCityAction(Request $request) {
        $city = new \AppBundle\Entity\City();
        $form = $this->createFormBuilder($city)
                ->add("name")
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $city = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
            $em->flush();
        }

        $show = $this->getDoctrine()->getRepository("AppBundle:City")->findAll();

        return $this->render("default/add-city.html.twig", array("form" => $form->createView(), "show" => $show));
    }

    /**
     * @Route("/admin/add-area")
     * 
     */
    public function addAreaAction(Request $request) {
        $area = new \AppBundle\Entity\Area();
        $form = $this->createFormBuilder($area)
                ->add("name")
                ->add("city")
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $area = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($area);
            $em->flush();
        }

        $show = $this->getDoctrine()->getRepository("AppBundle:Area")->findAll();
        return $this->render("default/add-area.html.twig", array("form" => $form->createView(), "show" => $show));
    }

}
