<?php

namespace ExerciseBundle\Services;

use ExerciseBundle\Model\FightInterface;


class Arena
{

    /**
     * Compares two fighters and returns the winner otherwise, if the fight is draw, it returns 0
     *
     * @param ExerciseBundle\Model\FighInterface
     * @param ExerciseBundle\Model\FighInterface
     *
     * @return mixed
     */
    public function fight(FightInterface $firstFighter, FightInterface $secondFighter)
    {
        if ($firstFighter->calculatePowerLevel() > $secondFighter->calculatePowerLevel()) {
            return $firstFighter;
        } else if ($firstFighter->calculatePowerLevel() < $secondFighter->calculatePowerLevel()) {
            return $secondFighter;
        }

        return 0;
    }
}