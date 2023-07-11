<div class="p-1">
    <div class="card mb-2">
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }

            .chartMenu {
                width: 100vw;
                height: 40px;
                background: #1A1A1A;
                color: rgba(54, 162, 235, 1);
            }

            .chartMenu p {
                padding: 10px;
                font-size: 20px;
            }

            .chartBox {
                width: 98%;
                padding: 15px;
                border-radius: 10px;
                background: white;
            }
        </style>
        <center>
            <h1>Statistique de vente</h1>

            <div class="chartCard">

                <div class="chartBox">
                    <form action="<?php echo site_url('tableau/getData'); ?>" class="mb-3" method="post">
                        <select name="id">
                            <?php
                            foreach ($diet as $d) { ?>
                                <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </form>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </center>



    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script>
    var ex = []
    const form = document.querySelector('form');
    const select = document.querySelector('select');
    var xhttp = new XMLHttpRequest();
    var val = select.value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ex = JSON.parse(this.responseText);
            myChart.data.datasets[0].data = ex;
            myChart.update();
        }
    };
    xhttp.open("POST", "http://localhost/projet_48/admin/getData/" + val, true);
    xhttp.send();


    select.addEventListener('change', (e) => {
        val = select.value;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                ex = JSON.parse(this.responseText);
                myChart.data.datasets[0].data = ex;

                myChart.update();
            }
        };
        xhttp.open("POST", "http://localhost/projet_48/admin/getData/" + val, true);
        xhttp.send();
    })

    // setup 
    var data = {
        labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        datasets: [{
            label: "Nombre d'achat",
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            backgroundColor: '#eb7c38',
            borderColor: '#ad531b',
            borderWidth: 1
        }]
    };

    // config 
    var config = {
        type: 'bar',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Nombre d'achat"
                    }
                }
            }
        }
    };

    // render init block
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
</script>