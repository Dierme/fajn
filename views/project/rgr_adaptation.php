
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?
    $i = 1;
    foreach($attrs as $attr){
        $graphId = 'graph'.$i;
        echo $this->render('_adaptation-graph', ['data'=>$attr, 'graphId'=>$graphId]);
        $i++;
    }
    ?>
</div>
