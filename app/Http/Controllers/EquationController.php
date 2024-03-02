<?php

// EquationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EquationSolver;
use App\Repositories\EquationRepository;

class EquationController extends Controller{
    public function create()
    {
        return view('equation');
    }


    protected $solver;
    protected $repository;

    public function __construct(EquationSolver $solver, EquationRepository $repository)
    {
        $this->solver = $solver;
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'c' => 'required|numeric',
        ]);

        $a = floatval($request->a);
        $b = floatval($request->b);
        $c = floatval($request->c);
/* 
        $solution = $this->solver->solveQuadraticEquation($a, $b, $c);  
        $equation = $this->repository->saveEquation($a, $b, $c, $solution);
        return $equation; *///solucion sin convertir a cadena los posibles resultados 

        $result = $this->solver->solveQuadraticEquation($a, $b, $c);

        // Convertir el resultado en una cadena antes de insertarlo en la base de datos
        $solution = $this->convertSolutionToString($result);

        // Guardar la ecuación en la base de datos
        $equation = $this->repository->saveEquation($a, $b, $c, $solution);

        return $equation;
    }
    protected function convertSolutionToString($result)
    {
        switch ($result['type']) {
            case 'degenerate':
                return $result['message'];
            case 'no_solution':
                return $result['message'];
            case 'linear':
                return "La ecuación es lineal. La solución es: x = " . $result['solution'];
            case 'two_real_solutions':
                return "La ecuación tiene dos soluciones reales distintas: x1 = " . $result['solutions'][0] . ", x2 = " . $result['solutions'][1];
            case 'one_real_solution':
                return "La ecuación tiene una solución real doble: x = " . $result['solution'];
            case 'no_real_solution':
                return $result['message'];
            default:
                return "No se pudo resolver la ecuación";
        }
    }
}


