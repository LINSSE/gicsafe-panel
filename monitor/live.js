///prototypo para formato de hora
String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
}


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
					console.log('digital_update: '+device);
					$.get('graphapi.php',{device_id:device,type:"digital"},function(data)
					{
						data.reverse();
						fillRegistroDigital(data);
					})
				}

			}

			function fillRegistroDigital(data)
			{
				
				var tabla = $("#tablaSensorDigital");
				tabla.hide("fade");
				tabla.html("");//limpio


				for (var i = data.length - 1; i >= 0; i--) {
					
					var reg = data[i];

					// convertir a los estados de Martin
					var state;

					switch(reg.binario)
					{
						case "2":
						state = "0";
						break;
						case "6":
						state = "1";
						break;
						case "7":
						state = "2";
						break;
						case "5":
						state = "3";
						break;
						case "1":
						state = "4";
						break;
						default:
						state = "null";
						break;

					}
					tabla.append('<tr><td><b>'+reg.fecha+'</b></td><td>'+reg.d1+'</td><td>'+reg.d2+'</td><td>'+reg.d3+'</td><td>'+state+'</td><td>obs</td><td>'+(reg.duracion+"").toHHMMSS()+' </td></tr>')
				
				}

				tabla.show("fade");




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