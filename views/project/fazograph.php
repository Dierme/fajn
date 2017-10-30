
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Input data</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="panel-body">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <?= $form->field($model, 'par')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <?= $form->field($model, 'W')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= Html::submitButton( 'Submit', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
             </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   Input ECG
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12" id="heartbeat-block0">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   FP1
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12" id="heartbeat-block2">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   FP2
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12" id="heartbeat-block">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?
    $this->render('graphs/test.php',
                [   
                    'targetDiv'=>'heartbeat-block0',
                    'dataStr'=>$dataStr0,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>
<?
    $this->render('graphs/test.php',
                [   
                    'targetDiv'=>'heartbeat-block2',
                    'dataStr'=>$dataStr2,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>
<?
    $this->render('graphs/test.php',
                [   
                    'targetDiv'=>'heartbeat-block',
                    'dataStr'=>$dataStr,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>



