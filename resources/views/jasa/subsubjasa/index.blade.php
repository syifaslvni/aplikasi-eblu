@extends('layouts.main')

@section('title', 'Data Sub-sub Jasa')

@section('header-title', 'Data Sub-sub Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_subsubkategories') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4><a href="{{ route('subsubjasa.create') }}" class="btn btn-warning float-left" role="button">
             Tambah Sub-sub Jasa
             <i class="fas fa-plus-square"></i>
          </a></h4>
          <div class="card-header-form">
             {{-- Form Search --}}
             <form action="{{ route('subsubjasa.index') }}" method="GET">
                <div class="input-group">
                  <input name="keyword" type="search" class="form-control" 
                  placeholder="Cari Sub-sub Jasa"
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
                        <th>No</th>
                        <th>Jenis Jasa</th>
                        <th>Sub Jasa</th>
                        <th>Sub-Sub Jasa</th>
                        <th>Action</th>
                     </tr>
               </thead>
               <tbody>
                  @forelse ($subsubjasas as $index => $subsubjasa)
                  <tr>
                     <td>{{ $index + $subsubjasas->firstItem() }}</td>
                     <td>{{ ($subsubjasa->subjasa->jenisjasa->title) }}</td>
                     <td>{{ ($subsubjasa->subjasa->title) }}</td>
                     <th>{{ $subsubjasa->title }} </th>
                        <td>
                        <!-- edit -->
                        <a href="{{ route('subsubjasa.edit', ['subsubjasa' => $subsubjasa]) }}" class="btn btn-sm btn-info mt-1" role="button">
                           <i class="fas fa-edit"></i>
                        </a>
                        <!-- delete -->
                        <form class="d-inline" role="alert"
                           alert-text="{{ trans('subsubjasa.alert.delete.message.confirm', ['title' => $subsubjasa->title]) }}"
                           action="{{ route('subsubjasa.destroy', ['subsubjasa' => $subsubjasa]) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger mt-1">
                           <i class="fas fa-trash"></i>
                           </button>
                        </form> 
                     </td>
                  </tr>
                  @empty
                     <p class="text-center">
                        <strong>
                           @if(request()->get('keyword'))
                              {{ trans('subsubjasa.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                           @else
                              {{ trans('subsubjasa.label.no_data.fetch') }}
                           @endif
                        </strong>
                     </p>
                  @endforelse
               </tbody>
            </table>
            </div>
         </div>
         @if ($subsubjasas->hasPages())
            <div class="card-footer">
               {{ $subsubjasas->links('vendor.pagination.bootstrap-4') }}
            </div>
         @endif
      </div>
 </div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         //Event : delete
         $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
               title: "{{ trans('subjasa.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('subjasa.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('subjasa.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush