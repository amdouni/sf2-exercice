<?php

namespace ExerciseBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use ExerciseBundle\Entity\Knight;
use ExerciseBundle\Form\KnightFormType;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Validator\Exception\ValidatorException;

/**
 * Class KnightController
 * @package ExerciseBundle\Controller
 */

class KnightController extends FOSRestController
{



    public function postKnightAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $knight = new Knight;

        $form = $this->createForm(new KnightFormType, $knight);

        $form->submit($data);

        $form->handleRequest($request);


        if (!$form->isValid()) {
            $data = array(
                'code' => 400,
                'message' => 'Invalid data'
            );
            $view = $this->view($data, 400);
            return $this->handleView($view);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($knight);
        $em->flush();

        $view = $this->view($knight, 201);
        return $this->handleView($view);

    }

    /**
     * Get all Knights
     *
     * @return array
     */
    public function getKnightsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $knights = $em->getRepository('ExerciseBundle:Knight')->findAll();

        $view = $this->view($knights, 200);

        return $this->handleView($view);
    }

    /**
     * Get knight by id
     *
     * @return object
     */
    public function getKnightAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $knight = $em->getRepository('ExerciseBundle:Knight')->find($id);

        if (!isset($knight)) {
            throw new ResourceNotFoundException("Knight #" . $id . " not found.");
        }

        $view = $this->view($knight, 200);

        return $this->handleView($view);
    }

    public function getKnightHandler()
    {
        return $this->knightHandler = $this->get('exercise.knight.handler');
    }

}