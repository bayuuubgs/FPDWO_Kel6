<main>
                    <h1></h1>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Penjualan Pegawai Tertinggi</div>
                                    <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=chart_pegawai">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Tahun Penjualan Tertinggi</div>
                                    <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=chart_penjualan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Total Produk</div>
                                    <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=data_produk">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Total Vendor</div>
                                    <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=data_vendor">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>

<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>

<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "fpdwo");

$test = array();
$count = 0;

$res = mysqli_query($link, "Select Name, LineTotal FROM product_purchase GROUP BY Name ORDER BY LineTotal DESC LIMIT 10;");
while($row=mysqli_fetch_array($res)) {
  $test[$count]["label"]=$row["Name"];
  $test[$count]["y"]=$row["LineTotal"];
  $count=$count+1;
}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Grafik Total Pendapatan Terbanyak"
	},
	axisY: {
		title: "Total Pendapatan($)"
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>

<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>