<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/newStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:900&amp;subset=latin-ext"
      rel="stylesheet"
    />
    <link rel="icon" href="./private/img/logo.png">
    <script async>
      document.documentElement.classList.remove("no-js");
    </script>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <div class="container-fluid">


        <nav class="navbar navbar-expand-sm top-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container is-navbar">
                <div class="hero-content__logo-wrapper is-top-naav">
                    <div class="logo-white-wrapperr.is-red">
                        <img src="./private/img/logo.png" loading="lazy" alt="" class="hero-icon" />
                    </div>
                </div>
                <div class="menu-links">
                    <ul class="nav">
                        <li class="nav-item">
                            <!-- <a class="nav-link nav-item__link" href="#">Active</a> -->
                            <a class="nav-link nav-item__link nav-link-text active" href="#home"><i
                                    class="fas fa-solid fa-house nav-icon"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-item__link" href="#about"><i
                                    class="fas fa-sharp fa-solid fa-user-group nav-icon"></i>About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-item__link" href="#service"><i
                                    class="fas fa-solid fa-star nav-icon"></i>Services</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link nav-item__link" href="#contact"><i
                                    class="fas fa-solid fa-phone nav-icon"></i>Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-buttons">
                    <div class="hero-content__logo-wrapper is-top-navbar">
                        <a data-ps="target" href="register" target="_blank"
                            class="logo-white-wrapperr is-red is-top-navbar w-inline-block">
                            <div class="login-text is-topnav">REGISTER</div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>


    </div>



    <section id="home" class="bg-cover text-white home-page" style="background-image: url(./private/img/bg.webp);height: 100%;">

        <div class="container-fluid glass">
            <div class="row">
                <div class="col-12 section-intro text-center">
                    <img src="./private/img/logo.png" width="100px" height="100px" alt=""><br />
                    <img src="./private/img/logo_text.svg" class="main_text" alt="">
                    <h1 class="heading-text">Fastest delivery service</h1>
                    <div class="divider"></div>
                    <p class="hero-p">
                        The secret to success is developing and maintaining relationship with <br /><strong> Customers
                        </strong>and all <strong>Stakeholders</strong>.
                    </p>
                </div>
            </div>
            <div class="row">

                <div class="col-2"></div>
                <div class="card bg-white text-dark text-center p-2 mt-5 mr-4 col-lg-2 card-services"
                    data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="card-header service-head">
                        Express Delivery
                    </div>
                    <div class="card-body service-body">
                        Get your packages delivered swiftly, with our expedited shipping options for time-sensitive
                        shipments.
                    </div>
                </div>
                <div class="card bg-white text-dark text-center p-2 mr-4 mt-5 col-lg-2 card-services"
                    data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="card-header service-head">
                        Coverage
                    </div>
                    <div class="card-body service-body">
                        We provide reliable parcel delivery services across the country, reaching every corner with
                        speed and efficiency.
                    </div>
                </div>
                <div class="card bg-white text-dark text-center p-2 mr-4 mt-5 col-lg-2 card-services"
                    data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="card-header service-head">
                        Utmost Security
                    </div>
                    <div class="card-body service-body">
                        Trust in our meticulous handling and secure transit methods, ensuring your packages are
                        protected every step of the way.
                    </div>
                </div>
                <div class="card bg-white text-dark text-center p-2 mr-4 mt-5 col-lg-2 card-services"
                    data-aos="zoom-in-down" data-aos-duration="3000">
                    <div class="card-header service-head">
                        Affordable Rates
                    </div>
                    <div class="card-body service-body">
                        Enjoy competitive pricing tailored to your specific shipping needs, with no hidden fees or
                        surprises.
                    </div>
                </div>
            </div>

    </section>
    <section id="about" class="bg-cover text-white home-page cov"
        style="background-image: url(./private/img/backwhite1.png);transform: rotate(180deg);">

        <div class="container-fluid " style="transform: rotate(180deg);">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1 class="head-line purple-gradient-text" style="font-weight: bolder;">About Us</h1>
                    <div class="divider"></div>
                    <p class="about-p">
                        <strong>Hopit Express, </strong> was set up recently at <strong>Nugegoda.</strong> We offer
                        valuable Customers with
                        multiple Network Services without <strong>Contention</strong> or <strong>Congestion</strong> and
                        in line with pre defined <strong>Quality</strong> and <strong>Support</strong> in the region.
                        <br><br>
                        <strong>Is active in principal service segments ,</strong>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5"></div>
                <div class="card  mt-3 col-lg-2 purple-g text-white " data-aos="fade-down" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                    <div class="card-body ">
                        <strong>Provide high satisfaction to our customers and
                            business associates through quality service.</strong>
                    </div>
                    <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <!-- <div class=" mt-3 col-lg-2 yellow-g " >
                    <div class="card  mb-3 yellow-g" style="max-width: 18rem;">
                        <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                        <div class="card-body text-success">
                          <h5 class="card-title">Success card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                      </div>
                </div> -->
                <div class="card mt-3 col-lg-2 purple-g " data-aos="fade-right" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                    <div class="card-body">
                        <strong>  Over night domestic express delivery
                            service.</strong>
                    </div>
                    <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                </div>
                <div class="col-lg-1"></div>
                <div class="card mt-3 col-lg-2 purple-g" data-aos="fade-up" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                    <div class="card-body">
                        <strong>Same day express delivery within Colombo and
                            suburb limits.</strong>
                    </div>
                    <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                </div>
                <div class="col-lg-1"></div>
                <div class="card mt-3 col-lg-2 purple-g" data-aos="fade-left" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                    <div class="card-body">
                        <strong> Prompt delivery service across the
                            country.</strong>
                    </div>
                    <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="card mt-3 col-lg-2 purple-g" data-aos="fade-up-right" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card-header bg-transparent " style="text-align: left;"> <div class="circle" > <i class="fas fa-solid fa-star text-start" ></i></div></div>
                    <div class="card-body">
                        <strong> Dedicated staff and quality management to provide
                            uninterrupted service always. </strong>
                    </div>
                    <div class="card-footer bg-transparent "><div class="about-footer" ></div></div>
                </div>
            </div>

        </div>
    </section>
    <section id="values" class="bg-cover text-white home-page " style="background-image: url(./private/img/backwhite1.png);">

        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">

                    <h1 class="heading-text text-center orange-yellow-text">Our Values</h1>
                    <div class="divider"></div>

                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-3 mt-5" data-aos="fade-right" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-warning">
                        <div class="card-image">
                            <img class="img" src="./private/img/respect.png">
                            <!-- <div class="card-caption text-dark"> Quisque a bibendum magna </div> -->

                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center text-white">Respect</h6>
                            <p class="card-description"> colleague's, Customers, Suppliers, environment rules and
                                working principles. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5" data-aos="fade-down" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-warning">
                        <div class="card-image">
                            <img class="img" src="./private/img/proactivity.jpg">

                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center text-white">Proactivity</h6>
                            <p class="card-description"> Our capacity to anticipate your needs. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5" data-aos="fade-left" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-warning">
                        <div class="card-image">
                            <img class="img" src="./private/img/team_sprit.png">

                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center text-white">Team Sprit</h6>
                            <p class="card-description"> Growing our business and your business together. </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 mt-5" data-aos="fade-up-right" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-warning">
                        <div class="card-image">
                            <a href="#"> <img class="img" src="./private/img/communication.png">
                                <!-- <div class="card-caption text-dark"> Quisque a bibendum magna </div> -->
                            </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center text-white">Communication</h6>
                            <p class="card-description"> Relationships and the link between people building constructing
                                relationships between us and with our customers are the basis of our success. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5" data-aos="fade-up-left" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-warning">
                        <div class="card-image">
                            <a href="#"> <img class="img" src="./private/img/learning.png">
                                <!-- <div class="card-caption text-dark"> Quisque a bibendum magna </div> -->
                            </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center text-white">Continuos Learning</h6>
                            <p class="card-description"> Learning, Share Information and Knowledge, giving everyone an
                                opportunity to grow. What we have learned years ago will become absolute evolving with
                                the market is vital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="service" class="bg-cover text-white home-page " style="background-image: url(./private/img/bac-dark.png);">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">

                    <h1 class="heading-text text-center orange-yellow-text">Our Services</h1>
                    <div class="divider"></div>

                </div>
            </div>
            <div class="row">
                <div class="col-12 space--xlarge" >
                    <div class="hero" data-component="fadereveal">
                      <div class="hero__wrapper ">
                        <div class="slider slider--big glide" data-component="hero">
                          <div class="slider__arrows" data-glide-el="controls">
                            <button
                              class="slider__arrow slider__arrow--prev glide__arrow glide__arrow--prev"
                              data-ref="fadereveal[el]"
                              data-glide-dir="&lt;"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                              >
                                <path
                                  d="M0 12l10.975 11 2.848-2.828-6.176-6.176H24v-3.992H7.646l6.176-6.176L10.975 1 0 12z"
                                ></path>
                              </svg>
                            </button>
          
                            <button
                              class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next"
                              data-ref="fadereveal[el]"
                              data-glide-dir="&gt;"
                              id="next"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                              >
                                <path
                                  d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"
                                ></path>
                              </svg>
                            </button>
                          </div>
          
                          <div
                            class="frames glide__track"
                            data-component="slidereveal"
                            data-glide-el="track"
                          >
                            <ul class="frames__list glide__slides">
                              
          
                              <li class="frames__item glide__slide" >
                                <div data-ref="slidereveal[el]" style="">
                                  <div class="frame" style="background-image: url(./private/img/service1.png);background-position: top;
                                  background-repeat: no-repeat;
                                  background-size: contain;"  data-ref="hero[el]">
                                    
                                </div>
                              </li>
          
                              <li class="frames__item glide__slide">
                                <div data-ref="slidereveal[el]">
                                  <div class="frame" style="background-image: url(./private/img/service5.png);background-position: center;
                                  background-repeat: no-repeat;
                                  background-size: contain;"  data-ref="hero[el]">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                  </div>
                                </div>
                              </li>
          
                              <li class="frames__item glide__slide">
                                <div data-ref="slidereveal[el]">
                                  <div class="frame" style="background-image: url(./private/img/service3.png);background-position: top;
                                  background-repeat: no-repeat;
                                  background-size: contain;"  data-ref="hero[el]">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                  </div>
                                </div>
                              </li>
          
                              
          
                              <li class="frames__item glide__slide">
                                <div data-ref="slidereveal[el]">
                                  <div class="frame" style="background-image: url(./private/img/service4.png);background-position: top;
                                  background-repeat: no-repeat;
                                  background-size: contain;"  data-ref="hero[el]">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                  </div>
                                </div>
                              </li>
          
                              <li class="frames__item glide__slide">
                                <div data-ref="slidereveal[el]">
                                  <div class="frame" style="background-image: url(./private/img/service2.png);background-position: top;
                                  background-repeat: no-repeat;
                                  background-size: contain;"  data-ref="hero[el]">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                  </div>
                                </div>
                              </li>          
                            </ul>
                          </div>
                        </div>
          
                        
                      </div>
          
                      
                    </div>
          
                    
                  </div>
                
            </div>
    </section>

    <section  class="bg-cover text-white home-page " style="background-image: url(./private/img/bg.webp);">

        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">

                    <h1 class="heading-text text-center  purple-gradient-text"> <strong>Vision & Mission</strong></h1>
                    <div class="divider"></div>

                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-4 mt-5" data-aos="fade-right" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-glass">
                        <div class="card-image">
                            <img class="img" src="./private/img/vision.png">
                            <!-- <div class="card-caption text-dark"> Quisque a bibendum magna </div> -->

                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center " style="color: #1e0d63;font-weight: bolder;">Vision</h6>
                            <p class="card-description" style="color: #7a719b;"> Out vision is to the premier courier logistic service provider in Sri Lanka utilizing our own network and selected partners to delivery an exceptional service to our customers. We maintain our core values of honestly. Integrity and fair business practice.<br><br><br><br><br>. </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mt-5" data-aos="fade-left" data-aos-easing="linear"
                    data-aos-duration="1500">
                    <div class="card card-blog table-glass">
                        <div class="card-image">
                            <a href="#"> <img class="img" src="./private/img/mission.png">
                                <!-- <div class="card-caption text-dark"> Quisque a bibendum magna </div> -->
                            </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table ">
                            <h6 class="card-caption text-center " style="color: #3b2a82;">Mission</h6>
                            <p class="card-description" style="color: #7a719b;"> Hopit express' mission is to offer an exceptional courier and logistic solution to our customers through the development of a comprehensive an safe network, the appointment of talented and committed staff, the provision of a working environment that our staff are proud to be excellence are day to day experiences. We remain committed to the development of our staff and generating a profitable return for our investors.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-end">
                
                
            </div>
        </div>
    </section>
    <section class="bg-cover text-white home-page" id="contact" style="background-image: url(./private/img/bg.webp);">
        <h3 class="heading-text text-center  purple-gradient-text">Contact Us</h3>
       <ul class="contact-content mt-5">
            <li>
                <i class="fa-sharp fa-solid fa-location-dot"></i>
                <p>Hopit Express [pvt] Ltd,<br> 108 C/2,<br> Stanley Thilakarathna Mw,<br> Nugegoda,<br> Sri Lanka.</p>
            </li>
             <li>
                <i class="fa fa-phone"></i>
                <p>0113 645 635<br>
                076 75 111 13 <br> 078 93 000 50</p>
            </li>
            <li>
                <i class="fa fa-envelope"></i>
                <p>info@hopitexpress.com</p>
            </li>
        </ul> 
    </section>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <strong>Copyright &copy; 2023 Hopit Express .</strong> All rights reserved.
            
        </div>
        <b>Web Site by <a href="https://pasindu99.web.app/" class="text-danger">Pasindu Pramodh</a>.</b>
    </footer>
    <div class="  log" aria-live="polite"
    aria-label="Open Intercom Messenger" tabindex="0" role="button">
        <a href="login" class="text-side text-center">Log in <i class="fa-solid fa-right-to-bracket"></i></a>
</div>
    <script src="./plugins/jquery/jquery-3.2.1.slim.min.js"></script>
    <script src="./plugins/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="./plugins/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./js/js-glide.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-116594947-1"
    ></script>
    <script>
        window.onload = function(){
  document.getElementById('next').click();
}
     
    </script>

    <script src="js/175-js-index.js"></script>
    <script>
        if ($(window).width() > 991) {
            $(function () {
                $(document).scroll(function () {
                    var $nav = $(".top-navbar");

                    $nav.toggleClass("is-active", $(this).scrollTop() > $nav.height());
                });
            });
        }
        AOS.init();
        
    </script>
    <script>
    // Disable right-click
    document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
    });

    // Disable text selection
    document.addEventListener('selectstart', function (event) {
        event.preventDefault();
    });
</script>

</body>

</html>