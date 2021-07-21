<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src=" http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
   
    <script type="text/javascript">
    // <![CDATA[
    $(document).ready(function () {
        $(function () {
            $( "#autocomplete" ).autocomplete({
                source: function(request, response) {
                    $.ajax({ 
                        url: "<?php echo site_url('admin_barang/new_pinjam_barang_tambah'); ?>",
                        data: { id_user_barang: $("#autocomplete").val()},
                        dataType: "json",
                        type: "POST",
                        success: function(data){
                            response(data);
                        }    
                    });
                },


            });
        });
    });
    // ]]>
    </script>