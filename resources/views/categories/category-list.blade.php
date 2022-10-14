{{-- @foreach ($categories as $category)

    <!-- category list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
        <!-- todo: show category title -->
        {{ str_repeat('- Sub ',$count) .'Jasa : '. $category->title }}
        </label>
        <div>
        <!-- detail -->
        {{-- <a href="#" class="btn btn-sm btn-primary" role="button">
            <i class="fas fa-eye"></i> 
        </a>
        <!-- edit -->
        <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-sm btn-info" 
            role="button">
            <i class="fas fa-edit"></i>
        </a>
        <!-- delete -->
        <form class="d-inline" action="{{ route('categories.destroy', ['category' => $category]) }}" role="alert" method="POST"
            alert-title="{{ trans('categories.alert.delete.title') }}"
            alert-text="{{ trans('categories.alert.delete.message.confirm',['title' => $category->title]) }}"
            alert-btn-cancel="{{ trans('categories.button.cancel.value') }}"
            alert-btn-yes="{{ trans('categories.button.delete.value') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i>
            </button>
        </form> 
        </div>
        <!-- todo:show subcategory -->
        @if($category->descendants && !trim(request()->get('keyword')))
        @include('categories.category-list', [
            'categories' => $category->descendants,
            'count' => $count + 1
        ])
        @endif
    </li>
  <!-- end  category list -->
@endforeach --}}
  



 <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped table-md">
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                      {{-- {{ $category->title }}  --}}
                      {{ str_repeat('- Sub ',$count) .'Jasa : '. $category->title }}
                      <div>
                        <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-sm btn-info" 
                        role="button">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form class="d-inline" action="{{ route('categories.destroy', ['category' => $category]) }}" role="alert" method="POST"
                        alert-title="{{ trans('categories.alert.delete.title') }}"
                        alert-text="{{ trans('categories.alert.delete.message.confirm',['title' => $category->title]) }}"
                        alert-btn-cancel="{{ trans('categories.button.cancel.value') }}"
                        alert-btn-yes="{{ trans('categories.button.delete.value') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                    </td>
                        <!-- todo:show subcategory -->
                        <td>
                        @if($category->descendants  && !trim(request()->get('keyword')))
                        @include('categories.category-list', [
                            'categories' => $category->descendants,
                            'count' => $count + 1
                        ])
                        @endif
                        </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
  
</div>
</div>
</div>


