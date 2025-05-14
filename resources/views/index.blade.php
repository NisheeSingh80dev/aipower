@include('header') 
	


  <!--Slider Area Start-->

<div id="slidy-container">
  <figure id="slidy">
    <img src="assets/img/hero/slider-1.jpg" alt="eyes" >
    <img src="assets/img/hero/slider-2.jpg" alt="eyes" >
    <img src="assets/img/hero/slider-3.jpg" alt="eyes" > 

  
  </figure> 
</div>

<style> 

#slidy-container { 
  width: 100%; overflow: hidden; margin: 0 auto;
}
</style>


<script>
/* user defined variables */
var timeOnSlide = 3, 		
    // the time each image will remain static on the screen, measured in seconds
timeBetweenSlides = 1, 	
    // the time taken to transition between images, measured in seconds

// test if the browser supports animation, and if it needs a vendor prefix to do so
    animationstring = 'animation',
    animation = false,
    keyframeprefix = '',
    domPrefixes = 'Webkit Moz O Khtml'.split(' '), 
    // array of possible vendor prefixes
    pfx  = '',
    slidy = document.getElementById("slidy"); 
if (slidy.style.animationName !== undefined) { animation = true; } 
// browser supports keyframe animation w/o prefixes

if( animation === false ) {
  for( var i = 0; i < domPrefixes.length; i++ ) {
    if( slidy.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
      pfx = domPrefixes[ i ];
      animationstring = pfx + 'Animation';
      keyframeprefix = '-' + pfx.toLowerCase() + '-';
      animation = true;
      break;
    }
  }
}

if( animation === false ) {
  // animate in JavaScript fallback
} else {
  var images = slidy.getElementsByTagName("img"),
      firstImg = images[0], 
      // get the first image inside the "slidy" element.
      imgWrap = firstImg.cloneNode(false);  // copy it.
  slidy.appendChild(imgWrap); // add the clone to the end of the images
  var imgCount = images.length, // count the number of images in the slide, including the new cloned element
      totalTime = (timeOnSlide + timeBetweenSlides) * (imgCount - 1), // calculate the total length of the animation by multiplying the number of _actual_ images by the amount of time for both static display of each image and motion between them
      slideRatio = (timeOnSlide / totalTime)*100, // determine the percentage of time an induvidual image is held static during the animation
      moveRatio = (timeBetweenSlides / totalTime)*100, // determine the percentage of time for an individual movement
      basePercentage = 100/imgCount, // work out how wide each image should be in the slidy, as a percentage.
      position = 0, // set the initial position of the slidy element
      css = document.createElement("style"); // start marking a new style sheet
  css.type = "text/css";
  css.innerHTML += "#slidy { text-align: left; margin: 0; font-size: 0; position: relative; width: " + (imgCount * 100) + "%;  }\n"; // set the width for the slidy container
  css.innerHTML += "#slidy img { float: left; width: " + basePercentage + "%; }\n";
  css.innerHTML += "@"+keyframeprefix+"keyframes slidy {\n"; 
  for (i=0;i<(imgCount-1); i++) { // 
    position+= slideRatio; // make the keyframe the position of the image
    css.innerHTML += position+"% { left: -"+(i * 100)+"%; }\n";
    position += moveRatio; // make the postion for the _next_ slide
    css.innerHTML += position+"% { left: -"+((i+1) * 100)+"%; }\n";
}
  css.innerHTML += "}\n";
  css.innerHTML += "#slidy { left: 0%; "+keyframeprefix+"transform: translate3d(0,0,0); "+keyframeprefix+"animation: "+totalTime+"s slidy infinite; }\n"; // call on the completed keyframe animation sequence
document.body.appendChild(css); // add the new stylesheet to the end of the document
}

</script>




 <div class="about-area overflow-hidden space-top" id="about-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7">
                    <div class="title-area mb-40 text-center"><span class="sub-title">Welcome To AI Saif Power Private Limited</span>
                        <h4 class="sec-title">We are one of the leading EPC companies in the Transmission, Distribution, erection and maintenance sector in India.</h4></div>
                </div>
            </div>
            <div class="row gy-4 align-items-center">
                <div class="col-xl-7 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1 th-parallax"><img src="assets/home-1.jpg" alt="About"></div>
                     
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                        <p class="mb-25">AI Saif Power Private Limited, a leading provider in power transmission and distribution erection and maintenance. With a commitment to excellence and innovation, we deliver high-quality solutions that ensure the reliability and efficiency of power systems. Our team of experienced professionals is dedicated to meeting the evolving needs of the industry, providing end-to-end services from planning to execution.</p>
                     
                        <div class="btn-group mt-30 justify-content-start"><a href="contact.html" class="th-btn black-btn th-icon"><span class="btn-text" data-back="More About Us" data-front="More About Us"></span><i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</br>
	</br>
	</br>
<div class="counter-area">
    <div class="container">
        <div class="counter-card-wrap style2">
            <div class="counter-box">
                <div class="box-icon"><img src="assets/icon-1.png" alt=""></div>
                <div class="media-body">
                    <h3 class="box-number"><span class="counter-number">350</span><span class="plus">+</span></h3>
                    <p class="box-text mb-n1">Transimissio Project</p>
                </div>
            </div>
            <div class="counter-box">
                <div class="box-icon"><img src="assets/icon-2.png" alt=""></div>
                <div class="media-body">
                    <h3 class="box-number"><span class="counter-number">275</span><span class="plus">+</span></h3>
                    <p class="box-text mb-n1">Sub Station Construction</p>
                </div>
            </div>
            <div class="counter-box">
               <div class="box-icon"><img src="assets/icon-3.png" alt=""></div>
                <div class="media-body">
                    <h3 class="box-number"><span class="counter-number">200</span><span class="plus">+</span></h3>
                    <p class="box-text mb-n1">Underground Cable Laying</p>
                </div>
            </div>
            <div class="counter-box">
               <div class="box-icon"><img src="assets/icon-4.png" alt=""></div>
                <div class="media-body">
                    <h3 class="box-number"><span class="counter-number">150</span><span class="plus">+</span></h3>
                    <p class="box-text mb-n1">Expert Team</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="overflow-hidden space" data-bg-src="assets/img/bg/service_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="title-area text-center text-lg-start"><span class="sub-title">Our Experties</span>
                        <h2 class="sec-title">Check Out Our Innovative Solutions</h2></div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#serviceSlide" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#serviceSlide" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="serviceSlide" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/ss-1.jpg"></div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/sicon-1.png" alt="Icon"></div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img src="assets/s-1.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="Transmission.php">Transmission Services</a></h3>
                                    <p class="box-text">AI Saif Power Pvt. Ltd. is leading the way in the Indian power transmission sector by implementing global .</p>
                                    <a href="service.php" class="th-btn border-btn th-icon fw-medium text-uppercase"><span class="btn-text" data-back="Vew Details" data-front="Vew Details"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
						 <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/ss-2.jpg"></div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/sicon-2.png" alt="Icon"></div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img src="assets/s-2.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="Transmission.php">Sub-Station Construction</a></h3>
                                    <p class="box-text">AI Saif Power Pvt. Ltd. specializes in comprehensive Substation Installation services in India and </p>
                                    <a href="service.php" class="th-btn border-btn th-icon fw-medium text-uppercase"><span class="btn-text" data-back="Vew Details" data-front="Vew Details"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
						 <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/ss-3.jpg"></div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/sicon-3.png" alt="Icon"></div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img src="assets/s-3.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="Transmission.php">Underground Cable Laying</a></h3>
                                    <p class="box-text">AI Saif Power Pvt. Ltd. has positioned itself as a leader in the increasingly essential field of underground </p>
                                    <a href="service.php" class="th-btn border-btn th-icon fw-medium text-uppercase"><span class="btn-text" data-back="Vew Details" data-front="Vew Details"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
	 <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/ss-2.jpg"></div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/sicon-2.png" alt="Icon"></div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img src="assets/s-2.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="Transmission.php">Sub-Station Construction</a></h3>
                                    <p class="box-text">AI Saif Power Pvt. Ltd. specializes in comprehensive Substation Installation services in India and </p>
                                    <a href="service.php" class="th-btn border-btn th-icon fw-medium text-uppercase"><span class="btn-text" data-back="Vew Details" data-front="Vew Details"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>





		   </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about-area space" id="about-sec">
        <div class="container">
            <div class="row gy-6 flex-row-reverse">
                <div class="col-xl-6">
                    <div class="pe-xxl-4 me-xl-3">
                        <div class="title-area mb-30"><span class="sub-title">Why Choose Us</span>
                            <h4 class="sec-title">Why AI-SAIF POWER</h4></div>
                        <p class="mt-n2 mb-35">AI-SAIF POWER PRIVATE LIMITED is running projects in power transmission and distribution vertical, along with comprehensive and extensive project execution capabilities in terms of manpower, supply of materials. </br>
 With Company foraying into underground cabling and substations, we have a comprehensive execution profile for overhead transmission lines, monopole lines, underground cables, distribution networks as well as sub-stations. Additionally, we have developed extensive pre-qualifications in power transmission and distribution business owing to our extensive experience in the sector.
</p>
                  
                </div>
            </div>
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box2 pe-xl-5 me-xl-2">
                    <div class="img1 th-parallax"><img src="assets/why-1.jpg" alt="About"></div>
                 
                </div>
            </div>
        </div>
    </div>
    </div>
 <section class="overflow-hidden">
        <div class="container">
            <div class="appointment-area position-relative">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title-area mb-0 text-xl-start pe-xxl-5 me-xxl-5 space"><span class="sub-title">Request A Quote</span>
                            <h2 class="sec-title text-white">If you have any questions or need assistance, please let me know how I can help you.</h2>
                            <p class="sec-desc me-xl-5">For comprehensive operation and maintenance solutions, choose AI Saif Pwer Pvt. Ltd. </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="appointment-area-wrapper">
                            <form action="https://html.themeholy.com/solak/demo/mail.php" method="POST" class="appointment-form input-smoke ajax-contact">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Company Name">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Write Messages..."></textarea>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="th-btn fw-btn"><span class="btn-text" data-back="Send Messages" data-front="Send Messages"></span></button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shape-mockup d-none d-xxl-block" data-bottom="0%" data-right="-10%"><img src="assets/img/shape/shape-2.png" alt=""></div>
            </div>
        </div>
    </section>
	</br>
	<div class="about-area overflow-hidden overflow-hidden space" id="about-sec" style="
    background: #f8f8f8;
">
        <div class="container">
    <div class="title-area text-center text-lg-start"><span class="sub-title">Our Leadership</span>
                        <h2 class="sec-title">Meet Our Directors</h2></div>
            <div class="row gy-4">
                <div class="col-xl-4 mb-30 mb-xl-0">
                    <div class="img-box3">
                        <div class="img1"><img src="assets/director-1.jpg" alt="About"></div>
<br><div class="title-area mb-40" style="
    text-align: center;
">
                            <h4 class="sec-title">Mr. Saifur Rahman </h4>
<b>(Managing Director)</b></div>
                     
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                        
                        <p class="mb-25" style="
    text-align: justify;
"><b><em style="
    font-size: 24px;
">We Are Committed to Our Vision of a Brighter Tomorrow</em></b><br>
Looking back over the last a 1 year, I am glad about the steps we took to create a top-notch infrastructure and construction company.<br>
Looking back over the last a decades, I am glad about the steps we took to create <b>AI-SAIF POWER PRIVATE LIMITED</b>
 has not only succeeded in completing projects on time but in an effective manner, and has earned respect for its brand among customers, financial institutions, associates.<br>
Looking back over the last a decades, I am glad about the steps we took to create 
The volatile nature of economies in general, poses a key challenge for companies in dealing with the uncertainties. However, I am confident that our core values will provide us with adequate strength to face them. And that’s precisely why I believe that <b>AI-SAIF POWER PRIVATE LIMITED</b> poised to play bigger role in the infrastructure development of the nation.<br>
Looking back over the last a decades, I am glad about the steps we took to create 
Our journey till date has been very challenging. Thanks to our dedicated management team and skilled workforce, we have succeeded in keeping all our promises. <b>AI-SAIF POWER PRIVATE LIMITED</b> four decades of Endeavour and commitment have seen it foray into new divisions and 50 crore rupees mark in the Order Book.<br>
Looking back over the last a decades, I am glad about the steps we took to create 
Going ahead, we will continue our journey towards the larger vision of building a brighter world. I firmly believe and wish the company uninterrupted success while continuing to maintain its core values. I will end with Vince Lombardi’s quote: “Individual commitment to a group effort – that is what makes a team work, a company work, a society work, a civilization work.”
</p>
                        
                      
                        
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <br><div class="row gy-4">
                
                <div class="col-xl-8">
                    <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                        
                        <p class="mb-25" style="
    text-align: justify;
"><b><em style="
    font-size: 24px;
">The Legacy of Commitment and Excellence Continues</em></b><br>
Mr. Avinash Kumar Sinha, Director is spearheading the future growth plan for <b>AI-SAIF POWER PRIVATE LIMITED.</b>  He articulates a clear vision with a focus on improving operational efficiency.<br>
Mr. Avinash Kumar Sinha motivation, enthusiasm, and intense commitment are crucial ingredients in directing his personal energy towards ensuring that <b>AI-SAIF POWER PRIVATE LIMITED</b>  efforts have an impact.<br>
The charismatic leader has been with the company, now a listed enterprise, in a variety of roles for 1 year and in this time has seen it develop from a construction firm to one that is a trusted name in infrastructure-Transportation, Water &amp; Environment, Irrigation, Electrical (T&amp;D), Railways. Mr. Avinash Kumar Sinha is one who believes in quality over quantity.

</p>
                        
                      
                        
                    </div>
                </div>
                <div class="col-xl-4 mb-30 mb-xl-0">
                    <div class="img-box3">
                        <div class="img1"><img src="assets/director-2.jpg" alt="About"></div>
<br><div class="title-area mb-40" style="
    text-align: center;
">
                            <h4 class="sec-title">Mr. Avinash Kumar Sinha </h4>
<b>(Director)</b></div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="overflow-hidden space overflow-hidden" id="blog-sec">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">News & Blog</span>
                <h2 class="sec-title">Our Latest News & Blogs</h2></div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_1.jpg" alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i class="fa-regular fa-calendar"></i>15 March , 2025</a> <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">On an island in the sun, coal power is king over abundant</a></h3><a href="blog-details.html" class="th-btn border-btn th-icon text-uppercase fw-semibold"><span class="btn-text" data-back="Read More" data-front="Read More"></span><i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_2.jpg" alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i class="fa-regular fa-calendar"></i>16 March , 2025</a> <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal Power Dominates Solar Energy</a></h3><a href="blog-details.html" class="th-btn border-btn th-icon text-uppercase fw-semibold"><span class="btn-text" data-back="Read More" data-front="Read More"></span><i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_3.jpg" alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i class="fa-regular fa-calendar"></i>17 March , 2025</a> <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal Power Rules Solar Potentia</a></h3><a href="blog-details.html" class="th-btn border-btn th-icon text-uppercase fw-semibold"><span class="btn-text" data-back="Read More" data-front="Read More"></span><i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_2.jpg" alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i class="fa-regular fa-calendar"></i>19 March , 2025</a> <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal Power Reigns Over Abundant</a></h3><a href="blog-details.html" class="th-btn border-btn th-icon text-uppercase fw-semibold"><span class="btn-text" data-back="Read More" data-front="Read More"></span><i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-slider-prev="#blogSlider" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                <button data-slider-next="#blogSlider" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
    <div class="brand-area overflow-hidden">
        <div class="container th-container">
            <div class="slider-area text-center">
                <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"6"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/c-1.png" alt="Brand Logo"> <img class="gray" src="assets/c-1.png" alt="Brand Logo"></a>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/c-2.png" alt="Brand Logo"> <img class="gray" src="assets/c-2.png" alt="Brand Logo"></a>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/c-3.png" alt="Brand Logo"> <img class="gray" src="assets/c-3.png" alt="Brand Logo"></a>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/c-4.png" alt="Brand Logo"> <img class="gray" src="assets/c-4.png" alt="Brand Logo"></a>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/c-1.png" alt="Brand Logo"> <img class="gray" src="assets/c-1.png" alt="Brand Logo"></a>
                            </div>
                        </div>
			


			  </div>
                </div>
            </div>
        </div>
    </div>
   
    @include('footer') 