    <!-- Modal Banner-->
<div class="modal fade" id="ModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('event/store')}}" enctype="multipart/form-data" method="POST">
      <div class="modal-body">
            @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-heading"></i></span>
            </div>
            <input type="text" class="form-control" name="title" id="title" onkeyup="createSlug()" value="" placeholder="Judul Publication">
        </div>
        <input type="hidden" name="slug" id="slug">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-book-reader"></i></span>
            </div>
            <select name="category" id="" class="form-control">
                <option value="">-- Choose Category --</option>
                <option value="Academic">Academic</option>
                <option value="Internal">Internal</option>
                <option value="External">External</option>
            </select>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file[]" multiple id="customFile" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <textarea id="summernote" class="summernote" rows="200" name="description">

        </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{-- End Modal Banner --}}