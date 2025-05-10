   <!--include at last  -->

   <!-- global js file  -->
   <script src="<?php echo $commonToPan; ?>script.js"></script>

   <!--   Core JS Files   -->
   <script src="<?php echo $aAssetsJsCore; ?>jquery-3.7.1.min.js"></script>
   <script src="<?php echo $aAssetsJsCore; ?>popper.min.js"></script>
   <script src="<?php echo $aAssetsJsCore; ?>bootstrap.min.js"></script>

   <!-- jQuery Scrollbar -->
   <script src="<?php echo $aAssetsJsPluginsJqsb; ?>jquery.scrollbar.min.js"></script>

   <!-- Chart JS -->
   <script src="<?php echo $aAssetsJsPlugins; ?>chart.js/chart.min.js"></script>

   <!-- jQuery Sparkline -->
   <script src="<?php echo $aAssetsJsPlugins; ?>jquery.sparkline/jquery.sparkline.min.js"></script>

   <!-- Chart Circle -->
   <script src="<?php echo $aAssetsJsPluginsCC; ?>circles.min.js"></script>

   <!-- Datatables -->
   <script src="<?php echo $aAssetsJsPluginsDataTbl; ?>datatables.min.js"></script>

   <!-- Bootstrap Notify -->
   <script src="<?php echo $aAssetsJsPluginsBootNoti; ?>bootstrap-notify.min.js"></script>

   <!-- jQuery Vector Maps -->
   <script src="<?php echo $aAssetsJsPluginsJsvectormap; ?>jsvectormap.min.js"></script>
   <script src="<?php echo $aAssetsJsPluginsJsvectormap; ?>world.js"></script>

   <!-- Sweet Alert -->
   <script src="<?php echo $aAssetsJsPluginsSweetAlt; ?>sweetalert.min.js"></script>

   <!-- Kaiadmin JS -->
   <script src="<?php echo $aAssetsJs; ?>kaiadmin.min.js"></script>

   <!-- Kaiadmin DEMO methods, don't include it in your project! -->
   <script src="<?php echo $aAssetsJs; ?>setting-demo.js"></script>
   <!-- <script src="../assets/js/demo.js"></script> -->
   <script>
     $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
       type: "line",
       height: "70",
       width: "100%",
       lineWidth: "2",
       lineColor: "#177dff",
       fillColor: "rgba(23, 125, 255, 0.14)",
     });

     $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
       type: "line",
       height: "70",
       width: "100%",
       lineWidth: "2",
       lineColor: "#f3545d",
       fillColor: "rgba(243, 84, 93, .14)",
     });

     $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
       type: "line",
       height: "70",
       width: "100%",
       lineWidth: "2",
       lineColor: "#ffa534",
       fillColor: "rgba(255, 165, 52, .14)",
     });
   </script>

   <!-- bootstrap scripts  -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </body>

   </html>