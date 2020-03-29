<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'views/head.php'; ?>
    <style>
        ul.list-group li {
            cursor: pointer;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="assets/style.css?v=1">
</head>
<body>
<?php include 'views/top.php'; ?>
<div class="container"
     x-data="{ examples: {invoices:[], reports: []} }"
     x-init="
            fetch('docs.php')
                .then(response => response.json())
                .then(data => examples = data)
     "
    >
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary">
                <div class="card-header text-white">Comprobantes</div>
                <div class="card-block">
                    <ul class="list-group">
                        <template x-for="item in examples.invoices" :key="item.file">
                            <li @click="loadUrl($event.target, item.file)" class="list-group-item">
                                <i class="fa fa-angle-right"></i>&nbsp;<span x-text="item.title"></span>
                                <span class="badge badge-secondary" x-text="item.tag"></span>
                            </li>
                        </template>
                        <li class="list-group-item">
                            <a href="examples/pages/status-cdr.php">Consulta CDR <i class="fa fa-external-link-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">Resultado</div>
                <div class="card-block">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <div id="result">De click en algún elemento de la lista.</div>
                            <div>Time: <span id="time"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card bg-primary">
                <div class="card-header text-white">PDF</div>
                <div class="card-block">
                    <ul class="list-group">
                        <template x-for="item in examples.reports" :key="item.path">
                            <li class="list-group-item">
                                <a :href="item.path" target="_blank">
                                    <span class="fa fa-external-link-alt"></span> <span x-text="item.name"></span>
                                </a>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'views/footer.php'; ?>
<script src="assets/demo.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90097417-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-90097417-4');
</script>
</body>
</html>
