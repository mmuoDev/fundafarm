@extends('layouts.master')
@section('content')
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!--banner-->
    <section id="banner" class="banner">
        <div class="bg-color">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--
                            <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                            <a class="navbar-brand" href="#"><span style="color:white; font-family: 'Open Sans', sans-serif">Fundafarm.ng</span></a>
                            -->
                            <a class="navbar-brand" href="#"><img src="img/logo1.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>

                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#banner">Home</a></li>
                                <li class=""><a href="#service">Services</a></li>
                                <li class=""><a href="#farms">Our Farms</a></li>
                                <li class=""><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="banner-info">
                        <!--
                        <div class="banner-logo text-center">
                            <img src="img/logo.png" class="img-responsive">
                        </div>
                        -->
                        <div class="banner-text text-center">
                            <h1 class="white">Invest in a farm today and get returns! </h1>
                            <p>Choose from any of our farms, invest in a farm and get your share of the profit.<br>
                                We are doing this to increase Nigeria's agricultural production and ensure the country is food secured.
                              </p>
                            <a href="#contact" class="btn btn-appoint">Request More Info.</a>
                            <a href="#farms" class="btn btn-appoint" >Our Farms</a>
                        </div>
                        <div class="overlay-detail text-center">
                            <a href="#service"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ banner-->
    <!--service-->
    <section id="service" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h2 class="ser-title">Our Services</h2>
                    <hr class="botm-line">
                    <p>We are a farming company working with clusters of Nigerian farmers spread across Nigeria
                        and we have created this platform for individuals to invest in a farm(s) and get  returns at the end of planting.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="icon-info">
                            <h4>We handle everything</h4>
                            <p>We handle farming operations on your behalf- right from planting to sales. You
                                can monitor farming progress from your dashboard and you are always free to visit the farm.</p>
                        </div>
                    </div>
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Farm Operations are Insured</h4>
                            <p>All farming operations are insured by IGI (Industrial and General Insurance Company).</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Purchase Orders</h4>
                            <p>We have purchase orders from companies for our produce hence guaranteeing a stable market for our produce.</p>
                        </div>
                    </div>
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <div class="icon-info">
                            <h4>The best farmers</h4>
                            <p>We work with the best clusters of farmers. YISA-Nigeria is our producer partner.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ about-->
    <!--doctor team-->
    <section id="farms" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ser-title">Our Farms</h2>
                    <hr class="botm-line">
                </div>
                @foreach($items as $item)
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <img src="{{asset('img/farms/'.$item->link)}}" height="100px" alt="..." class="team_img">
                            <div class="caption">
                                <h3 style="color: red;">{{ucfirst($item->produce)}}</h3>
                                <h3>₦{{number_format($item->cost)}}</h3>
                                <h3>Returns {{$item->returns}}% in {{$item->duration}}</h3>
                                <a href="#" class="btn btn-appoint">Invest Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ doctor team-->
    <!--cta-->
    <!--contact-->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ser-title">Contact us</h2>
                    <hr class="botm-line">
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Contact Info</h3>
                    <div class="space"></div>
                    <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>25 Warehouse road<br>
                        Lagos State, Nigeria</p>
                    <div class="space"></div>
                    <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@fundafarm.ng</p>
                    <div class="space"></div>
                    <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+23480 633 21043</p>
                </div>
                <div class="col-md-8 col-sm-8 marb20">
                    <div class="contact-info">
                        <h3 class="cnt-ttl">Having Any Query! Or Book an appointment</h3>
                        <div class="space"></div>
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>

                            <div class="form-action">
                                <button type="submit" class="btn btn-form">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ contact-->
    <!--footer-->
    <footer id="footer">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 marb20">
                        <div class="ftr-tle">
                            <h4 class="white no-padding">About Us</h4>
                        </div>
                        <div class="info-sec">
                            <p>We are a farming company working with clusters of Nigerian farmers spread across Nigeria and
                                we have created this platform for individuals to invest in a farm(s) and get returns at the
                                end of planting.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 marb20">
                        <div class="ftr-tle">
                            <h4 class="white no-padding">Quick Links</h4>
                        </div>
                        <div class="info-sec">
                            <ul class="quick-info">
                                <li><a href="index.html"><i class="fa fa-circle"></i>Home</a></li>
                                <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                                <li><a href="#contact"><i class="fa fa-circle"></i>Appointment</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 marb20">
                        <div class="ftr-tle">
                            <h4 class="white no-padding">Follow us</h4>
                        </div>
                        <div class="info-sec">
                            <ul class="social-icon">
                                <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
                                <li class="bgred"><i class="fa fa-google-plus"></i></li>
                                <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
                                <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        © Copyright StartFarm Enterprise
                        <div class="credits">
                            <!--
                                All the links in the footer should remain intact.
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
                            -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer-->
    </body>
@endsection