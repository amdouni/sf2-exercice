<?php

namespace ExerciseBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class KnightController
 * @package ExerciseBundle\Controller
 */

class KnightController extends FOSRestController
{

    public function getKnightHandler()
    {
        return $this->get('exercise.knight.handler');
    }

    /**
     * Creates Knight
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postKnightAction(Request $request)
    {

        // Get post data and transform it into regular array
        $data = json_decode($request->getContent(), true);

        // Create new resource and get response code
        $response = $this->getKnightHandler()->post($data);

        $view = $this->view($response, $response['code']);
        return $this->handleView($view);

    }

    /**
     * Get all Knights
     *
     * @return array
     */
    public function getKnightsAction()
    {
        //  Get all knights. No offset have been added as we have not pagination
        // No special exception have been managed
        $knights = $this->getKnightHandler()->all(null, null);

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
        // Get knight by Id
        $knight = $this->getKnightHandler()->get($id);

        if (!isset($knight)) {
            throw new ResourceNotFoundException("Knight #" . $id . " not found.");
        }

        $view = $this->view($knight, 200);

        return $this->handleView($view);
    }

}
