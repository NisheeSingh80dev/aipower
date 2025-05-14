      
	@include('header') 
  <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="space">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Our Contact Information</h2></div>
            <div class="row gy-4">
              
                <div class="col-xl-4 col-md-6">
                    <div class="contact-media">
                        <div class="icon-btn"><i class="fa-light fa-phone"></i></div>
                        <div class="media-body">
                            <h5 class="box-title">Contact Number</h5>
                            <p class="box-text"><a href="tel:+25862323258">Mob: 9991111006, 8881111557</a> <a href="mailto:info@aispower.in">Email: info@aispower.in</a></p>
                        </div>
                    </div>
                </div>
				  <div class="col-xl-4 col-md-6">
                    <div class="contact-media">
                        <div class="icon-btn"><i class="fa-sharp fa-light fa-location-dot"></i></div>
                        <div class="media-body">
                            <h5 class="box-title">Our Address</h5>
                            <p class="box-text">Campbell Road, Lakshman Vihar Colony, Balaganj, Lucknow, U.P – 226003</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact-media">
                        <div class="icon-btn"><i class="fa-light fa-clock"></i></div>
                        <div class="media-body">
                            <h5 class="box-title">Opening Hour</h5>
                            <p class="box-text">Monday - Saturday: 9:00 - 18:00 Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-bottom">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-7">
                <form action="{{url('/')}}/saveQuery" method="post" class="contact-form2 input-smoke ajax-contact">
                @csrf
                    
                        <h3 class="h2 mt-n3 mb-25">Get In Touch</h3>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="phone" id="number" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select nice-select">
                                    <option value="" disabled="disabled" selected="selected" hidden>Select an Options</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Engine Diagnostics">Engine Diagnostics</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <textarea  id="message" name="remark" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn fw-btn" type="submit"><span class="btn-text" data-back="Send Messages" data-front="Send Messages"></span></button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
                <div class="col-xl-5">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sthemeholy!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd"
                        allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@include('footer') 