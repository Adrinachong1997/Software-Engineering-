//畫出圖表傳到printChart.php
window.onload=function()  
{  
     getdatafromDB();  
}  
  
var getdatafromDB = function(){ 


	$.ajax({
		url : "http://localhost/Software-Engineering-/newBG/chart_data.php",
		type : "GET",

		success : function(data){
			console.log(data);

			var cost = {
				R1 : [],
                R2 : [],
                R3 : [],
				R4 : []
			};
            var week=[];
			var len = data.length;

			for (var i = 0; i < len; i++) {
                
				if (data[i].pid == 1) {
					cost.R1.push(data[i].cost);
                    week.push("week"+data[i].week);
				}
				else if (data[i].pid ==2) {
					cost.R2.push(data[i].cost);
				}else if (data[i].pid ==3) {
					cost.R3.push(data[i].cost);
				}else if (data[i].pid ==4) {
					cost.R4.push(data[i].cost);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : week,
				datasets : [
					{
						label : "工廠",
						data : cost.R1,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},{
						label : "大盤商",
						data : cost.R2,
						backgroundColor : "red",
						borderColor : "red",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},{
						label : "批發商",
						data : cost.R3,
						backgroundColor : "yellow",
						borderColor : "yellow",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},{
						label : "零售商",
						data : cost.R4,
						backgroundColor : "green",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "組內成本折線圖",
					fontSize : 18,
					fontColor : "00000"
				},
				legend : {
					display : true,
					position : "bottom"
				},
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});
}