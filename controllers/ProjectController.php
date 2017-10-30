<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\NodeModel;
use app\models\FazographModel;
use app\models\ClearModel;
use app\models\DataFactory;

class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionHeartbeat(){
        
        $model = new NodeModel();
        $model->A = 0.28;
        $model->b1 = 0.06;
        $model->b2 = 0.06;
        $model->mu = 0.7;
        $model->F = 60;
        $model->error = 10;
        
        $initData = DataFactory::getNodesData();        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
            $initData['T']['A'] = $model->A;
            $initData['T']['b1'] = $model->b1;
            $initData['T']['b2'] = $model->b2;
            $initData['T']['mu'] = $model->mu;
        }
        
        
        $yLine = DataFactory::cycleComputation(3,$initData,$model->F, $model->error);
        
        return $this->render('heartbeat',
                            [
                                'yLine'=>$yLine,
                                'nodesData'=>$initData,
                                'model'=>$model,
                            ]);
    }
    
    
    public function actionClearHeartbeat(){
        
        $clearModel = new ClearModel();
        $clearModel->alpha = 0.5;
        $clearModel->W = 2;
        $clearModel->Wb = 100;
        
        $modelLoadValidate = ($clearModel->load(Yii::$app->request->post()) && $clearModel->validate());
        
        if(!$modelLoadValidate){
            $clearModel->alpha = 0.5;
            $clearModel->W = 2;
            $clearModel->Wb = 100;
        }
        
        
        $fileData = file_get_contents('../data/file.txt', FILE_USE_INCLUDE_PATH);
        $fileData = str_replace(',','.',$fileData);
        $fileData = explode(';',$fileData);
        //print_r($fileData); die;
        
        
        //removing trend
        $coef = 1 / (2*$clearModel->Wb +1);
        
        $zk = $fileData;
        $fileDataTrend = $fileData;
        foreach($zk as $i => $data){
            $zb = 0;
            for($j = -$clearModel->Wb; $j <= $clearModel->Wb; $j++){
                $index = $i - $j;
                if($index >= 0 && $index < count($zk)){
                    $zb += $zk[$index];
                }
            }
            $zb *= $coef;
            $fileDataTrend[$i] = $fileDataTrend[$i] - $zb;
        }
        
        
        $fileDataExp = $fileDataTrend;
        
        for($i = 1; $i < count($fileDataTrend) - 1; $i++ ){
            $fileDataExp[$i] = $fileDataExp[$i - 1] + $clearModel->alpha * ($fileDataExp[$i] - $fileDataExp[$i - 1]);
        }

        
        
        //Window ECG
        $fileDataPoints = $fileDataExp;
        $U = (1 / (1 + 2*$clearModel->W));
        for($i = (1 + $clearModel->W); $i < (count($fileDataPoints) - $clearModel->W) - 1; $i++ ){
           $fileDataPoints[$i] = $fileDataPoints[$i-1] + $U * ($fileDataPoints[$i + $clearModel->W] - $fileDataPoints[$i -1 - $clearModel->W]);
           
        }
        
        return $this->render('clear-heartbeat',
                            [
                                'yLine'=>$fileData,
                                'yLine2'=>$fileDataTrend,
                                'yLineExp'=>$fileDataExp,
                                'yLinePoints'=>$fileDataPoints,
                                'model'=>$clearModel,
                            ]);
    }
    
    public function actionFazograph(){
        $model = new FazographModel();
        $model->W = 5;
        $model->par = 7;
        
        $modelLoadValidate = ($model->load(Yii::$app->request->post()) && $model->validate());
        
        if(!$modelLoadValidate){
            $model->W = 5;
            $model->par = 7;
        }
        $fileData = file_get_contents('../data/ECGdata1.txt', FILE_USE_INCLUDE_PATH);
        $fileData = str_replace(',','.',$fileData);
        $fileData = explode(';',$fileData);
        //print_r($fileData); die;
        $data = $fileData;
        $dataStr0 = '';
        foreach($fileData as $inputData){
            $dataStr0 .="$inputData ,";
        }
        
        
        $fazogramma = array();
        for($i = $model->par; $i < count($data); $i++){
            $y = $data[$i- $model->par] ;
            $x = $data[$i];
            $fazogramma[] = array($x, $y);
        }
        
        
        //print_r($fazogramma); die;
        $dataStr = '';
        foreach($fazogramma as $data){
            $dataStr .="[{$data[0]} , {$data[1]}],";
        }
        //print($dataStr); die;
        
        
        $diff = array();
        $diff[0] = 0;
        for($i = 1; $i < count($fileData); $i++){
            $diff[$i] = $fileData[$i] - $fileData[$i - 1];
        }
        //WindowECG
        $fileDataPoints = $diff;
        $U = (1 / (1 + 2*$model->W));
        for($i = (1 + $model->W); $i < (count($fileDataPoints) - $model->W) - 1; $i++ ){
           $fileDataPoints[$i] = $fileDataPoints[$i-1] + $U * ($fileDataPoints[$i + $model->W] - $fileDataPoints[$i -1 - $model->W]);
        }
        
        $FZ2 = array();
        for($i = 0; $i<count($fileData); $i++){
            $FZ2[] = array($fileData[$i], $fileDataPoints[$i]);
        }
        $dataStr2 = '';
        foreach($FZ2 as $data){
            $dataStr2 .="[{$data[1]} , {$data[0]}],";
        }
        //print_r($FZ2); die;
        
        
        return $this->render('fazograph',
                            [
                                'dataStr0'=>$dataStr0,
                                'dataStr'=>$dataStr,
                                'dataStr2'=>$dataStr2,
                                'model'=>$model,
                            ]);
    }
    
    
    public function actionAdaptationRgr(){
        $attr1 = array('name'=>'Чсс', 'data'=>array('0'=>68.2, '1'=>98.2, '3'=>78.6));
        $attr3 = array('name'=>'Середня симетрія T', 'data'=>array('0'=>0.76, '1'=>0.95, '3'=>0.79));
        $attr4 = array('name'=>'СКО симетрії T', 'data'=>array('0'=>0.050, '1'=>0.060, '3'=>0.046));
        $attr9 = array('name'=>'Індекс напруги ', 'data'=>array('0'=>70, '1'=>66, '3'=>60));
        $attr17 = array('name'=>'Зсув ST, мв.', 'data'=>array('0'=>51.65, '1'=>87.039, '3'=>78.95));
        $attr21 = array('name'=>'Площі T/R', 'data'=>array('0'=>0.013, '1'=>0.019, '3'=>0.014));
        $attr37 = array('name'=>'Інтервал P-Q(R), мс.', 'data'=>array('0'=>2.16, '1'=>1.75, '3'=>1.96));
        $attr32 = array('name'=>'SDNN, мс.', 'data'=>array('0'=>0.14, '1'=>0.11, '3'=>0.14));
        
        $attrs = array();
        $attrs[] = $attr1;
        $attrs[] = $attr3;
        $attrs[] = $attr4;
        $attrs[] = $attr9;
        $attrs[] = $attr17;
        $attrs[] = $attr21;
        $attrs[] = $attr37;
        $attrs[] = $attr32;
        return $this->render('rgr_adaptation', ['attrs'=>$attrs]);      
    }


    public function actionCountries(){
        $fileArray = file('data/countries.txt');

        $countries = array();
        foreach ($fileArray as $line){
            $containsLetter  = preg_match('/[A-Z]/',    $line);
            if($containsLetter){
                $line = str_replace('"', '\'', $line);
                $countries[] = $line;
            }
        }
        $string = implode(",",$countries );
        print_r($string);
    }

    
}
