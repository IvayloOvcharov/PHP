$(document).ready(function(){
	$.ajax({
		url : "http://localhost:8080/SpravkiCharts/ToJson.php",
		type : "GET",
		success : function(data){
			
        var data = JSON.parse(data);
       console.table(data);
	   
			var date = [];
			var money = [];
			var bigmoney = [];
            
			for(var i in data) {
				date.push(data[i].datee);
				money.push(data[i].moneyy);	
				bigmoney.push(data[i].bigMoney);
			}
console.log(bigmoney);
			var chartdata = {
				labels: date,
				datasets: [
					{
						label: "MyMoney",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: money
					},
					{
						label: "YourMoney",
					    fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: bigmoney
					}
					
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});