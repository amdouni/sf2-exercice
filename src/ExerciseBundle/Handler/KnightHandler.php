<?php

namespace ExerciseBundle\Handler;

use ExerciseBundle\Entity\Knight;
use ExerciseBundle\Form\KnightFormType;
/**
 * Knight handler
 *
 * Handle diffrent interactions with repositories and help us getting as thin controllers as possible.
 *
 * @package ExerciseBundle\Handler
 */
class KnightHandler implements HandlerInterface
{
    protected $em;
    protected $form;
    protected $knight;


    public function __construct($entityManager, $knight, $formFactory)
    {
        $this->em = $entityManager;
        $this->knight = $knight;
        $this->form = $formFactory;
    }
    /**
     * Get a resource
     *
     * @param int $id
     * @return Object
     */
    public function get($id)
    {
        return $this->em->getRepository('ExerciseBundle:Knight')->find($id);
    }

    /**
     * Get a collection of resources
     *
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function all($limit, $offset)
    {
        return $this->em->getRepository('ExerciseBundle:Knight')->findAll();
    }

    /**
     * Register a resource
     *
     * @param $resource
     * @return mixed
     */
    public function post($resource)
    {
        $knight = new Knight;

        $form = $this->form->create(new KnightFormType, $knight);

        $form->submit($resource);


        if (!$form->isValid()) {
            $response = array(
                'code' => 400,
                'message' => 'Invalid data'
            );
        } else {
            $this->em->persist($knight);
            $this->em->flush();

            $response = array(
                'code' => 201,
                'message' => 'Resource registred successfully'
            );
        }

        return $response;
    }
}
