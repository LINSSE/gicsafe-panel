
		$(document).ready(function(){

			update();


			setInterval(function(){
				update();

			},60000);


			function update(){
				console.log('update');
				$.get('live.php',{},function(data){
					data.reverse();
					fill(data);
				})
			}

			function fill(data)
			{
				var sheet = $("#sheet");
				sheet.hide("fade");
				sheet.html("");//limpio


				for (var i = data.length - 1; i >= 0; i--) {
					// sheet.append('<div class="row"></div>');
					// var row = sheet.last();
					var reg = data[i];
					
					sheet.append('<tr><td><b>'+reg.timestamp+'</b></td><td>'+reg.topic+'</td><td>'+reg.payload+'</td></tr>')
					
					

				}

				sheet.show("fade");
			}

		})