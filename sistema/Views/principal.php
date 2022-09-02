<?php
    session_start();
    require_once("header.php");
?>
<section class="app">

            <!-- header sidebar -->
<?php
                require_once("headersidebar.php");
?>

            <div class="paginacion">

<?php
                require_once("headermobile.php");
?>                
                <!-- sidebar -->  <!-- main -->
<?php
            if(!isset($_SESSION['userol'])){
                header("Location:../index.html");
            }
            else{
                if($_SESSION['userol'] == "Administrador"){
                    require_once("administrador/sidebaradmin.php");
                }
                elseif($_SESSION['userol'] == "Asesor"){
                    require_once("asesor/sidebarasesor.php");
                }
            }
                
                
?>
            </div>
</section>
<?php 
    require_once("footer.php");
?>
</section>
</body>   
</html>