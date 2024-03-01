<?php

namespace App\Http\Controllers;

use App\Models\Qualification;

use Illuminate\Http\Request;

class QualificationController extends Controller
{
    //
    public function create()
    {
        return view('quali');
    }

    public function Promedio($num1, $num2, $num3)
    {
    
        $tres = 3;

        $prom = ($num1 + $num2 + $num3) / $tres;

        return $prom;
    }

    public function store(Request $request){
        $qualification = new Qualification();
        $qualification->name = $request->name;
        $qualification->nota1 = floatval($request->nota1);
        $qualification->nota2 = floatval($request->nota2);
        $qualification->nota3 = floatval($request->nota3);

      
        $qualification->promedio = $this->Promedio($qualification->nota1, $qualification->nota2, $qualification->nota3);



        $qualification->save();
    }
}
