@extends('layout.app')
@extends('layout.sidebar')
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway);

.main-title{
  color: #2d2d2d;
  text-align: center;
  text-transform: capitalize;
  padding: 0.7em 0;
}

.container2{
  padding: 1em 0;
  float: left;
  width: 50%;
}

.container2 .title{
  color: #1a1a1a;
  text-align: center;
  margin-bottom: 10px;
}

.content {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: auto;
  overflow: hidden;
}

.content .content-overlay {
  background: rgba(0,0,0,0.7);
  position: absolute;
  height: 99%;
  width: 100%;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay{
  opacity: 1;
}

.content-image{
  width: 100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details{
  top: 50%;
  left: 50%;
  opacity: 1;
}

.content-details h3{
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}

.content-details p{
  color: #fff;
  font-size: 0.8em;
}

.fadeIn-bottom{
  top: 80%;
}

.fadeIn-top{
  top: 20%;
}

.fadeIn-left{
  left: 20%;
}

.fadeIn-right{
  left: 80%;
}
</style>

@section('title','Manage Your Organize')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Your Organize</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage Board</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            {{-- Banner Struktur --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Board of Structure</h1>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalStructure">
                                            <i class="fa fa-edit"></i> Upload Foto
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                            </div>
                            @if ($structure)
                            <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/structure/' . $structure->description}}" alt="" width="100%" class="img-fluid img-thumbnail">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr><br>
            {{-- End Of Banner Struktur --}}

            {{-- Director  --}}
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Division of Director</h1>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDirector">
                                            <i class="fa fa-edit"></i> Upload Foto
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                              @if ($director)
                              <img src="{{ 'http://localhost/dashboard.alsaunand/public/img/struktur/' . $director->img_url}}" alt="" height="" width="70%" class="img-thumbnail">
                              @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Director --}}
            <div class="container">
                <div class="card p-3">
                  <div class="card-header">
                      <h1 class="card-title">All of Division</h1>
                                   <div class="card-tools">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDivisi">
                                            <i class="fa fa-edit"></i> Upload Foto
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                  </div>
            <div class="row d-flex justify-content-between">
              @foreach ($division as $row)
            <div class="col-md-6 col-sm-12 col-xs-12 mb-5">
                <div class="content">
                    <a href="#" target="_blank">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ asset('img/structure/' . $row->img_url)}}">
                    <div class="content-details fadeIn-bottom">
                        <h3 class="content-title">{{ $row->divisi}}</h3>
                        <button class="btn btn-outline-danger">Hapus</button>
                    </div>
                    </a>
                </div>
                </div>
              @endforeach
                </div>
        </section>
    </div>
    @include('board.form')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  });
</script>
@endsection