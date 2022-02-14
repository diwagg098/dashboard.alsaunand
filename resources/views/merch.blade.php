@include('layout.app')
@include('layout.nav')


<div class="banner">
    <img src="{{asset("images/Main Image.jpg")}}" alt="">
</div>



{{-- merch --}}


<div class="merch">
    <div class="merch-col">
        <div class="merch-1">
            <h1>Alsa <span style="font-weight: 100">Merch</span></h1>
        </div>
        <div class="merch-clom">
            @foreach ($content as $row)
            <div class="merch-itm">
                <div class="merch-pic">
                    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/produk/'  . $row->foto}}" alt="">
                </div>
                <div class="merch-jdl">
                    <div class="merch-sec">
                        <h1>{{ $row->nama_produk}}</h1>
                        {!! $row->description !!}
                    </div>
                    <div class="tmbl">
                        <a href="{{ $row->link_produk}}">Buy</a>
                    </div>
                </div>
            </div>
            @endforeach
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