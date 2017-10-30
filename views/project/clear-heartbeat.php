
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Input data</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="panel-body">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <?= $form->field($model, 'W')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <?= $form->field($model, 'alpha')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">
                    <?= $form->field($model, 'Wb')->textInput(['maxlength' => true]) ?>
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
    

    <div class="col-md-8"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   Input ECG data
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



<div class="row">
    <div class="col-md-4 col-sm-12">
        &nbsp
    </div>
    

    <div class="col-md-8"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   Exp smoothing
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
</div>

<div class="row">
    <div class="col-md-4 col-sm-12">
        &nbsp
    </div>
    

    <div class="col-md-8"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12" id="heartbeat-block-exp">
                       Скользящее сглаживание
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-12">
        &nbsp
    </div>
    

    <div class="col-md-8"> 
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                   Heartbeat
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12" id="heartbeat-block-points">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?
    $this->render('graphs/_basic-line.php',
                [   
                    'targetDiv'=>'heartbeat-block',
                    'yLine'=>$yLine,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>

<?
    $this->render('graphs/_basic-line.php',
                [   
                    'targetDiv'=>'heartbeat-block2',
                    'yLine'=>$yLine2,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>

<?
    $this->render('graphs/_basic-line.php',
                [   
                    'targetDiv'=>'heartbeat-block-exp',
                    'yLine'=>$yLineExp,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>

<?
    $this->render('graphs/_basic-line.php',
                [   
                    'targetDiv'=>'heartbeat-block-points',
                    'yLine'=>$yLinePoints,
                    //'data'=>$data['answerData'] ?? false,
                    //'chartOptions'=>$chartOptions ?? []
                ]);
?>




