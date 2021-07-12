</main>
<!--end #main-->

<!--#footer-->
<footer id="footer" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12">
                <h4 class="font-size-20">RegalTour</h4>
                <p class="font-size-14 font-rale text-white-50">Împreună valorificăm timpul petrecut pe vas și nu numai.
                </p>
            </div>
            <div class="col-lg-4 col-12 text-center">
                <h4 class="font-size-20">Abonează-te și primește oferte pe email</h4>
                <form class="form-row" action="" method="post">
                    <div class="col">
                        <input type="text" name="x" class="form-control" placeholder="Email *">
                    </div>
                    <br>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                    </div>
                </form>
            </div>
            <?php
            //request method post
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //if(isset($_POST['submit']))
                {
                    if(isset($_POST['x']))
                    $UserManager->addSubscriber($_POST['x']);
                }
            }
            ?>
            <div class="col-lg-4 col-12 text-center">
                <h4 class="font-size-20">Account</h4>
                <div class="d-flex flex-column flex-wrap">
                    <a href="home_cart.php" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright text-center bg-dark text-white py-2">
    <p class="font-rale font-size-14">&copy; Copyrights 2021. Design By <a href="#" class="color-second">Maria
            Martin</a></p>
</div>
<!-- end #footer-->

<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!-- JavaScript Isotope Libraries -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<!-- Custom Javascript -->
<script src="index_top-sale.js"></script>
<script src="index.js"></script>

</body>

</html>