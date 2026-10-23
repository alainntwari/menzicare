<?php defined('MENZICARE_APP') || exit; ?>
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
        
        function users_list() 
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../users/users_list_2.php",false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }

        function create_new_user() 
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../users/create_new_user.php",false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }

        function view_user_details(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../users/user_details.php?id="+id,false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }

        function doctor_details(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../doctor-details/doctor_details.php?id="+id,false);
            xmlhttp.send(null);
            document.getElementById("content_here").innerHTML=xmlhttp.responseText; 

        }

        
    </script>

   

    


    <script>
        
        function healthcare_institutions_list() 
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../health-care-institutions/list_2.php",false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }

        function create_new_healthcare_institution() 
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../health-care-institutions/create_new.php",false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }

        function view_institution_details(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../health-care-institutions/institution_details.php?id="+id,false);
            xmlhttp.send(null);
            document.getElementById("main-content").innerHTML=xmlhttp.responseText; 

        }
    </script>

    <script>
      
    function add_insurance(intValue) 
     {
      var id = intValue;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","../app/add_insurance.php?insurance="+encodeURIComponent(document.getElementById("insurance").value)+"&type="+encodeURIComponent(document.getElementById("type").value)+"&id="+id,false);
      xmlhttp.send(null);
      document.getElementById("added_insurances").innerHTML=xmlhttp.responseText;
    }
    </script>
<script>
  
function specialties_hours(intValue) 
    {
        var id = intValue;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../users/specialties_hours.php?id="+id,false);
        xmlhttp.send(null);
        document.getElementById("home").innerHTML=xmlhttp.responseText; 

    }
</script>
    <script>
  function change_province()
 {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","province.php?province="+document.getElementById("provincedd").value,false);
  xmlhttp.send(null);
  document.getElementById("district").innerHTML=xmlhttp.responseText;
 }

 function change_district()
 {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","district.php?district="+document.getElementById("districtdd").value,false);
  xmlhttp.send(null);
  document.getElementById("sector").innerHTML=xmlhttp.responseText;
 }

 function change_sector()
 {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","sector.php?sector="+document.getElementById("sectordd").value,false);
  xmlhttp.send(null);
  document.getElementById("cell").innerHTML=xmlhttp.responseText;
 }

 function change_cell()
 {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","cell.php?cell="+document.getElementById("celldd").value,false);
  xmlhttp.send(null);
  document.getElementById("village").innerHTML=xmlhttp.responseText;
 }

    </script>

    <script>
        $("#ad1").click(function(){
  
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day1").value)+"&div="+encodeURIComponent(document.getElementById("div1").value),false);
        xmlhttp.send(null);
        document.getElementById("bo1").innerHTML=xmlhttp.responseText;
    });
    </script>

    <script>
       function next_day_1()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day1").value)+"&div="+encodeURIComponent(document.getElementById("div1").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id1").value),false);
        xmlhttp.send(null);
        document.getElementById("bo1").innerHTML=xmlhttp.responseText;
       }


       function next_day_2()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day2").value)+"&div="+encodeURIComponent(document.getElementById("div2").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id2").value),false);
        xmlhttp.send(null);
        document.getElementById("bo2").innerHTML=xmlhttp.responseText;
       }

       function next_day_3()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day3").value)+"&div="+encodeURIComponent(document.getElementById("div3").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id3").value),false);
        xmlhttp.send(null);
        document.getElementById("bo3").innerHTML=xmlhttp.responseText;
       }

       function next_day_4()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day4").value)+"&div="+encodeURIComponent(document.getElementById("div4").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id4").value),false);
        xmlhttp.send(null);
        document.getElementById("bo4").innerHTML=xmlhttp.responseText;
       }

       function next_day_5()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day5").value)+"&div="+encodeURIComponent(document.getElementById("div5").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id5").value),false);
        xmlhttp.send(null);
        document.getElementById("bo5").innerHTML=xmlhttp.responseText;
       }

       function next_day_6()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day6").value)+"&div="+encodeURIComponent(document.getElementById("div6").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id6").value),false);
        xmlhttp.send(null);
        document.getElementById("bo6").innerHTML=xmlhttp.responseText;
       }


       function next_day_7()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day7").value)+"&div="+encodeURIComponent(document.getElementById("div7").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id7").value),false);
        xmlhttp.send(null);
        document.getElementById("bo7").innerHTML=xmlhttp.responseText;
       }

       function next_day_8()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day8").value)+"&div="+encodeURIComponent(document.getElementById("div8").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id8").value),false);
        xmlhttp.send(null);
        document.getElementById("bo8").innerHTML=xmlhttp.responseText;
       }

       function next_day_9()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day9").value)+"&div="+encodeURIComponent(document.getElementById("div9").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id9").value),false);
        xmlhttp.send(null);
        document.getElementById("bo9").innerHTML=xmlhttp.responseText;
       }

       function next_day_10()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day10").value)+"&div="+encodeURIComponent(document.getElementById("div10").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id10").value),false);
        xmlhttp.send(null);
        document.getElementById("bo10").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function next_day_11()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day11").value)+"&div="+encodeURIComponent(document.getElementById("div11").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id11").value),false);
        xmlhttp.send(null);
        document.getElementById("bo11").innerHTML=xmlhttp.responseText;
       }


       function next_day_12()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day12").value)+"&div="+encodeURIComponent(document.getElementById("div12").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id12").value),false);
        xmlhttp.send(null);
        document.getElementById("bo12").innerHTML=xmlhttp.responseText;
       }

       function next_day_13()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day13").value)+"&div="+encodeURIComponent(document.getElementById("div13").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id13").value),false);
        xmlhttp.send(null);
        document.getElementById("bo13").innerHTML=xmlhttp.responseText;
       }

       function next_day_14()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day14").value)+"&div="+encodeURIComponent(document.getElementById("div14").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id14").value),false);
        xmlhttp.send(null);
        document.getElementById("bo14").innerHTML=xmlhttp.responseText;
       }

       function next_day_15()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day15").value)+"&div="+encodeURIComponent(document.getElementById("div15").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id15").value),false);
        xmlhttp.send(null);
        document.getElementById("bo15").innerHTML=xmlhttp.responseText;
       }

       function next_day_16()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day16").value)+"&div="+encodeURIComponent(document.getElementById("div16").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id16").value),false);
        xmlhttp.send(null);
        document.getElementById("bo16").innerHTML=xmlhttp.responseText;
       }


       function next_day_17()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day17").value)+"&div="+encodeURIComponent(document.getElementById("div17").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id17").value),false);
        xmlhttp.send(null);
        document.getElementById("bo17").innerHTML=xmlhttp.responseText;
       }

       function next_day_18()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day18").value)+"&div="+encodeURIComponent(document.getElementById("div18").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id18").value),false);
        xmlhttp.send(null);
        document.getElementById("bo18").innerHTML=xmlhttp.responseText;
       }

       function next_day_19()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day19").value)+"&div="+encodeURIComponent(document.getElementById("div19").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id19").value),false);
        xmlhttp.send(null);
        document.getElementById("bo19").innerHTML=xmlhttp.responseText;
       }

       function next_day_20()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day20").value)+"&div="+encodeURIComponent(document.getElementById("div20").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id20").value),false);
        xmlhttp.send(null);
        document.getElementById("bo20").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function next_day_21()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day21").value)+"&div="+encodeURIComponent(document.getElementById("div21").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id21").value),false);
        xmlhttp.send(null);
        document.getElementById("bo21").innerHTML=xmlhttp.responseText;
       }


       function next_day_22()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day22").value)+"&div="+encodeURIComponent(document.getElementById("div22").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id22").value),false);
        xmlhttp.send(null);
        document.getElementById("bo22").innerHTML=xmlhttp.responseText;
       }

       function next_day_23()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day23").value)+"&div="+encodeURIComponent(document.getElementById("div23").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id23").value),false);
        xmlhttp.send(null);
        document.getElementById("bo23").innerHTML=xmlhttp.responseText;
       }

       function next_day_24()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day24").value)+"&div="+encodeURIComponent(document.getElementById("div24").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id24").value),false);
        xmlhttp.send(null);
        document.getElementById("bo24").innerHTML=xmlhttp.responseText;
       }

       function next_day_25()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day25").value)+"&div="+encodeURIComponent(document.getElementById("div25").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id25").value),false);
        xmlhttp.send(null);
        document.getElementById("bo25").innerHTML=xmlhttp.responseText;
       }

       function next_day_26()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day26").value)+"&div="+encodeURIComponent(document.getElementById("div26").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id26").value),false);
        xmlhttp.send(null);
        document.getElementById("bo26").innerHTML=xmlhttp.responseText;
       }


       function next_day_27()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day27").value)+"&div="+encodeURIComponent(document.getElementById("div27").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id27").value),false);
        xmlhttp.send(null);
        document.getElementById("bo27").innerHTML=xmlhttp.responseText;
       }

       function next_day_28()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day28").value)+"&div="+encodeURIComponent(document.getElementById("div28").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id28").value),false);
        xmlhttp.send(null);
        document.getElementById("bo28").innerHTML=xmlhttp.responseText;
       }

       function next_day_29()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day29").value)+"&div="+encodeURIComponent(document.getElementById("div29").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id29").value),false);
        xmlhttp.send(null);
        document.getElementById("bo29").innerHTML=xmlhttp.responseText;
       }

       function next_day_30()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day30").value)+"&div="+encodeURIComponent(document.getElementById("div30").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id30").value),false);
        xmlhttp.send(null);
        document.getElementById("bo30").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function next_day_31()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day31").value)+"&div="+encodeURIComponent(document.getElementById("div31").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id31").value),false);
        xmlhttp.send(null);
        document.getElementById("bo31").innerHTML=xmlhttp.responseText;
       }


       function next_day_32()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day32").value)+"&div="+encodeURIComponent(document.getElementById("div32").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id32").value),false);
        xmlhttp.send(null);
        document.getElementById("bo32").innerHTML=xmlhttp.responseText;
       }

       function next_day_33()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day33").value)+"&div="+encodeURIComponent(document.getElementById("div33").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id33").value),false);
        xmlhttp.send(null);
        document.getElementById("bo33").innerHTML=xmlhttp.responseText;
       }

       function next_day_34()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day34").value)+"&div="+encodeURIComponent(document.getElementById("div34").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id34").value),false);
        xmlhttp.send(null);
        document.getElementById("bo34").innerHTML=xmlhttp.responseText;
       }

       function next_day_35()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day35").value)+"&div="+encodeURIComponent(document.getElementById("div35").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id35").value),false);
        xmlhttp.send(null);
        document.getElementById("bo35").innerHTML=xmlhttp.responseText;
       }

       function next_day_36()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day36").value)+"&div="+encodeURIComponent(document.getElementById("div36").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id36").value),false);
        xmlhttp.send(null);
        document.getElementById("bo36").innerHTML=xmlhttp.responseText;
       }


       function next_day_37()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day37").value)+"&div="+encodeURIComponent(document.getElementById("div37").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id37").value),false);
        xmlhttp.send(null);
        document.getElementById("bo37").innerHTML=xmlhttp.responseText;
       }

       function next_day_38()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day38").value)+"&div="+encodeURIComponent(document.getElementById("div38").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id38").value),false);
        xmlhttp.send(null);
        document.getElementById("bo38").innerHTML=xmlhttp.responseText;
       }

       function next_day_39()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day39").value)+"&div="+encodeURIComponent(document.getElementById("div39").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id39").value),false);
        xmlhttp.send(null);
        document.getElementById("bo39").innerHTML=xmlhttp.responseText;
       }

       function next_day_40()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day40").value)+"&div="+encodeURIComponent(document.getElementById("div40").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id40").value),false);
        xmlhttp.send(null);
        document.getElementById("bo40").innerHTML=xmlhttp.responseText;
       }
    </script>


    <script>
       function next_day_41()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day41").value)+"&div="+encodeURIComponent(document.getElementById("div41").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id41").value),false);
        xmlhttp.send(null);
        document.getElementById("bo41").innerHTML=xmlhttp.responseText;
       }


       function next_day_42()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day42").value)+"&div="+encodeURIComponent(document.getElementById("div42").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id42").value),false);
        xmlhttp.send(null);
        document.getElementById("bo42").innerHTML=xmlhttp.responseText;
       }

       function next_day_43()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day43").value)+"&div="+encodeURIComponent(document.getElementById("div43").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id43").value),false);
        xmlhttp.send(null);
        document.getElementById("bo43").innerHTML=xmlhttp.responseText;
       }

       function next_day_44()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day44").value)+"&div="+encodeURIComponent(document.getElementById("div44").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id44").value),false);
        xmlhttp.send(null);
        document.getElementById("bo44").innerHTML=xmlhttp.responseText;
       }

       function next_day_45()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day45").value)+"&div="+encodeURIComponent(document.getElementById("div45").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id45").value),false);
        xmlhttp.send(null);
        document.getElementById("bo45").innerHTML=xmlhttp.responseText;
       }

       function next_day_46()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day46").value)+"&div="+encodeURIComponent(document.getElementById("div46").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id46").value),false);
        xmlhttp.send(null);
        document.getElementById("bo46").innerHTML=xmlhttp.responseText;
       }


       function next_day_47()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day47").value)+"&div="+encodeURIComponent(document.getElementById("div47").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id47").value),false);
        xmlhttp.send(null);
        document.getElementById("bo47").innerHTML=xmlhttp.responseText;
       }

       function next_day_48()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day48").value)+"&div="+encodeURIComponent(document.getElementById("div48").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id48").value),false);
        xmlhttp.send(null);
        document.getElementById("bo48").innerHTML=xmlhttp.responseText;
       }

       function next_day_49()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day49").value)+"&div="+encodeURIComponent(document.getElementById("div49").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id49").value),false);
        xmlhttp.send(null);
        document.getElementById("bo49").innerHTML=xmlhttp.responseText;
       }

       function next_day_50()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/next-day.php?day="+encodeURIComponent(document.getElementById("day50").value)+"&div="+encodeURIComponent(document.getElementById("div50").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id50").value),false);
        xmlhttp.send(null);
        document.getElementById("bo50").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function prev_day_1()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day1").value)+"&div="+encodeURIComponent(document.getElementById("div1").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id1").value),false);
        xmlhttp.send(null);
        document.getElementById("bo1").innerHTML=xmlhttp.responseText;
       }


       function prev_day_2()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day2").value)+"&div="+encodeURIComponent(document.getElementById("div2").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id2").value),false);
        xmlhttp.send(null);
        document.getElementById("bo2").innerHTML=xmlhttp.responseText;
       }

       function prev_day_3()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day3").value)+"&div="+encodeURIComponent(document.getElementById("div3").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id3").value),false);
        xmlhttp.send(null);
        document.getElementById("bo3").innerHTML=xmlhttp.responseText;
       }

       function prev_day_4()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day4").value)+"&div="+encodeURIComponent(document.getElementById("div4").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id4").value),false);
        xmlhttp.send(null);
        document.getElementById("bo4").innerHTML=xmlhttp.responseText;
       }

      
       function prev_day_5()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day5").value)+"&div="+encodeURIComponent(document.getElementById("div5").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id5").value),false);
        xmlhttp.send(null);
        document.getElementById("bo5").innerHTML=xmlhttp.responseText;
       }

       function prev_day_6()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day6").value)+"&div="+encodeURIComponent(document.getElementById("div6").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id6").value),false);
        xmlhttp.send(null);
        document.getElementById("bo6").innerHTML=xmlhttp.responseText;
       }


       function prev_day_7()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day7").value)+"&div="+encodeURIComponent(document.getElementById("div7").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id7").value),false);
        xmlhttp.send(null);
        document.getElementById("bo7").innerHTML=xmlhttp.responseText;
       }

       function prev_day_8()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day8").value)+"&div="+encodeURIComponent(document.getElementById("div8").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id8").value),false);
        xmlhttp.send(null);
        document.getElementById("bo8").innerHTML=xmlhttp.responseText;
       }

       function prev_day_9()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day9").value)+"&div="+encodeURIComponent(document.getElementById("div9").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id9").value),false);
        xmlhttp.send(null);
        document.getElementById("bo9").innerHTML=xmlhttp.responseText;
       }

       function prev_day_10()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day10").value)+"&div="+encodeURIComponent(document.getElementById("div10").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id10").value),false);
        xmlhttp.send(null);
        document.getElementById("bo10").innerHTML=xmlhttp.responseText;
       }
    </script>
    <script>
       function prev_day_11()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day11").value)+"&div="+encodeURIComponent(document.getElementById("div11").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id11").value),false);
        xmlhttp.send(null);
        document.getElementById("bo11").innerHTML=xmlhttp.responseText;
       }


       function prev_day_12()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day12").value)+"&div="+encodeURIComponent(document.getElementById("div12").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id12").value),false);
        xmlhttp.send(null);
        document.getElementById("bo12").innerHTML=xmlhttp.responseText;
       }

       function prev_day_13()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day13").value)+"&div="+encodeURIComponent(document.getElementById("div13").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id13").value),false);
        xmlhttp.send(null);
        document.getElementById("bo13").innerHTML=xmlhttp.responseText;
       }

       function prev_day_14()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day14").value)+"&div="+encodeURIComponent(document.getElementById("div14").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id14").value),false);
        xmlhttp.send(null);
        document.getElementById("bo14").innerHTML=xmlhttp.responseText;
       }

      
       function prev_day_15()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day15").value)+"&div="+encodeURIComponent(document.getElementById("div15").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id15").value),false);
        xmlhttp.send(null);
        document.getElementById("bo15").innerHTML=xmlhttp.responseText;
       }

       function prev_day_16()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day16").value)+"&div="+encodeURIComponent(document.getElementById("div16").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id16").value),false);
        xmlhttp.send(null);
        document.getElementById("bo16").innerHTML=xmlhttp.responseText;
       }


       function prev_day_17()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day17").value)+"&div="+encodeURIComponent(document.getElementById("div17").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id17").value),false);
        xmlhttp.send(null);
        document.getElementById("bo17").innerHTML=xmlhttp.responseText;
       }

       function prev_day_18()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day18").value)+"&div="+encodeURIComponent(document.getElementById("div18").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id18").value),false);
        xmlhttp.send(null);
        document.getElementById("bo18").innerHTML=xmlhttp.responseText;
       }

       function prev_day_19()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day19").value)+"&div="+encodeURIComponent(document.getElementById("div19").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id19").value),false);
        xmlhttp.send(null);
        document.getElementById("bo19").innerHTML=xmlhttp.responseText;
       }

       function prev_day_20()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day20").value)+"&div="+encodeURIComponent(document.getElementById("div20").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id20").value),false);
        xmlhttp.send(null);
        document.getElementById("bo20").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function prev_day_21()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day21").value)+"&div="+encodeURIComponent(document.getElementById("div21").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id21").value),false);
        xmlhttp.send(null);
        document.getElementById("bo21").innerHTML=xmlhttp.responseText;
       }


       function prev_day_22()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day22").value)+"&div="+encodeURIComponent(document.getElementById("div22").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id22").value),false);
        xmlhttp.send(null);
        document.getElementById("bo22").innerHTML=xmlhttp.responseText;
       }

       function prev_day_23()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day23").value)+"&div="+encodeURIComponent(document.getElementById("div23").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id23").value),false);
        xmlhttp.send(null);
        document.getElementById("bo23").innerHTML=xmlhttp.responseText;
       }

       function prev_day_24()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day24").value)+"&div="+encodeURIComponent(document.getElementById("div24").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id24").value),false);
        xmlhttp.send(null);
        document.getElementById("bo24").innerHTML=xmlhttp.responseText;
       }

      
       function prev_day_25()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day25").value)+"&div="+encodeURIComponent(document.getElementById("div25").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id25").value),false);
        xmlhttp.send(null);
        document.getElementById("bo25").innerHTML=xmlhttp.responseText;
       }

       function prev_day_26()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day26").value)+"&div="+encodeURIComponent(document.getElementById("div26").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id26").value),false);
        xmlhttp.send(null);
        document.getElementById("bo26").innerHTML=xmlhttp.responseText;
       }


       function prev_day_27()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day27").value)+"&div="+encodeURIComponent(document.getElementById("div27").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id27").value),false);
        xmlhttp.send(null);
        document.getElementById("bo27").innerHTML=xmlhttp.responseText;
       }

       function prev_day_28()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day28").value)+"&div="+encodeURIComponent(document.getElementById("div28").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id28").value),false);
        xmlhttp.send(null);
        document.getElementById("bo28").innerHTML=xmlhttp.responseText;
       }

       function prev_day_29()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day29").value)+"&div="+encodeURIComponent(document.getElementById("div29").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id29").value),false);
        xmlhttp.send(null);
        document.getElementById("bo29").innerHTML=xmlhttp.responseText;
       }

       function prev_day_30()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day30").value)+"&div="+encodeURIComponent(document.getElementById("div30").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id30").value),false);
        xmlhttp.send(null);
        document.getElementById("bo30").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function prev_day_31()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day31").value)+"&div="+encodeURIComponent(document.getElementById("div31").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id31").value),false);
        xmlhttp.send(null);
        document.getElementById("bo31").innerHTML=xmlhttp.responseText;
       }


       function prev_day_32()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day32").value)+"&div="+encodeURIComponent(document.getElementById("div32").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id32").value),false);
        xmlhttp.send(null);
        document.getElementById("bo32").innerHTML=xmlhttp.responseText;
       }

       function prev_day_33()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day33").value)+"&div="+encodeURIComponent(document.getElementById("div33").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id33").value),false);
        xmlhttp.send(null);
        document.getElementById("bo33").innerHTML=xmlhttp.responseText;
       }

       function prev_day_34()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day34").value)+"&div="+encodeURIComponent(document.getElementById("div34").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id34").value),false);
        xmlhttp.send(null);
        document.getElementById("bo34").innerHTML=xmlhttp.responseText;
       }

      
       function prev_day_35()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day35").value)+"&div="+encodeURIComponent(document.getElementById("div35").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id35").value),false);
        xmlhttp.send(null);
        document.getElementById("bo35").innerHTML=xmlhttp.responseText;
       }

       function prev_day_36()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day36").value)+"&div="+encodeURIComponent(document.getElementById("div36").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id36").value),false);
        xmlhttp.send(null);
        document.getElementById("bo36").innerHTML=xmlhttp.responseText;
       }


       function prev_day_37()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day37").value)+"&div="+encodeURIComponent(document.getElementById("div37").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id37").value),false);
        xmlhttp.send(null);
        document.getElementById("bo37").innerHTML=xmlhttp.responseText;
       }

       function prev_day_38()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day38").value)+"&div="+encodeURIComponent(document.getElementById("div38").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id38").value),false);
        xmlhttp.send(null);
        document.getElementById("bo38").innerHTML=xmlhttp.responseText;
       }

       function prev_day_39()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day39").value)+"&div="+encodeURIComponent(document.getElementById("div39").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id39").value),false);
        xmlhttp.send(null);
        document.getElementById("bo39").innerHTML=xmlhttp.responseText;
       }

       function prev_day_40()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day40").value)+"&div="+encodeURIComponent(document.getElementById("div40").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id40").value),false);
        xmlhttp.send(null);
        document.getElementById("bo40").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
       function prev_day_41()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day41").value)+"&div="+encodeURIComponent(document.getElementById("div41").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id41").value),false);
        xmlhttp.send(null);
        document.getElementById("bo31").innerHTML=xmlhttp.responseText;
       }


       function prev_day_42()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day42").value)+"&div="+encodeURIComponent(document.getElementById("div42").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id42").value),false);
        xmlhttp.send(null);
        document.getElementById("bo32").innerHTML=xmlhttp.responseText;
       }

       function prev_day_43()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day43").value)+"&div="+encodeURIComponent(document.getElementById("div43").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id43").value),false);
        xmlhttp.send(null);
        document.getElementById("bo33").innerHTML=xmlhttp.responseText;
       }

       function prev_day_44()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day44").value)+"&div="+encodeURIComponent(document.getElementById("div44").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id44").value),false);
        xmlhttp.send(null);
        document.getElementById("bo34").innerHTML=xmlhttp.responseText;
       }

      
       function prev_day_45()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day45").value)+"&div="+encodeURIComponent(document.getElementById("div45").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id45").value),false);
        xmlhttp.send(null);
        document.getElementById("bo35").innerHTML=xmlhttp.responseText;
       }

       function prev_day_46()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day46").value)+"&div="+encodeURIComponent(document.getElementById("div46").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id46").value),false);
        xmlhttp.send(null);
        document.getElementById("bo36").innerHTML=xmlhttp.responseText;
       }


       function prev_day_47()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day47").value)+"&div="+encodeURIComponent(document.getElementById("div47").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id47").value),false);
        xmlhttp.send(null);
        document.getElementById("bo37").innerHTML=xmlhttp.responseText;
       }

       function prev_day_48()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day48").value)+"&div="+encodeURIComponent(document.getElementById("div48").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id48").value),false);
        xmlhttp.send(null);
        document.getElementById("bo38").innerHTML=xmlhttp.responseText;
       }

       function prev_day_49()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day49").value)+"&div="+encodeURIComponent(document.getElementById("div49").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id49").value),false);
        xmlhttp.send(null);
        document.getElementById("bo39").innerHTML=xmlhttp.responseText;
       }

       function prev_day_50()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../doctor-appointments/prev-day.php?day="+encodeURIComponent(document.getElementById("day50").value)+"&div="+encodeURIComponent(document.getElementById("div50").value)+"&ds_id="+encodeURIComponent(document.getElementById("ds_id50").value),false);
        xmlhttp.send(null);
        document.getElementById("bo50").innerHTML=xmlhttp.responseText;
       }
    </script>

    <script>
        $("#d1").click(function(){
  $("#a1").show(1000);
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d2").click(function(){
  $("#a1").hide();
  $("#a2").show(1000);
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d3").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").show(1000);
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d4").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").show(1000);
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d5").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").show(1000);
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d6").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").show(1000);
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d7").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").show(1000);
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d8").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").show(1000);
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d9").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").show(1000);
  $("#a10").hide();
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d10").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").show(1000);
  $("#a11").hide();
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d11").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a11").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d12").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a12").show(1000);
  $("#a11").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d13").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a13").show(1000);
  $("#a12").hide();
  $("#a11").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d14").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a14").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a11").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d15").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a15").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a11").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d16").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a16").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a11").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d17").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a17").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a11").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d18").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a18").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a11").hide();
  $("#a19").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});

$("#d19").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a19").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a11").hide();
  $("#a20").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d20").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a20").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d21").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a21").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a20").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d22").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a22").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a20").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d23").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a23").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a20").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d24").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a24").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a20").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d25").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a25").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a20").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d26").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a26").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a20").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d27").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a27").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a20").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d28").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a28").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a20").hide();
  $("#a29").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d29").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a29").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a20").hide();
  $("#a30").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d30").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a30").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});



$("#d31").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a31").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a30").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d32").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a32").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a30").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d33").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a33").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a30").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d34").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a34").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a30").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d35").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a35").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a30").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d36").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a36").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a30").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d37").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a37").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a30").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d38").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a38").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a30").hide();
  $("#a39").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d39").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a39").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a30").hide();
  $("#a40").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d40").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a40").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d41").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a41").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a40").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d42").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a42").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a40").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d43").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a43").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a40").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d44").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a44").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a40").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d45").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a45").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a40").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d46").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a46").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a40").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d47").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a47").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a40").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d48").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a48").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a40").hide();
  $("#a49").hide();
  $("#a50").hide();
});


$("#d49").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a49").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a40").hide();
  $("#a50").hide();
});


$("#d50").click(function(){
  $("#a1").hide();
  $("#a2").hide();
  $("#a3").hide();
  $("#a4").hide();
  $("#a5").hide();
  $("#a6").hide();
  $("#a7").hide();
  $("#a8").hide();
  $("#a9").hide();
  $("#a10").hide();
  $("#a50").show(1000);
  $("#a12").hide();
  $("#a13").hide();
  $("#a14").hide();
  $("#a15").hide();
  $("#a16").hide();
  $("#a17").hide();
  $("#a18").hide();
  $("#a19").hide();
  $("#a11").hide();
  $("#a21").hide();
  $("#a22").hide();
  $("#a23").hide();
  $("#a24").hide();
  $("#a25").hide();
  $("#a26").hide();
  $("#a27").hide();
  $("#a28").hide();
  $("#a29").hide();
  $("#a20").hide();
  $("#a31").hide();
  $("#a32").hide();
  $("#a33").hide();
  $("#a34").hide();
  $("#a35").hide();
  $("#a36").hide();
  $("#a37").hide();
  $("#a38").hide();
  $("#a39").hide();
  $("#a30").hide();
  $("#a41").hide();
  $("#a42").hide();
  $("#a43").hide();
  $("#a44").hide();
  $("#a45").hide();
  $("#a46").hide();
  $("#a47").hide();
  $("#a48").hide();
  $("#a49").hide();
  $("#a40").hide();
});
    </script>
 


    <script>
       function search_all()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../app/search_all.php?item="+encodeURIComponent(document.getElementById("search-item").value)+"&location="+encodeURIComponent(document.getElementById("search-location").value),false);
        xmlhttp.send(null);
        document.getElementById("content-id").innerHTML=xmlhttp.responseText;
       }
    </script> 

     <script>
       function search_test()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../app/search_test.php?test="+encodeURIComponent(document.getElementById("search-test").value)+"&location="+encodeURIComponent(document.getElementById("search-location").value),false);
        xmlhttp.send(null);
        document.getElementById("content-id").innerHTML=xmlhttp.responseText;
       }
    </script> 

    <script>
     

       function search_test_id(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../app/search_test_id.php?test="+id,false);
            xmlhttp.send(null);
            document.getElementById("content_here").innerHTML=xmlhttp.responseText; 

        }
    </script> 


     <script>
       function search_vaccine()
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../app/search_vaccine.php?vaccine="+encodeURIComponent(document.getElementById("search-vaccine").value)+"&location="+encodeURIComponent(document.getElementById("search-location").value),false);
        xmlhttp.send(null);
        document.getElementById("content-id").innerHTML=xmlhttp.responseText;
       }
    </script> 

    <script>
     

       function search_vaccine_id(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../app/search_vaccine_id.php?vaccine="+id,false);
            xmlhttp.send(null);
            document.getElementById("content_here").innerHTML=xmlhttp.responseText; 

        }
    </script> 



     <script>
     

       function request_permission_to_patient(intValue) 
        {
            var id = intValue;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST","../app/request_patient_permission.php",false);
            xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xmlhttp.send("id="+encodeURIComponent(id)+"&csrf_token="+encodeURIComponent(document.querySelector('meta[name="csrf-token"]').content));
            document.getElementById("otp_area").innerHTML=xmlhttp.responseText; 

        }
    </script> 

    
    <script src="//code.tidio.co/efkpzsuefadxrudgphrfn1asnj2uiksd.js" async></script>
