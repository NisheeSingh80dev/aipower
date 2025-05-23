    
  @include('header') 
  <?php // print_r($gallery);?>
	<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Gallery </h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-solar-energy.html">Home</a></li>
                    <li>Gallery </li>
                </ul>
            </div>
        </div>
    </div>
  <section class="overflow-hidden space overflow-hidden" id="project-sec">
    <div class="container">
        <div class="row gy-4">
            @foreach($gallery as $row)
            <div class="col-md-6 col-xl-4">
                <div class="project-item2">
                    <div class="box-img"><img src="{{$row->image_url}}" alt="project image"></div>
                    <div class="box-content">
                        <p class="box-title">{{$row->title}}</p>
                        <h3 class="box-title"><a href="project-details.html">{{$row->title}}</a></h3></div>
                    <div class="box-btn"><a href="{{$row->image_url}}" class="icon-btn popup-image"><i class="fa-solid fa-arrow-up-right"></i></a></div>
                </div>
            </div>
            @endforeach
          </div>
         
        <div class="th-pagination text-center mt-60 mb-0">
            <ul>
                <li><a href="blog.html"><i class="fa-regular fa-arrow-left"></i></a></li>
                <li><a href="blog.html">2</a></li>
                <li><a href="blog.html">3</a></li>
                <li><a href="blog.html">3</a></li>
                <li><a href="blog.html"><i class="fa-regular fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</section>

@include('footer') 