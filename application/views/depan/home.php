<script type="text/javascript">
  $(function () {
    $('#grafik').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Cashflow Toko <?php echo date("Y");?>'
        },
        subtitle: {
            text: 'TOKO EMAS SINAR MULIA'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '(Rp 0.000)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>Rp {point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Penerimaan',
            data: [0,1000000,750000,500000,5000000,4500000,9000000,2500000,1100000,1250000,12500000,8000000]

        },{
            name: 'Pengeluaran',
            data: [0,0,75000,50000,125000,100000,90000,25000,110000,8950000,0,80000]

        }]
    });
});


$(function () {
    $('#grafikminggu').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Cashflow Toko <?php echo date("Y");?>'
        },
        subtitle: {
            text: 'TOKO EMAS SINAR MULIA'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '(Rp 0.000)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>Rp {point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Penerimaan',
            data: [0,1000000,750000,500000,5000000,4500000,9000000,2500000,1100000,1250000,12500000,8000000]

        },{
            name: 'Pengeluaran',
            data: [0,0,75000,50000,125000,100000,90000,25000,110000,8950000,0,80000]

        }]
    });
});
</script>




<div class="container">
<h3><b>Dashboard</b></h3>
<hr>    

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="jumbotron">
              <div class="container">
                <h3>Welcome to Web Administration Page</h3>
                <h4>This page allows you to manage your website . Many of the features that you can use , 
                if you need help. Please contact your administrator.</h4>
              </div>
            </div>
            
        </div>
    </div>


</div>    