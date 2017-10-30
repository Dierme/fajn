<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Json;

/**
 * ContactForm is the model behind the contact form.
 */
class DataFactory extends Model
{
    
    public static function getNodesData(){
        
        $jsonInitData = <<<EOD
            {
                "P": {
                    "A": 0.11, 
                    "b1": 0.04, 
                    "b2": 0.04, 
                    "mu": 0.38
                }, 
                "Q": {
                    "A": -0.11, 
                    "b1": 0.01, 
                    "b2": 0.01, 
                    "mu": 0.478
                }, 
                "R": {
                    "A": 1.0, 
                    "b1": 0.01, 
                    "b2": 0.01, 
                    "mu": 0.5
                }, 
                "S": {
                    "A": -0.18, 
                    "b1": 0.015, 
                    "b2": 0.015, 
                    "mu": 0.523
                }, 
                "ST": {
                    "A": 0.0, 
                    "b1": 0.0, 
                    "b2": 0.0, 
                    "mu": 0.0
                }, 
                "T": {
                    "A": 0.28, 
                    "b1": 0.06, 
                    "b2": 0.06, 
                    "mu": 0.7
                }
            }
EOD;
        $initData = Json::decode($jsonInitData);
        return $initData;
    }
    
    public static function computeY($initData, $F){        
        $coef = 60*1200 / $F;
        $xLine = range(0, $coef, 1);
        $yLine = array();
        
        foreach($xLine as $x){
            $sum = 0;
            foreach($initData as $key => $node){
                $A = $node['A'] * $coef;
                $mu = $node['mu'] * $coef;
                
                $b = $node[$x < $mu ? 'b1' : 'b2'] * $coef;
                          
                $numerator = pow($x - $mu, 2);
                $denominator = -2 * pow($b, 2);
                
                if($denominator == 0){
                    continue;
                }
                
                $sum += $A * exp($numerator/$denominator);
            }
            
            $yLine[] = $sum;
        }
        
        return $yLine;
    }
    
    public static function cycleComputation($n, $initData, $F, $maxError){
        $result = array();
        for($i = 0; $i < $n; $i++){
            $initData['R']['A'] += mt_rand(0, $maxError)/100;
            $initData['T']['A'] += mt_rand(0, $maxError)/100;
            $initData['T']['mu'] += mt_rand(0, $maxError)/100;
            $result = array_merge($result, self::computeY($initData, $F));
        }
        return $result;
    }
}
