@extends('layouts.main')

@section('title', 'Dashboard')

@section('header-title', 'Halaman Utama')

@section('breadcrumbs')
{{ Breadcrumbs::render('dashboard_dashboard') }}
@endsection

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-bookmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kategori Jasa</h4>
                  </div>
                  <div class="card-body">
                    {{ $categories }}
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-md-4 col-sm-4">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-bookmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sub Jasa</h4>
                  </div>
                  <div class="card-body">
                    {{ $subjasas }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-bookmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sub-sub Jasa</h4>
                  </div>
                  <div class="card-body">
                    {{ $subsubjasas }}
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="col-md-4 col-sm-4">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jasa Layanan</h4>
                  </div>
                  <div class="card-body">
                    {{ $posts }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengunjung Web</h4>
                  </div>
                  <div class="card-body">
                    {{ $visitors }}
                  </div>
                </div>
              </div>
            </div>             
          </div>
        </section>
@endsection