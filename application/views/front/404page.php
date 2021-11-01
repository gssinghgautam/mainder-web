<?php include('headerFront.php'); ?>

<!-- error page start -->
<section class="error-404 not-found">
  <div class="heading-section">
    <div class="container">
      <div class="heading-text col-md-8 centered">
        <h1 class="page-title">404</h1>
        <p class="centered">SOMETHING IS WRONG</p>
        <span>The page you are looking for was moved, removed, renamed or might never existed.</span>

        <div class="col-md-6 centered"> 
          <div class="blog-search-bar">
              <form method="get" class="form-search" action="#">
                  <div class="input-append">
                    <input type="search" class="form-control search-field" placeholder="Type and Hit Enter ..." value="" name="s" title="Search for:">
                    <button type="submit" class="add-on"><i class="fa fa-search"></i></button>
                </div><!-- end input append -->
            </form>
        </div> <!-- end blog search --> 

        <div class="go-back">
            <a href="<?php echo base_url(); ?>/index">GO BACK HOME</a>
        </div><!-- end go back -->
    </div><!-- end col md 6 -->
</div><!-- /.heading-text -->
</div><!-- /.container -->
</div><!-- /.heading-fullwidth -->    
</section><!-- end error 404 -->


<?php include('footerFront.php'); ?>