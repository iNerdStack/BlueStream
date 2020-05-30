<link rel="stylesheet" href="others/plugins/font-awesome/css/font-awesome.min.css">

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="others/dist/css/adminlte.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="others/plugins/iCheck/flat/blue.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="others/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="js/ckeditor/contents.css">


<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="js/ckeditor/ckeditor.js"  crossorigin="anonymous"></script>


<style>

    .topnav {
        overflow: hidden;
        background-color: #333;
        position: relative;
    }

    .topnav #myLinks {
        display: none;
    }

    .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        display: block;
    }

    .topnav a.icon {
        display: block;
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav a:hover {
        background-color: #12a8dd;

    }

    .active {
        background-color: #0b6eaf;
        color: white;
    }

     .iconshowhide {
         display: none !important;
     }
        @media(max-height: 360px), (max-width: 768px) {
            .iconshowhide {
                display: block !important;
            }
    }

</style>

<script>
    function NavBarFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>