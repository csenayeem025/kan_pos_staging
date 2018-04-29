
</div>
    <!--FOOTER START-->
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-text">
              <ul class="list-unstyled">
                <li><a href="#">About</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Our Terms</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Copyright Policy</a></li>
                <li><a href="#">Help and FAQs</a></li>
                <li><a href="<?=base_url('contact');?>">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-social">
              <ul>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="bottom-row"> <strong class="copyrights">ShebaLagbe &copy; 2018, All Rights Reserved</strong>
      </div>
    </div>
    </footer>
<!--FOOTER END-->

    <!--jQuery START-->
    <!--JQUERY MIN JS-->
    <script src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
    <!--BOOTSTRAP JS-->
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <!--OWL CAROUSEL JS-->
    <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
    <!--BANNER ZOOM OUT IN-->
    <!-- <script src="<?=base_url();?>assets/js/jquery.velocity.min.js"></script>  -->
    <script src="<?=base_url();?>assets/js/jquery.kenburnsy.js"></script>
    <!--SCROLL FOR SIDEBAR NAVIGATION-->
    <script src="<?=base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!--Select2 Option-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"></script>
    <!--CUSTOM JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!--Running Counter-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url();?>assets/js/custom.js"></script>
<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

});
</script>
<script type="text/javascript">
     $('.myselect').select2();
</script>
</body>

</html>
