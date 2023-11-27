//TODO: Task 1:
  var daily = JSON.parse(dailydata_stoke);
  var Forecast = JSON.parse(forecast_stoke);
  var Location = "Stoke-on-Trent";
  updateLocation(Location);
  latAndLon(daily);
  theDataList(Forecast)
  
  function clickStoke(){
	daily = JSON.parse(dailydata_stoke);
	Forecast = JSON.parse(forecast_stoke);
	Location = "Stoke-on-Trent";
	updateLocation(Location);
	latAndLon(daily);
	theDataList(Forecast);
	humidityInOnePlace();
	temperatureInOnePlace();
	windInOnePlace();
  }
  
  function clickLondon(){
	daily = JSON.parse(dailydata_london);
	Forecast = JSON.parse(forecast_london);
	Location = "London";
	updateLocation(Location);
	latAndLon(daily);
	theDataList(Forecast);
	humidityInOnePlace();
	temperatureInOnePlace();
	windInOnePlace();
  }
  
  function updateLocation(Location) {
	  document.getElementById("location").innerHTML = Location;
  }
 
  
	function latAndLon(daily) {
		var latElement = document.getElementById('lat');
		var lonElement = document.getElementById('lon');
		lonElement.innerHTML = daily.coord.lon;
		latElement.innerHTML = daily.coord.lat;
  }
  
 
  function theDataList(Forecast) {
	this.dateList = Forecast.list.map(list => {
		return list.dt_txt;
	});


	this.TemperatureList = Forecast.list.map(list => {
		return list.main.temp;
	});
  
	this.HumidityList = Forecast.list.map(list => {
		return list.main.humidity;
	});
  
	this.WindSpeedList = Forecast.list.map(list => {
		return list.wind.speed;
	});
  }
  

  function humidityInOnePlace(){
	//theDataList(Forecast);
	this.chart.data.datasets[0].label = "Humidity";
	this.chart.data.datasets[0].data = this.HumidityList;
	this.chart.update();
  };
  
  function temperatureInOnePlace(){
	//theDataList(Forecast);
	this.chart.data.datasets[0].label = "Temperature";
	this.chart.data.datasets[0].data = this.TemperatureList;
	this.chart.update();
  };
  
  function windInOnePlace(){
	//theDataList(Forecast);
    this.chart.data.datasets[0].label = "Wind Speed";
	this.chart.data.datasets[0].data = this.WindSpeedList;
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
          borderColor: "lightblue",
          fill: false,
          data: this.TemperatureList
        }
      ]
    }
  });
  
  
  
  //Task 3
  var task3ColorClick = true;
  var color;
  function colorToRedStoke(){
	if (task3ColorClick === true) {
		task3ColorClick = false;
		color = "red";
	} else {
		task3ColorClick = true;
		color = "lightblue";
	}
	this.chart.data.datasets[0].backgroundColor = color;
	this.chart.data.datasets[0].borderColor = color;
	this.chart.update();
  };
  
  var task3ConfigClick = true;
  var config;
  function chartToLineStoke(){
    if (task3ConfigClick === true) {
		task3ConfigClick = false;
		config = 'line';
	} else {
		task3ConfigClick = true;
		config = 'bar';
	}
	this.chart.config.type = config;
	this.chart.update();
  };
  
  
  //Task 4
  
  //Stoke-on-Trent
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
