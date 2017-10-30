<div class="col-md-3 col-xs-6"> 
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?=$data['name']?>
            </h3>
        </div>
        <div class="panel-body">
            <div> 10% = <?=$data['data'][1]*0.1?></div>
            <div class="col-xs-12" id="<?=$graphId?>">
                   
            </div>
        </div>
    </div>
</div>
<?
    $this->render('graphs/_basic-line.php',
                [   
                    'targetDiv'=>$graphId,
                    'data'=>$data['data'],
                ]);
?>