<?php

namespace ExerciseBundle\Handler;


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


    public function __construct($entityManager, $knight, $form)
    {
        $this->em = $entityManager;
        $this->knight = $knight;
        $this->form = $form;
    }
    /**
     * Get a resource
     *
     * @param int $id
     * @return Object
     */
    public function get($id)
    {

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

    }

    /**
     * Register a resource
     *
     * @param $resource
     * @return mixed
     */
    public function post($resource)
    {

    }
}
