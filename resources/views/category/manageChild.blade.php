<ul class="list-group mt-2">
    @foreach($childs as $child)
    <li class="list-group-item mt-2 mb-2 bg-light">
         <div class="d-flex justify-content-between"> 
          <div>{{ $child->name }}</div>  
            <div class="button-group d-flex">
                <button type="button" class="btn btn-primary edit-category" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">Edit</button>&nbsp;

                <form action="{{ route('category.destroy', $child->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" Onclick="return ConfirmDelete();" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
              </div>
              @if(count($child->childs))
              <ul> 
                  <li class="mb-2 bg-light">
                         @include('category.manageChild',['childs' => $child->childs])
                     </li>
                 </ul>
         
                     @endif
             
             @endforeach
    </li>

   
    </ul>


                          

                      