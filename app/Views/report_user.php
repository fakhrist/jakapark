<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Laporan Untukmu </h1>
<a href="<?= site_url('report/xls') ?>">(Unduh Laporan Excel)</a> | 
<a href="<?= site_url('report/pdf') ?>">(Unduh Laporan PDF)</a>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="chart-pie"></div>
        </div>
        <div class="col-md-8">
            <div id="chart-bar"></div>
        </div>
    </div>
</div>

<!-- online -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
    series: [<?php foreach ($frekuensi as $row):?><?= $row['frekuensi']?>,<?php endforeach ?>],
    chart: {
        height: 350,
        type: 'donut',
    },
    labels: [<?php foreach ($frekuensi as $row):?>'<?= $row['gedung']?>',<?php endforeach ?>],    
    legend: {
        position: 'top'
    },
    title: {
        text: 'Frekuensi Tempat Parkir',
        align: 'center'
    }
  };

  var chartpie = new ApexCharts(document.querySelector("#chart-pie"), options);
  chartpie.render();

    var options = {
        series: [{
        name: "Rupiah ",
        data: [<?php foreach ($laporan as $row):?><?= $row['biaya']?>,<?php endforeach ?>]
    }],
        chart: {
        height: 350,
        type: 'bar',
        zoom: {
        enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: 'Besar Pengeluaran Parkir Per Bulan (Rupiah)',
        align: 'center'
    },
    grid: {
        row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
        },
    },
    xaxis: {
        categories: [<?php foreach ($laporan as $row):?>'<?= $row['tanggal']?>',<?php endforeach ?>]
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart-bar"), options);
    chart.render();
</script>

<?= $this->endSection('content'); ?>