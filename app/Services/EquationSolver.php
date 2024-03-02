<?php

namespace App\Services;

class EquationSolver
{
      /**
     * Resuelve una ecuación cuadrática y devuelve la solución.
     *
     * @param float $a Coeficiente cuadrático.
     * @param float $b Coeficiente lineal.
     * @param float $c Término independiente.
     * @return array Solución de la ecuación.
     */
    public function solveQuadraticEquation($a, $b, $c)
    {
        // Verificar si la ecuación es cuadrática
        if ($a == 0) {
            // Si $a es 0, la ecuación no es cuadrática
            if ($b == 0) {
                // Si $b también es 0, la ecuación es degenerada
                if ($c == 0) {
                    return ["type" => "degenerate", "message" => "La ecuación es degenerada (0 = 0)"];
                } else {
                    return ["type" => "no_solution", "message" => "La ecuación no tiene solución real"];
                }
            } else {
                // Si $b no es 0, la ecuación es lineal
                $x = -$c / $b;
                return ["type" => "linear", "solution" => $x];
            }
        } else {
            // Calcular el discriminante
            $discriminante = $b * $b - 4 * $a * $c;

            // Verificar el valor del discriminante
            if ($discriminante > 0) {
                // Dos soluciones reales distintas
                $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                return ["type" => "two_real_solutions", "solutions" => [$x1, $x2]];
            } elseif ($discriminante == 0) {
                // Una solución real doble
                $x = -$b / (2 * $a);
                return ["type" => "one_real_solution", "solution" => $x];
            } else {
                // No hay soluciones reales
                return ["type" => "no_real_solution", "message" => "La ecuación no tiene soluciones reales"];
            }
        }
    }


}
