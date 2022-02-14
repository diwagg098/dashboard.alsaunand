@include('layout.app')
@include('layout.nav')


<div class="banner">
   @if ($banner)
    <img src="{{'http://localhost/dashboard.alsaunand/public/img/banner/' . $banner->foto}}" alt="">
    @else
    <img src="{{asset("images/Main Image.jpg")}}" alt="">
    @endif
</div>


{{-- according event --}}

<div class="acc">
    <div class="jdl-event">
        <h1>Event</h1>
    </div>
    @for ($i = 0; $i < count($content); $i++)
    <button class="acordion"><h2>{{ $content[$i][0]->category}} <span style="font-weight: 100">Affairs</span></h2></button>
    <div class="panel">
        @foreach ($content[$i] as $row)
        <div class="pnl1">
            <div class="pnl-col">
                <div class="panel-col">
                    <h1>{{ $row->title}}</h1>
                </div>
                <div class="panel-txt">
                    {!! $row->description !!}
                </div>
            </div>
           
            <div class="slide-h">
                <div class="slide-p">
                    @foreach (json_decode($row->foto) as $image)
                    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/event/' . $image}}" alt="" width="100%">
                    @endforeach
                </div>
            </div>

        </div>
        @endforeach
    </div>  
    @endfor
    


{{-- akademik --}}



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