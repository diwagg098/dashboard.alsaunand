@include('layout.app')
@include('layout.nav')


<div class="banner">
    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/banner/' . $banner->description}}" alt="">
</div>


{{-- about   --}}


<div class="about">
    <div class="about-us">
        <div class="about-1" data-aos="fade-up">
            <h1>About <span style="font-weight: 100">Us</span></h1>
        </div>
        <div class="about-2" data-aos="fade-up" data-aos-duration="2000" style="text-align: justify">
            <p>Asian Law Students' Association Local Chapter Universitas Andalas (ALSA LC Unand) is one of the student activity units in the Faculty of Law, Universitas Andalas which is located in the city of Padang, West Sumatra Province. ALSA LC Unand was inaugurated as a Local Chapter and became part of the big family of ALSA National Chapter Indonesia at the XXIV National Conference, Batu Malang, on March 15, 2017.

            Initially, Universitas Andalas had been an observer of ALSA Indonesia for two years, starting from October 2015 - March 2017. As an Observer, Universitas Andalas had participated in 8 National Events held by the National Board as a mandatory requirement before being officially inaugurated as a Local Chapter. In order to create efficiency of the structure as an observer, at that time a Board of Observer ALSA LC Unand 2016/2017 was formed, consisting of: M. Fajar Mahardika, S.H. (as Director); Rizki Damayanti, S.H. (as Secretary General); Fandi Kurniawan, S.H. (as Vice Director of Internal Affairs); Ahmad Satriadi, S.H. (as Vice Director of External Affairs); Mentari Wahyudihati, S.H. (as Treasurer General); Kristin Desy Vany, S.H. (as Manager of Academic Activities) and Iffah Zakya, S.H. (as Manager of Public Relations).

            Although ALSA LC Unand is one of the youngest Local Chapter under the auspices of ALSA Indonesia, ALSA LC Unand continues to show its existence in implementing the 4 pillars of ALSA which is shown through the work programs that has been implemented. ALSA LC Unand focuses on activities that can generate the output for participants, not only within the scope of members, but also for the wider community. Until now, ALSA LC Unand has had more than 170 active members and 120 alumni.
</p>
        </div>
    </div>
</div>



{{-- opening statement --}}

<div class="os">
    <div class="os1">
        <div class="os-c" data-aos="fade-up">
            <h1>Opening <span style="font-weight: 100">Statement</span></h1>
        </div>
        <div class="os-1">
            <div class="os-1col" data-aos="fade-right">
                @if ($opening->foto)
                    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/website/' . $opening->foto}}" alt="">
                @else
                    <img src="{{asset("images/Picture.jpg")}}" alt="">
                @endif
            </div>
            <div class="os-2col" data-aos="fade-left"  data-aos-anchor-placement="top-center">
                {!! $opening->description !!}
            </div>
        </div>
    </div>
</div>


{{-- visi misi --}}


<div class="visimisi">
    <div class="visimisi-col">
        <div class="visi" data-aos="fade-up"  data-aos-anchor-placement="top-center">
            <h1>Vision</h1>
            {!! $vision->description !!}
        </div>
        <div class="visi" data-aos="fade-down"  data-aos-anchor-placement="top-center">
            <h1>Mission</h1>
            {!! $mision->description !!}
        </div>
    </div>
</div>



{{-- 4pilar --}}

<div class="pilar">
    <div class="pilar-alsa">
        <div class="pilar-tittle" data-aos="fade-up"  data-aos-anchor-placement="top-center">
            <p>4 Pillars  of <span style="font-weight: 600">ALSA</span></p>
        </div>

        <div class="plr" data-aos="fade-down"  data-aos-anchor-placement="top-center">
            <div class="plr-col">
                <div class="plr-cvr">
                    <img src="{{asset("images/Pillar Images.jpg")}}" alt="">
                </div>
                <div class="pillr">
                    <p>Internationally Minded</p>
                </div>
            </div>

            <div class="plr-col">
                <div class="plr-cvr">
                    <img src="{{asset("images/Pillar Images.jpg")}}" alt="">
                </div>
                <div class="pillr">
                    <p>Internationally Minded</p>
                </div>
            </div>
            
            <div class="plr-col">
                <div class="plr-cvr">
                    <img src="{{asset("images/Pillar Images.jpg")}}" alt="">
                </div>
                <div class="pillr">
                    <p>Internationally Minded</p>
                </div>
            </div>
            
            <div class="plr-col">
                <div class="plr-cvr">
                    <img src="{{asset("images/Pillar Images.jpg")}}" alt="">
                </div>
                <div class="pillr">
                    <p>Internationally Minded</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- alsa in number --}}

<div class="number">
    <div class="nmbr">
        <div class="ain" data-aos="fade-up"  >
            <h1>Alsa <span style="font-weight: 100">In Number</span></h1>
        </div>
        <div class="air-col" data-aos="fade-down">
            <div class="alsainnumber">
                <h1>95</h1>
                <p>Years</p>
            </div>
            <div class="alsainnumber-1">
                <h1>95+</h1>
                <p>Alumni</p>
            </div>
            <div class="alsainnumber">
                <h1>95</h1>
                <p>Active Member</p>
            </div>
        </div>
    </div>
</div>



{{-- profile vidio --}}


<div class="pv">
    <div class="video" >
        <iframe data-aos="fade-right" data-aos-anchor-placement="top-center" width="560" height="315" src="{{ $youtube->description}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="vdtxt">
            <h1 data-aos="fade-up" data-aos-anchor-placement="top-center">Video <span style="font-weight: 100">Profile</span></h1>
        </div>
    </div>
</div>



{{-- partner --}}

<div class="partner">
    <div class="prt">
        <div class="part-col">
            <div class="pasrt-jud" data-aos="fade-up" data-aos-anchor-placement="top-center">
                <h1>Our <span style="font-weight: 100">Partner</span></h1>
            </div>

            <div class="lgo-part" data-aos="fade-up" data-aos-anchor-placement="top-center">
                @foreach ($partner as $row)
                    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/partner/' . $row->img_url}}" alt="">
                @endforeach
                
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="foot">
        <div class="foot-logo">
            <img src="{{asset("images/ALSA LC UNAND WHITE.png")}}" alt="">
        </div>

        <div class="ftt">
            <div class="ftt-1">
                <h1>Email</h1>
                <a href="#">mail@gmail.com</a>
            </div>
            <div class="ftt-1">
                <h1>Phone</h1>
                <a href="#">0813216512</a>
            </div>
        </div>
        <div class="add">
            <h1>Address</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, culpa molestias. Maxime nihil molestiae non tempore magni, dolor sint nisi. Odit repudiandae omnis quidem. Qui odit neque quasi suscipit minima?</p>
        </div>
    </div>
</footer>