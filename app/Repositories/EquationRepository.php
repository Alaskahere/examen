<?php


namespace App\Repositories;

use App\Models\Equation;

class EquationRepository
{
    public function saveEquation($a, $b, $c, $solution)
    {
        $equation = new Equation();
        $equation->a = $a;
        $equation->b = $b;
        $equation->c = $c;
        $equation->solution = $solution;
        $equation->save();

        return $equation;
    }
}