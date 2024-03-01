<?php

namespace App\Http\Controllers;

use App\Models\Qualification;

use Illuminate\Http\Request;

class QualificationController extends Controller
{
    //
    public function create(){
        return view('quali');
    
    }

    public function store(Request $request){ 
        $qualification = new Qualification();
        $qualification->name = $request->name;
        $qualification->nota1 = floatval($request->nota1);
        $qualification->nota2 = floatval($request->nota2);
        $qualification->nota3 = floatval($request->nota3);
    
        // Imprimir los valores para depurar
        dd($qualification->nota1, $qualification->nota2, $qualification->nota3);
    
        $qualification->promedio = $this->Promedio($qualification->nota1, $qualification->nota2, $qualification->nota3);
        
        // Imprimir el promedio para depurar
        dd($qualification->promedio);
    
        $qualification->save();
    }



public function Promedio($num1, $num2, $num3)
{
    // Imprimir los valores de las notas para depurar
    dd($num1, $num2, $num3);

    $prom = ($num1 + $num2 + $num3) / 3;
    
    // Imprimir el resultado intermedio del cálculo del promedio
    dd($prom);
    
    return $prom;
}




}
