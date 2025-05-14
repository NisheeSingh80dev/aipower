@include('header') 
	<?php // print_r($blogDetails);?>
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
     <div class="container">
         <div class="breadcumb-content">
             <h1 class="breadcumb-title">Blog Details</h1>
             <ul class="breadcumb-menu">
                 <li><a href="home-solar-energy.html">Home</a></li>
                 <li>Blog Details</li>
             </ul>
         </div>
     </div>
 </div>
 <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
     <div class="container">
         <div class="row">
             <div class="col-xxl-8 col-lg-8">
                 <div class="th-blog blog-single">
                     <div class="blog-img"><img src="{{$blogDetails->image_url}}" alt="Blog Image"></div>
                     <div class="blog-content">
                         <div class="blog-meta"><a href="/blog"><i class="fa-regular fa-calendar"></i>{{ date('d-m-Y', strtotime($blogDetails->date)) }}</a></div>
                         <h3 class="blog-title">{{$blogDetails->short_dec}}</h3>
                         <p>{{$blogDetails->description}}</p>
                     
                         <div class="share-links clearfix">
                      
                     </div>
                 </div>
             </div>
       </div>
         <div class="col-xxl-4 col-lg-4">
             <aside class="sidebar-area">
               
                 <div class="widget widget_categories">
                     <h3 class="widget_title">Useful Link</h3>
                     <ul>
                         <li><a href="Transmission.php">Transmission Line </a></li>
                         <li><a href="Construction.php">Sub-Station Construction</a></li>
                         <li><a href="Underground-Cable.php">Underground Cable Laying</a></li>
                         <li><a href="Running-Projects.php">Running Projects</a></li>
                         <li><a href="Complete-Projects.php">Complete Projects </a></li>
                         <li><a href="gallery.php">Image Gallery,</a></li>
                         <li><a href="video.php">Video Gallery</a></li>
                         <li><a href="#">Press & Media</a></li>
                         <li><a href="career.php">Career</a></li>
                         <li><a href="contact.php">Contact</a></li>
                        
                     </ul>
                 </div>
            </aside>
         </div>
     </div>
     </div>
 </section>
 
 @include('footer') 