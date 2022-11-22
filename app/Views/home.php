<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4 class="mr-2">Data Event Berdasarkan Penyelenggara</h4>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</section>
<script>
    var label_polar = [];
    var data_polar = [];
    var warna = [];

    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")"
    };

    <?php foreach ($event as $key => $value) : ?>
        label_polar.push("<?= $value['penyelenggara'] ?>", );
        data_polar.push(<?= $value['datas'] ?>);
        warna.push(dynamicColors());
    <?php endforeach ?>


    const data = {
        labels: label_polar,
        datasets: [{
            label: 'Data Event',
            backgroundColor: warna,
            data: data_polar,
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Pie Chart'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            begintAtZero: true
                        }
                    }]
                }
            }
        },
    };
</script>

<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

<?= $this->endSection() ?>