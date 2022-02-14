@include('layout.app')
@include('layout.nav')


<div class="banner">
    <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/structure/' . $structure->description}}" alt="">
</div>



{{-- board desivtion --}}


<div class="bd">
  <div class="bd-col">
    <div class="bd-b">
      <div class="bd-1">
        <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/struktur/' . $director->img_url}}" alt="">
      </div>
      <div class="bdtxt">
        <h1>Board <span style="font-weight: 100">Of Direction</span></h1>
      </div>
    </div>
  </div>
</div>



{{-- division --}}
@foreach ($all_divisi as $all)
<div class="division">
  <div class="dvs">
    <div class="dvs-1">
      <div class="dv-1">
        <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/structure/' . $all->img_url}}" alt="" style="width: 500px">
      </div>
      <div class="inter">
        <h1>{{ $all->divisi}} <span style="font-weight: 100">Division</span></h1>
      </div>
    </div>
  </div>
</div>
@endforeach


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