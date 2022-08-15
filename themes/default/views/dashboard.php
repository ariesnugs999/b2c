<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#ITable').DataTable( {
            dom:"Bfrtip",
            bAutoWidth: false,
            // scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            buttons:        [
              {
                extend: 'excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
              },
              {
                extend: 'pdf',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
              }
            ],
            // fixedColumns:   {
            //     leftColumns: 3
            // }
            
        } );
    } );
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary card">
                <div class="box-header card-header">
                    <h6 class="box-title card-title"><?= lang('dashboard'); ?></h6>
                </div>
                <div class="box-body card-body">
                    <div class="table-responsive py-4" style="font-size:12px;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
