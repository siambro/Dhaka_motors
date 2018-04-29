<?php
  include 'layout/head.php';
?>
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Home
          <small>Customer</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          
        </ol>
      </section>

      <!-- Main content -->
    <section class="content">
      <!-- update password -->
      <?php if(isset($_GET['done']) == true){?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Alert!</h4>
                  Successfully Updated Password.
        </div>
        <?php }?>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Motorcycle</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="../img/img13.jpg" alt="First slide">

                      <div class="carousel-caption">
                        First Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="../img/img8.jpg" alt="Second slide">

                      <div class="carousel-caption">
                        Second Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="../img/img.jpg" alt="Third slide">

                      <div class="carousel-caption">
                        Third Slide
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                  </a>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">

          <div class="col-md-12">
            <!-- The time line -->
            <!-- <ul class="timeline"> -->

              <!-- END timeline item -->
              <!-- timeline item -->
              <!-- <li> -->
              
                <div class="timeline-item">
                
                  <h3 class="timeline-header"><a href="#">Dhaka Motors</a> shared a video</h3>

                  <div class="timeline-body">
                    <div class="embed-responsive embed-responsive-16by9">
                      <!--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                              frameborder="0" allowfullscreen></iframe>-->
                <iframe width="560" height="315" src="https://www.youtube.com/embed/WzIxiGx6Siw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                  </div>
                
                </div>
              <!-- </li> -->
              <!-- END timeline item -->
              
            <!-- </ul> -->
          </div>
          <!-- /.col -->

        </div>
     </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
<?php 
include 'layout/foot.php';
?>