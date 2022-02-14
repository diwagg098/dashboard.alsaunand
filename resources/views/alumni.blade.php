@include('layout.app')
@include('layout.nav')


<div class="banner">
    @if($banner)
    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/banner/' . $banner->foto}}" alt="">
    @else
    <img src="{{asset("images/Main Image.jpg")}}" alt="">
    @endif
</div>

{{-- alumni --}}
<div class="alumni">
    <div class="alumni-col">
        <div class="almn">
        @foreach($content as $row)
            <div class="col-almn">
                <h1>{{$row->title}} <span style="font-weight: 100">Form</span></h1>
                {!! $row->description !!}
                <a href="{{ $row->link}}">Click Here</a>
            </div>
            @endforeach
        </div>
    </div>
</div>



{{-- footer --}}

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