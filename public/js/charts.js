google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

function drawChart() {

$.getJSON("/restappadmin/public/index.php/admin/colum", function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Meses');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
          data.addRows([
            [item.fecha, item.total],
            ])
          })

        var options = {
          title: 'Company Sales',
          hAxis: {title: 'Meses', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
  });
//////
$.getJSON("/restappadmin/public/index.php/admin/cargagraficos", function (datos) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Categories');
    data.addColumn('number', 'Cantidad');
    $.each(datos, function(id, item){
    data.addRows([
          [item.name, parseInt(item.quantity)],        
    ])
    var tds = '<tr><td>'+item.name+'</td><td>'+parseInt(item.quantity)+'</td></tr>';
    $("#cat tbody").append(tds);
    })

    var donutoptions = {
          title: 'Porcentaje de productos vendidos',
          is3D: true
        };

    var chart3 = new google.visualization.PieChart(document.getElementById('piechart'));
        chart3.draw(data, donutoptions);
});

}