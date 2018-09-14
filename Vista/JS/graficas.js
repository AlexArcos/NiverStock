generarGraficoBD();

/*function generarGrafico(){
	google.charts.load('current', {'packages':['corechart','bar']});
    google.charts.setOnLoadCallback(graficar);

      function graficar() {
      	//Datos a graficar
        var data = google.visualization.arrayToDataTable([
          ['Meses', 'Calificaciones'],
          ['Julio', 80],
          ['Agosto', 90],
          ['Septiembre', 70],
          ['Octubre', 60],
          ['Septiembre', 85],
          ['Noviembre', 78],
          ['Diciembre', 90],
        ]);

        //Configuraciones de opciones del grafico
        var options = {
            title: 'Calificaciones ultimo semestre',
            subtitle: 'Consolidado: 2018',
            hAxis: {title:"Meses", titleTextStyle: {color: 'black'}},
            vAxis: {title:"Calificaciones", titleTextStyle: {color: 'black'}},
        };

        //Validar tipo de gráfico
        if(document.getElementById('tipoGrafico').value === '1'){
        	chart = new google.charts.Bar(document.getElementById('grafico'));
        }else{
        	chart = new google.visualization.PieChart(document.getElementById('grafico'));
        }
        chart.draw(data,google.charts.Bar.convertOptions(options));
      }
}*/

function generarGraficoBD(){
	google.charts.load('current', {'packages':['corechart','bar']});
    google.charts.setOnLoadCallback(graficar);

      function graficar() {
        var x = $("#opcion").val();
      	//Obtener los datos mediante ajax
        var datos = $.ajax({
        	url: "../../Controlador/ctrlGraficas.php",
        	data: {opcion: x},
        	dataType: 'json',
        	async: false
        }).responseText;
        
        datos = JSON.parse(datos);
        var data = google.visualization.arrayToDataTable(datos);

        var tit;
        if(x == 1){
        	tit = "mes";
        }else if(x == 2){
        	tit = "placa";
        }else{
        	tit = "cliente";
        };

        //Configuraciones de opciones del grafico
        var options = {
            title: 'Cantidad de carros alquilados por '+tit,
            subtitle: 'Alquileres: 2018',
            colors: ['#1b9e77'],
            vAxis: {title:"Cantidad", titleTextStyle: {color: 'black'}},
          	is3D: true,
          	slices: {
            0: { color: 'gray' },
            1: { color: '#3498DB' }
          }
        };

        //Validar tipo de gráfico
        if(document.getElementById('tipoGrafico').value === '1'){
        	chart = new google.charts.Bar(document.getElementById('grafico'));
        }else{
        	chart = new google.visualization.PieChart(document.getElementById('grafico'));
        }
        chart.draw(data,google.charts.Bar.convertOptions(options));
      }
}