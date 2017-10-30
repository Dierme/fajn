
<?
$seriesData = '';
foreach($data as $x => $y){
    $seriesData .= "[$x, $y],";
}

$js = <<<EOD
$(function () {
    $('#$targetDiv').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'integer',
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            title: {
                text: ''
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
        },
        tooltip: {
            valueSuffix: ' y'
        },
        plotOptions: {
            spline: {
                lineWidth: 4,
                states: {
                    hover: {
                        lineWidth: 5
                    }
                },
                marker: {
                    enabled: false
                },
                pointInterval: 1,
                pointStart: 0
            }
        },
        series: [{
            data: [$seriesData]
        },],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        }
    });
});
EOD;
$this->registerJs($js);
?>