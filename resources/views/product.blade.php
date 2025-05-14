@include('header')
  <?php //  print_r($product);?>
  <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
		
		<div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
               <div class="row row--15">
               @foreach($product as $row)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="product.php">
                                    <img src="{{ asset('assets/uploads/' . $row->image) }}" alt="Product Images">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">{{ $row->name }}</a></h5>
                                
								 
								 <td class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn axil-btn btn-outline">
                                   
                                    <i class="flaticon-shopping-cart"> Buy Now</i>
                                </a>
                            </td>
								 
							
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


			</div>
   
            </div>
            <!-- End .container -->
        </div>
  
  
        @include('footer')