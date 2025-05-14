@include('header') 
<?php // print_r($blog);?>
  <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Blog</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-solar-energy.html">Home</a></li>
                    <li>Our Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    @foreach($blog as $row)
                        <div class="th-blog blog-single has-post-thumbnail">
                            <div class="blog-img global-img">
                                <a href="/blogDetails/{{ $row->id }}"><img src="{{ $row->image_url }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="/blog"><i class="fa-light fa-calendar"></i>{{ date('d-m-Y', strtotime($row->date)) }}</a>
                                </div>
                                <h3 class="blog-title">
                                    <a href="/blogDetails/{{ $row->id }}">{{ $row->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach

					
                      <div class="th-pagination">
                        <ul>
                            <li><a href="blog.html"><i class="fa-regular fa-arrow-left"></i></a></li>
                            <li><a href="blog.html">2</a></li>
                            <li><a href="blog.html">3</a></li>
                            <li><a href="blog.html">3</a></li>
                            <li><a href="blog.html"><i class="fa-regular fa-arrow-right"></i></a></li>
                        </ul>
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