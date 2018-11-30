<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="dist/bootstrap-treeview.min.css" type="text/css" media="all">
    <script src="dist/bootstrap-treeview.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Bootstrap Treeview with PHP and MySQL</h2>
        <div class="row">
            <div class="col-md-6" id="treeview">
            </div>
        </div>
    </div>


    <script>
        jQuery(document).ready(function(){
            jQuery.ajax({
                url: "response.php",
                cache: false,
                success: function(response){
                    $('#treeview').treeview({data: response});
                }
            });
        });
    </script>
    
</body>
</html>