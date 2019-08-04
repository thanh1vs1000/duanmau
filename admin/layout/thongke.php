<?php 
  $sql ="SELECT COUNT(*) AS total FROM sanphamadd WHERE cat_id = '52'";
  $sql2 ="SELECT COUNT(*) AS total2 FROM sanphamadd WHERE cat_id = '53'";
  $sql3 ="SELECT COUNT(*) AS total3 FROM sanphamadd WHERE cat_id = '51'";
  $sql4 ="SELECT COUNT(*) AS total4 FROM sanphamadd WHERE cat_id = '54'";
  $sql5 ="SELECT COUNT(*) AS total5 FROM sanphamadd WHERE cat_id = '55'";
  $result = mysqli_query($conn, $sql);
  $values = mysqli_fetch_assoc($result);
  $num_rows =$values['total'];

  $result2 = mysqli_query($conn, $sql2);
  $values2 = mysqli_fetch_assoc($result2);
  $num_rows2 =$values2['total2'];

  $result3 = mysqli_query($conn, $sql3);
  $values3 = mysqli_fetch_assoc($result3);
  $num_rows3 =$values3['total3'];

  $result4 = mysqli_query($conn, $sql4);
  $values4 = mysqli_fetch_assoc($result4);
  $num_rows4 =$values4['total4'];

  $result5 = mysqli_query($conn, $sql5);
  $values5 = mysqli_fetch_assoc($result5);
  $num_rows5 =$values5['total5'];

 ?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Đồng Hồ',     <?php echo $num_rows ?>],
          ['Nước Hoa',      <?php echo $num_rows2 ?>],
          ['Điện Thoại',  <?php echo $num_rows3 ?>],
          ['Máy Ảnh', <?php echo $num_rows4 ?>],
          ['Laptop',    <?php echo $num_rows5 ?>]
        ]);

        var options = {
          title: 'Bảng thống kê số lượng hàng hóa'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
  <center><div id="piechart" style="width: 1200px; height: 600px; margin-top: 50px;	"></div></center>
     <div id="chart_div" style="width: 100%; height: 500px;"></div>

