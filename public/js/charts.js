google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

function drawChart() {

$.getJSON("/restapp-rest/public/index.php/admin/colum", function (datos) {
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
$.getJSON("/restapp-rest/public/index.php/admin/colum1", function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
          data.addRows([
            [item.firstname, item.total],
            ])
          })

        var options = {
          title: 'Company Employees',
          hAxis: {title: 'Mozos', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
  });
//////
$.getJSON("/restapp-rest/public/index.php/admin/mesasXmozo", function (datos) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Total');
          
          $.each(datos, function(id, item){
          data.addRows([
            [item.firstname, item.total],
            ])
          })

        var options = {
          title: 'Company Employees',
          hAxis: {title: 'Mozos', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
  });
//////
$.getJSON("/restapp-rest/public/index.php/admin/cargagraficos", function (datos) {
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