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
</footer>

    <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</script>  

</body>
</html>
