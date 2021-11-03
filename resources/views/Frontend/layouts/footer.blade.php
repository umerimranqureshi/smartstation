<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                @isset($footers)
                @foreach($footers as $footer)
                <img src="{{asset('frontend/image/FooterImage')}}/{{$footer->image}}" class="mb-2" style="height: 70px;width: 270px;">
                <p>{!! $footer->LogoDescription !!}</p>
                <hr>
                @endforeach
                @endisset
            </div>
            <div class="col-md-4 col-sm-12">
                <h3 style="color: #00aff2;">Customer Care</h3>
                <ul>
                    <li><a href=""><i class="fa fa-check" style="color: black;">&nbsp;Device Pick-up and Drop-off Service</i></a></li>
                    <li><a href=""><i class="fa fa-check" style="color: black;">&nbsp;Why Choose our repair service?</i></a></li>
                    <li><a href=""><i class="fa fa-check" style="color: black;">&nbsp;We Fix problems!</i></a></li>
                    <li><a href=""><i class="fa fa-check" style="color: black;">&nbsp;Terms and Conditions</i></a></li>
                    <li><a href=""><i class="fa fa-check" style="color: black;">&nbsp;Privacy Policy</i></a></li>
                </ul>
                <hr>
                <h3 style="color: #00aff2;" class="mb-4">Openinng Time</h3>
                <p class="mb-0"><b>Mon, Tue, Wed, Fri</b>&nbsp;&nbsp; 9:00 AM-5:00 PM</p>
                <p class="mb-0"><b>Thursday</b> <span class="ml-5">10:00 AM-5:30 PM</span></p>
                <p class="mb-0"><b>Saturday, Sunday</b>&nbsp;11:00 AM-4:00 PM</p>
                <hr>
            </div>
            @isset($footers)
            @foreach($footers as $footer)
            <div class="col-md-4 col-sm-12">
                <h3 style="color: #00aff2;" class="mb-4">Our Repair Center</h3>
                <p class="mb-1"><i class="fa fa-map-marker"></i><b class="ml-1">Address:</b>{{$footer->Address}}</p>
                <p class="mb-1"><i class="fas fa-phone" aria-hidden="true"></i><b class="ml-1">Phone:</b>{{$footer->PhoneNumber}}</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i><b class="ml-1">Email:</b>{{$footer->email}}</p>
                <hr>
                <p>{!! $footer->Description !!}</p>
            </div>
            @endforeach
            @endisset
        </div>
        <hr>
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="footer-social">
                    <ul class="list-unstyled social-icons social-icons-simple">
                        <li>
                            <a class="facebook_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-facebook-f" aria-hidden="true"></i> </a>
                        </li>
                        <li>
                            <a class="twitter_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-twitter" aria-hidden="true"></i> </a> 
                        </li>
                        <li><a class="googleplus_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-google-plus-g" aria-hidden="true"></i> </a> </li>
                        <li><a class="linkdin_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-linkedin-in" aria-hidden="true"></i> </a> </li>
                        <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-instagram" aria-hidden="true"></i> </a> </li>
                        <li><a class="pintrest_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-pinterest-p" aria-hidden="true"></i> </a> </li>
                    </ul>
                </div>
                <p class="company-about fadeIn">© 2021  Made  By <a href="javascript:void(0);">FocusDMT</a></p>
            </div>
        </div>
    </div>
</footer>