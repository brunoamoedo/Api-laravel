<?php
namespace App\Http\Controllers;

class SeriesController
{
    public function listarSeries()
    {
        $series = [
          'Vikings',
          'Lost',
          'Neymar'  
        ];
        $html = '{"cursos":[';
        foreach($series as $serie){
            $html.= "'$serie',";
        }
        $html= rtrim($html,',');
        $html .= ']}';
        //echo $html;
        return response($html) ->header('Content-Type', 'application/json; charset=utf-8');
    }
}