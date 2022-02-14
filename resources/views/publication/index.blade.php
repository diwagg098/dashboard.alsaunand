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
                   <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ModalPublication">
                        <i class="fa fa-edit"></i> Add New Publication
                     </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Link Publication</th>
                    <th>Post By</th>
                    <th>Tanggal Post</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($content as $row)
                          <tr>
                              <td>{{ $loop->iteration}}</td>
                              <td>{{ $row->title}}</td>
                              <td>{{ $row->category}}</td>
                              <td>{{ $row->link}}</td>
                              <td>{{ $row->post_by}}</td>
                              <td>{{ $row->tgl_post}}</td>
                              <form action="{{ url('publication/destroy/' . $row->slug)}}" method="POST">
                                @csrf
                                @method("delete")
                                  <td><button class="btn btn-danger" type="submit" onclick="return confirm('Hapus link ?')"><i class="fa fa-trash"></i></button></td>
                                </form>
                          </tr>
                      @endforeach
                    <tr>

                    </tr>
                  </tbody>
                </table>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
                    </div>
                </div>
            </div>
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
    @extends('publication.form')
   
@endsection