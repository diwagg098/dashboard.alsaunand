@extends('layout.app')
@extends('layout.sidebar')

@section('title','Alsa Unand Publication')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Publication</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Publication</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                     <div class="card">
              <div class="card-header">
                   <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ModalMarch">
                        <i class="fa fa-edit"></i> Add New Marchendise
                     </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Price</th>
                    <th>Link Produk</th>
                    <th>Description</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($content as $row)
                      <tr>
                          <td>{{ $loop->iteration}}</td>
                          <td>{{ $row->nama_produk}}</td>
                          <td>{{ $row->harga_produk}}</td>
                          <td>{{ $row->link_produk}}</td>
                          <td>{!! substr($row->description,0,100)!!}</td>
                          <form action="{{ url('merch/destroy/' . $row->id)}}" method="POST">
                            @csrf
                            @method("delete")
                              <td><button class="btn btn-outline-danger" type="submit" onclick="return confirm('Hapus data produk ?')"><i class="fa fa-trash"></i></button></td>
                            </form>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
                    </div>
                </div>
            </div>
            @extends('merch.form')
        </section>
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
    
   
@endsection