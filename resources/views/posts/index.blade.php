@extends('layouts.main')

@section('title', 'Data Jasa Layanan')

@section('header-title', 'Data Jasa Layanan')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_posts') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4><a href="{{ route('posts.create') }}" class="btn btn-warning float-left" role="button">
             Tambah Jasa
             <i class="fas fa-plus-square"></i>
          </a></h4>
          <div class="card-header-form">
             {{-- Form Search --}}
             <form action="{{ route('posts.index') }}" method="GET">
                <div class="input-group">
                  <input name="keyword" type="search" class="form-control" 
                  placeholder="Cari Jasa"
                  value="{{ request()->get('keyword') }}">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
          </div>  
        </div>
         <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-md">
               <thead>
                  <tr>
                        <th class="text-center">No</th>
                        <th>Jenis Jasa</th>
                        <th>Satuan</th>
                        <th class="text-center">Action</th>
                     </tr>
               </thead>
               <tbody>
                  @forelse ($posts as $index => $post)
                  <tr>
                     <td class="text-center">{{ $index + $posts->firstItem() }}</td>
                     <td>{{ $post->title }} </td>
                     <td>{{ $post->description }}</td>
                        <td class="text-center">
                        <!-- detail -->
                        <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-sm btn-primary mt-1" role="button">
                           <i class="fas fa-eye"></i>
                        </a>
                        <!-- edit -->
                        <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-sm btn-info mt-1" role="button">
                           <i class="fas fa-edit"></i>
                        </a>
                        <!-- delete -->
                        <form class="d-inline" role="alert"
                           alert-text="{{ trans('posts.alert.delete.message.confirm', ['title' => $post->title]) }}"
                           action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger mt-1">
                           <i class="fas fa-trash"></i>
                           </button>
                        </form> 
                     </td>
                  </tr>
                  @empty
                     <p class="text-center text-danger">
                        <strong>
                           @if(request()->get('keyword'))
                              {{ trans('posts.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                           @else
                              {{ trans('posts.label.no_data.fetch') }}
                           @endif
                        </strong>
                     </p>
                  @endforelse
               </tbody>
            </table>
            </div>
         </div>
         @if ($posts->hasPages())
            <div class="card-footer">
               {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
         @endif
      </div>
 </div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         //Event : delete post product
         $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
               title: "{{ trans('posts.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('posts.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('posts.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush