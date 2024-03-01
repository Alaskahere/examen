<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equation;

class EquationController extends Controller{

    public function create(){
        return view('equation');
    }
    // E C   C U A D R A T I C A
    function resolverEcuacionCuadratica($a, $b, $c) {
        // Verificar si la ecuación es cuadrática
        if ($a == 0) {
            // Si $a es 0, la ecuación no es cuadrática
            if ($b == 0) {
                // Si $b también es 0, la ecuación es degenerada
                if ($c == 0) {
                    return "La ecuación es degenerada (0 = 0)";
                } else {
                    return "La ecuación no tiene solución real";
                }
            } else {
                // Si $b no es 0, la ecuación es lineal
                $x = -$c / $b;
                return "La ecuación es lineal. La solución es: x = $x";
            }
        } else {
            // Calcular el discriminante
            $discriminante = $b * $b - 4 * $a * $c;
            
            // Verificar el valor del discriminante
            if ($discriminante > 0) {
                // Dos soluciones reales distintas
                $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                return "La ecuación tiene dos soluciones reales distintas: x1 = $x1, x2 = $x2";
            } elseif ($discriminante == 0) {
                // Una solución real doble
                $x = -$b / (2 * $a);
                return "La ecuación tiene una solución real doble: x = $x";
            } else {
                // No hay soluciones reales
                return "La ecuación no tiene soluciones reales";
            }
        }
    }

    public function store(Request $request){
        $ec = new Equation ();
        
        $ec->a = floatval($request->a);
        $ec->b = floatval($request->b);
        $ec->c = floatval($request->c);
        $ec->solution = $this->resolverEcuacionCuadratica($ec->a, $ec->b, $ec->c);
        $ec->save();
        return $ec;
    }
}



