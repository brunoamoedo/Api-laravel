<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BandsController extends Controller
{
    public $allbandas=[
        [
            'id'=>0, "name"=>'Orochi',"gender"=>'trap',
        ],
        [
            'id'=>1, "name"=>'Leozin',"gender"=>'trap'
        ],
        [
            'id'=>2, "name"=>'Seu jorge',"gender"=>'mpb'
        ],
        [
            'id'=>3, "name"=>'Leo santana',"gender"=>'pop'
        ],
        [
            'id'=>4, "name"=>'Anitta',"gender"=>'funk'
        ]
    ];
    function getAll()
    {
        $bands = $this->allbandas;
        return response()->json($bands);
    }

    function getBandsId($id)
    {
        $band = null;
        $banda = $this->getBands();
        foreach($banda as $_bandas)
        {
            if ($_bandas["id"] == $id)
            {
                $band = $_bandas;
            }
        }
        return $band?response()->json($band) :response()->json(["message"=>"Dados não encontrados!"]);
    }
    function getBandsGender($gender)
    {
        $band = array();
        $banda = $this->getBands();
        foreach($banda as $_bandas)
        {
            if (strtolower($_bandas["gender"]) == $gender)
            {
                array_push($band,$_bandas);
            }
        }
        return $band?response()->json($band):response()->json(["message"=>"Dados não encontrados!"]);
    }
    function MostraBandaGender()
    {
        $banda = $this->getBands();
        $gender = array();
        foreach($banda as $_bandas=>$valor)
        {
           if (in_array($valor['gender'], $gender) == False)
            {
                array_push($gender,$valor['gender']);
            }else{
                continue;
            }
        }
        return response()->json(["genders"=>$gender]);
    }

    function setAllBandas($data) 
    {
        $teste = array_push($this->allbandas,$data);
    }
    function getBands()
    {
        return $this->allbandas;
    }
   
    function store(Request $request)
    {
        $bandas = $this->getBands();
     
        $validade = $request->validate([
            'name'=>'required',
            'gender'=>'required'
        ]);
        $name = $request->input('name');
        $gender = $request->input('gender');
        $func = new BandsController();
        $func->setAllBandas(["id"=>5,"name"=>$name,"gender"=>$gender]);
        $auxiliar = $func->getBands();
        var_dump($auxiliar);
        return response()->json(["message"=>"Dados inseridos com sucesso"]);
    }
}
