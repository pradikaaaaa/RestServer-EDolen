
        <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url()?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>assets/dist/js/sb-admin-2.js"></script>
    <script src="<?=base_url()?>assets/dist/DataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable({
                "processing":true,
                "serverSide":true,
                "lengthMenu":[[6,10,-1],[6,10,"All"]],
                "ajax":{
                    url : "<?php echo site_url('admin/data_server') ?>",
                    type : "POST"
                },
                "columnDefs":
                [

                    {
                        "targets":0,
                        "data":"nama_wisata",
                    },
                    {
                        "targets":1,
                        "data":"alamat",
                    },
                    {
                        "targets":2,
                        "data":"deskripsi",
                    },
                    {
                        "targets":3,
                        "data":"longitude",
                    },
                    {
                        "targets":4,
                        "data":"latitude",
                    },
                    {
                        "targets":5,
                        "data":"image",
                        "render":function(data,type,full,meta){
                            return '<img src="<?=base_url()?>assets/image/'+data+'" width="100">';
                        }
                    },
                    {
					"targets":6,
					"data":null,
					"searchable":false,
					"render":function(data,type,full,meta){
						return '<a class="btn btn-warning" href="<?=site_url()?>/wisata/updateReview/'+data["id"]+'">Edit</a>';
					    }
				    },
				    {
					"targets":7,
					"data":null,
					"searchable":false,
					"render":function(data,type,full,meta){
						return '<a class="btn btn-danger" href="<?=site_url()?>/post/deleteReview/'+data["id"]+'">Delete</a>';
					    }
				    },
                ]
            });
        });
    </script>

</body>
</html>