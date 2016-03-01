
<div class="container-fluid footer1">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 " id="colmd-9">
            <div class="footer-left">
                <span>Copyright 2016.All Rghts Reserved</span>
            </div>
            <div class=" footer-right">
                <span>Designed by <label><a  class="footer-logo-icon" href="#"><img src="<?= base_url() ?>images/footer-logo.png" class="img-responsive"></a></label></span>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>js/wow.min.js"></script>
<script src="<?= base_url() ?>js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>js/modernizr.custom.js"></script>
<script src="<?= base_url() ?>js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>js/custom.js"></script>
<script>
    new WOW().init();
</script>
<script src="<?= base_url() ?>js/classie.js"></script>
<script src="<?= base_url() ?>js/jquery.nicescroll.js"></script>
<script src="<?= base_url() ?>js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".pagination  .pagnton-arow a").addClass("glyphicon glyphicon-triangle-right");
        $(".pagination  .pagnton-arow-left a").addClass("glyphicon glyphicon-triangle-left");
        //  $(".pagination li a:contains('Prev')").addClass("prv");
    });
</script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>