@extends('layout.main')

@section('title')
    Category
@endsection

@section('style')
{{-- <style>
  li{
    list-style-type: none;
  }

</style> --}}
<style>
  /* body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;} */
  li{
    list-style-type: none;
  }
  
  </style>

@endsection
@section('content')

 {{-- alert .start --}}
 <script>
  function ConfirmDelete()
  {
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
      return false;
  }
</script>    
 {{-- alert .end --}}

        @if (Session::has('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

          <div class="container py-3">
            {{-- modal.start --}}
            <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Category</h5>
  
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                      </button>
                    </div>
  
                    <form action="" method="POST">
                      @csrf
                      @method('PUT')
  
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" id="editCategoryModal"  placeholder="Category Name" required>
                        </div>
                      </div>
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    </form>
                </div>
              </div>
               {{-- modal.end--}}
            

          <div class="row">
            <div class="col-md-8">

              <div class="card bg-info">
                <div class="card-header">
                  <h3>Categories</h3>
                </div>
                <div class="card-body bg-light">
                  <ul class="list-group ">
                    @foreach ($categories as $category)
                      <li   class="list-group-item">
                 
                          <div class="d-flex justify-content-between"> 
                            <div class="bg-secondary  w-100"> <span class="text-light"><strong> &nbsp;{{ $category->name }}  </strong></span></div>&nbsp;  
                              <div class="button-group d-flex">
                                  <button type="button" class="btn btn-primary edit-category" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}">Edit</button>&nbsp;
                  
                                  <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                  
                                    <button  type="submit" Onclick="return ConfirmDelete();" class="btn btn-sm btn-danger">Delete</button>
                                  </form>
                                </div>
                                </div>

                          {{-- childs start--}}
                          
                        
                                    @if(count($category->childs))
                                        @include('category.manageChild',['childs' => $category->childs])
                                        
                                    @endif
                      {{-- childs end--}}

                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            

            <div class="col-md-4">
              <div class="card bg-info">
                <div class="card-header">
                  <h3>Create Category</h3>
                </div>

                <div class="card-body">
                  <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <select class="form-control" name="parent_id">
                        <option value="">Select Parent Category</option>

                        @foreach ($allCategories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group mt-2">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name" required>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

        <script type="text/javascript">
          $('.edit-category').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var url = "{{ url('editcategory')}}/"+ id;

            $('#exampleModal form').attr('action', url);
            $('#exampleModal form input[name="name"]').val(name);
          });
        </script>

      
  @endsection
