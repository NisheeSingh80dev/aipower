  @include('header')
  <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Complete Projects</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-solar-energy.html">Home</a></li>
                    <li>Complete Projects</li>
                </ul>
            </div>
        </div>
    </div>
<section class="z-index-common space overflow-hidden" id="service-sec">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-xxl-5">
                <div class="title-area text-center"><span class="sub-title sub-title3">Complete Projects</span>
                    <h2 class="sec-title">Our Complete Projects</h2></div>
            </div>
        </div>
        <div class="row gy-4">
        @foreach($project as $row)
        <div class="col-lg-6 col-xxl-4">
                <div class="service-grid style2">
                    <div class="service-grid_content">
                        <h3 class="box-title">{{ $row->title }}</h3>
                        <p class="box-text">{{ $row->subtitle }}</p></div>
                    <div
                    class="box-img th-anim" style="opacity: 1; visibility: inherit; translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"><img src="{{$row->image_url}}" alt="Icon" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        @endforeach
	 </div>
    </div>
</section>
@include('footer')