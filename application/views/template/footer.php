<script src="<?php echo base_url() ?>quixlab/plugins/common/common.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/custom.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/settings.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/gleek.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/styleSwitcher.js"></script>
<link href="<?php echo base_url() ?>quixlab/js/daterangepicker.js" rel="stylesheet">

<!-- Chartjs -->
<script src="<?php echo base_url() ?>quixlab/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="<?php echo base_url() ?>quixlab/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="<?php echo base_url() ?>quixlab/plugins/d3v3/index.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/topojson/topojson.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="<?php echo base_url() ?>quixlab/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="<?php echo base_url() ?>quixlab/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="<?php echo base_url() ?>quixlab/plugins/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>


<script src="<?php echo base_url() ?>quixlab/plugins/validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/validation/jquery.validate-init.js"></script>

<script src="<?php echo base_url() ?>quixlab/js/dashboard/dashboard-1.js"></script>

<!-- datatable -->
<script src="<?php echo base_url() ?>quixlab/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/summernote/dist/summernote-init.js"></script>

<!-- Grafik -->
<script src="<?php echo base_url() ?>quixlab/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/plugins-init/morris-init.js"></script>
<script src="<?php echo base_url() ?>quixlab/js/plugins-init/bs-daterange-picker-init.js"></script>
<script src="<?php echo base_url() ?>quixlab/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- <script src="<?php echo base_url() ?>quixlab/js/plugins-init/chartjs-init.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>

</body>
<script>
  $(".alert").fadeIn(5000).fadeOut(5000);

  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.bootstrap-select').selectpicker();
  //alert

    //GET UPDATE
    // $('.update-record').on('click',function(){
    var package_id = $(this).data('package_id');
    var package_name = $(this).data('package_name');
    $(".strings").val('');
    // $('#UpdateModal').modal('show');
    $('[name="edit_id"]').val(package_id);
    //AJAX REQUEST TO GET SELECTED PRODUCT
    $.ajax({
        url: "<?php echo site_url('disposisi/get_product_by_package');?>",
        method: "POST",
        data :{package_id:package_id},
        cache:false,
        success : function(data){
            var item=data;
            var val1=item.replace("[","");
            var val2=val1.replace("]","");
            var values=val2;
            $.each(values.split(","), function(i,e){
                $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                $(".strings").selectpicker('refresh');

            });
        }
        
    });
    return false;

    //GET CONFIRM DELETE
    // $('.delete-record').on('click',function(){
    // 	var package_id = $(this).data('package_id');
    // 	$('#DeleteModal').modal('show');
    // 	$('[name="delete_id"]').val(package_id);
    // });
    
  });

  <?php
    if ($this->uri->segment(2) == 'overview') { ?>
      (function ($) {
        "use strict";
    
        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }
    
        var mode = 'index'
        var intersect = true
    
        //Team chart
        var ctx     = document.getElementById("team-chart");
        ctx.height  = 400;
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['PENSIUN', 'PEMBAYARAN', 'PENGIRIMAN', 'WESEL'],
            datasets: [
              {
                backgroundColor: ['#843cf6', '#fc5286', '#ff763b', '#6a8eff'],
                borderColor: ['#843cf6', '#fc5286', '#ff763b', '#6a8eff'],
                data: [<?= $gajipensiunan; ?>, <?= $pembayaran; ?>, <?= $pengiriman; ?>, <?= $wesel; ?>]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: false
                },
                ticks: ticksStyle
              }]
            }
          }
        });
      })(jQuery);
    <?php }
  ?>
</script>

</html>