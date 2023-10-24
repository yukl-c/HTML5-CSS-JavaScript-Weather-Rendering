<html>
<head>
<title>Rendering Weather Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="dailyweatherdata.js"></script>
<script src="weatherforecast.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
  integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
  canvas {
    width: 1000px !important;
    height: 400px !important;
  }
</style>

<body>
<center>
<?php include 'HeaderAndBackground.php'; ?>
  <h1>Rendering Weather Data</h1>
  <h2>Task 1</h2>
  Longitude: <label id="lon"></label>

  <h2>Task 2</h2>
  <h3>Temperature, Humidity and Wind Speed in Stoke-on-Trent</h3>
  <p>please choose one of them</p>
  <input type="radio" value="Temperature" name="task2" onclick="temperatureStoke()" checked><label for="Temperature">Temperature</label>
  <input type="radio" value="Humidity" name="task2" onclick="humidityStoke()"><label for="Humidity">Humidity</label>
  <input type="radio" value="Wind Speed" name="task2" onclick="windStoke()"><label for="Wind Speed">Wind Speed</label>
  
  <h2>Task 3</h2>
  <h3>Change the color and type of the graph</h3>
  <input type="checkbox" value="Color: Red" name="task3" onclick="colorToRedStoke()"><label for="Color: Red">Color: Red</label>
  <input type="checkbox" value="Type: Line" name="task3" onclick="typeToLineStoke()"><label for="Type: Line">Type: Line</label>
  </br>
  <h6>Chart of task 2 & 3</h6>
  <canvas id="myChart" style="max-width:100%;height:auto;"></canvas>
  
  <h2>Task 4</h2>
  <h3>Temperature, Humidity and Wind Speed between Stoke-on-Trent and London</h3>
  <input type="radio" value="Temperature" name="task4" onclick="temperature()" checked><label for="Temperature">Temperature</label>
  <input type="radio" value="Humidity" name="task4" onclick="humidity()"><label for="Humidity">Humidity</label>
  <input type="radio" value="Wind Speed" name="task4" onclick="wind()"><label for="Wind Speed">Wind Speed</label>
  <canvas id="myChart2" style="max-width:100%;height:auto;"></canvas>
 
 <?php include 'Footer2.php'; ?>
</center> 
</body>

<script>
  //TODO: Task 1:
  var daily = JSON.parse(dailydata_stoke);
  document.getElementById('lon').innerHTML = daily.coord.lon;

  //TODO: Task 2, 3 and 4
  
  //Task 2
  var stokeForecast = JSON.parse(forecast_stoke);
  this.dateList = stokeForecast.list.map(list => {
    return list.dt_txt;
  });

  //Stoke-on-Trent
  this.stokeTemperatureList = stokeForecast.list.map(list => {
    return list.main.temp;
  });
  
  this.stokeHumidityList = stokeForecast.list.map(list => {
    return list.main.humidity;
  });
  
  this.stokeWindSpeedList = stokeForecast.list.map(list => {
    return list.wind.speed;
  });

  function humidityStoke(){
	this.chart.data.datasets[0].label = "Humidity";
	this.chart.data.datasets[0].data = this.stokeHumidityList;
	this.chart.update();
  };
  
  function temperatureStoke(){
	this.chart.data.datasets[0].label = "Temperature";
	this.chart.data.datasets[0].data = this.stokeTemperatureList;
	this.chart.update();
  };
  
  function windStoke(){
    this.chart.data.datasets[0].label = "Wind Speed";
	this.chart.data.datasets[0].data = this.stokeWindSpeedList;
	this.chart.update();
  };
  
  var ctx = document.getElementById('myChart').getContext('2d');
  this.chart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: this.dateList,
      datasets: [
        {
          //Stoke-on-Trent
		  label: "Temperature",
          backgroundColor: "lightblue",
          borderColor: "blue",
          fill: false,
          data: this.stokeTemperatureList
        }
      ]
    }
  });
  
  
  
  //Task 3
  function colorToRedStoke(){
    this.chart.data.datasets[0].backgroundColor = "red";
	this.chart.data.datasets[0].borderColor = "red";
	this.chart.update();
  };
  
  function typeToLineStoke(){
    this.chart.config.type = 'line';
	this.chart.update();
  };
  
  
  //Task 4
  //London
  var londonForecast = JSON.parse(forecast_london);
  this.dateList = londonForecast.list.map(list => {
  //this. :refer to the browser. It is a object also 
    return list.dt_txt;
  });
  
  this.londonTemperatureList = londonForecast.list.map(list => {
    return list.main.temp;
  });
  
  this.londonHumidityList = londonForecast.list.map(list => {
    return list.main.humidity;
  });
  
  this.londonWindSpeedList = londonForecast.list.map(list => {
    return list.wind.speed;
  });
  
  var ctx2 = document.getElementById('myChart2').getContext('2d');
  this.chart2 = new Chart(ctx2, {
        data: {
			labels: this.dateList,
			datasets: [
				{
					//Stoke-on-Trent
					type: "line",
					label: "Temperature in Stoke-on-Trent",
					backgroundColor: "lightblue",
					borderColor: "blue",
					fill: false,
					data: this.stokeTemperatureList
				},
		
				{
					//London
					type: "bar",
					label: "Temperature in London",
					backgroundColor: "red",
					borderColor: "red",
					fill: false,
					data: this.londonTemperatureList
				}
			]
		}
	});
	
  function humidity(){
	this.chart2.data.datasets[0].label = "Humidity in Sotke-on-Trent";
	this.chart2.data.datasets[0].data = this.stokeHumidityList;
	this.chart2.data.datasets[1].label = "Humidity in London";
	this.chart2.data.datasets[1].data = this.londonHumidityList;
	this.chart2.update();
  };
  
  function temperature(){
	this.chart2.data.datasets[0].label = "Temperature in Sotke-on-Trent";
	this.chart2.data.datasets[0].data = this.stokeTemperatureList;
	this.chart2.data.datasets[1].label = "Temperature in London";
	this.chart2.data.datasets[1].data = this.londonTemperatureList;
	this.chart2.update();
  };
  
  function wind(){
    this.chart2.data.datasets[0].label = "Wind Speed in Sotke-on-Trent";
	this.chart2.data.datasets[0].data = this.stokeWindSpeedList;
	this.chart2.data.datasets[1].label = "Wind Speed in London";
	this.chart2.data.datasets[1].data = this.londonWindSpeedList;
	this.chart2.update();
  };
</script>

</html>
