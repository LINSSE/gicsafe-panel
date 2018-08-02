
		$(document).ready(function(){

			update();


			setInterval(function(){
				update();

			},60000);


			function update(){
				if($("#sheet").length)
				{
					console.log('update');
					$.get('live.php',{},function(data){
						data.reverse();
						fill(data);
					})
				}


				///selectores
				if($("#tablaSensorDigital").length){
					////existe
					device = $("#tablaSensorDigital").attr("device");
					console.log('digital_update');
					$.get('graphapi.php',{device_id:device,type:"digital"},function(data)
					{
						data.reverse();
						fillRegistroDigital(data);
					})
				}

			}

			function fillRegistroDigital(data)
			{
				console.log("infill digital")
			}

			function fill(data)
			{
				var sheet = $("#sheet");
				sheet.hide("fade");
				sheet.html("");//limpio


				for (var i = data.length - 1; i >= 0; i--) {
					
					var reg = data[i];
					sheet.append('<tr><td><b>'+reg.timestamp+'</b></td><td>'+reg.topic+'</td><td>'+reg.payload+'</td></tr>')
				
				}

				sheet.show("fade");
			}

		})