
<?

$js = <<<EOD
$(function () {
    $('#$targetDiv').highcharts({
        title: {
            text: 'Result',
            x: -20 //center
        },
        series: [{
            data: [$dataStr]
        }],
    });
});
EOD;
$this->registerJs($js);
?>