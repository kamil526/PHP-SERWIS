    <!-- back to top button -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Wróć na górę</button>
<br>
<br>
<br>
<hr class="featurette-divider">    

    <!-- FOOTER -->
<footer class="container"  >
    <div class="col">
        <p> &copy; 2018 e-Serwis &middot; <a href="startpage/data/construction.html" class="text-success">Regulamin</a></p>
    </div>
</footer>

    <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
<script src="startpage/data/backtotop.js"></script>
<!-- back to top button -->
<script>
        //przycisk pojawia się gdy zjedziemy w dól o 20px
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        //kiedy klikniemy przycisk wracamy na górę strony
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        // Uruchomienie Modala po zaladowaniu strony z parametrem idZlecenia
        <?php
            if(isset($_GET['idZlecenia']))
            { ?>
                'use strict';
                (function($)
                {
                    jQuery(window).on("load",function() {
                    jQuery('#modal1').modal('show');
                    });
                })(jQuery);
                
                
<?php       }

?>

</script>
</body>
</html>
