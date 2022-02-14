@extends('layout.app')
@extends('layout.sidebar')
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  <style>
     p {
      text-align: justify;
    }
  </style>
@section('title','Manage Your Website')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Your Website</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Website</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Banner Home</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalBanner">
                <i class="fa fa-edit"></i> Update
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12">
                  @if ($banner)
                  <img src="{{ asset('img/banner/' . $banner->description)}}" alt="" style="width: 100%; height: 80%">
                  @endif
                </div>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Opening Statment</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalOpening">
                <i class="fa fa-edit"></i> Write Opening
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12">
                  @if ($opening)
                  {!! $opening->description !!}
                  @endif
                </div>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Vision</h3>

          <div class="card-tools">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalVision">
                <i class="fa fa-edit"></i> Write Vision
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12">
                  @if ($vision)
                    {!! $vision->description !!}
                  @endif
                </div>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mision</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalMision">
                <i class="fa fa-edit"></i> Write Mision
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12 tulisan">
                  @if($mision)
                  {!! $mision->description !!}
                  @endif
                </div>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Video Profile</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalVideo">
                <i class="fa fa-video"></i> Add Video
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12">
                  @if ($youtube)
                  <iframe width="100%" height="300" src="{{ $youtube->description}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @endif
                </div>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Our Partner</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPartner">
                <i class="fas fa-plus"></i> Add Partner
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex">
                  <div class="row">
                    @foreach ($partner as $row)
                   <div class="col-md-4 col-sm-6">
                     <div class="container1 p-2">
                        <img src="{{ asset('img/partner/' . $row->img_url )}}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                          <form action="{{ url('manage-website/partner/delete/' . $row->id_partner)}}" method="POST">
                      @csrf
                      @method("delete")
                          <button class="btn btn-primary" type="submit" onclick="return confirm('Hapus partner ?')"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                      </div>
                   </div>
                   @endforeach
                </div>
                </div>
            </div>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
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

@extends('website.form');

@endsection