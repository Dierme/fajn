
<?
$yData =  implode(',',$yLine);

$js = <<<EOD
$(function () {
    $('#$targetDiv').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Wind speed during two days'
        },
        subtitle: {
            text: 'May 31 and and June 1, 2015 at two locations in Vik i Sogn, Norway'
        },
        xAxis: {
            type: 'integer',
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            title: {
                text: 'Y'
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
        },
        tooltip: {
            valueSuffix: ' y',
            formatter: function () {return false;}
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
            name: 'Heartbit',
            data: [$yData]
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