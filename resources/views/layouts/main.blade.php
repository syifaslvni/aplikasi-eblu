<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>
    {{ config('app.name') }} | @yield('title')
  </title>

  @stack('before-style')
  @include('includes.style')
  @stack('after-style')

  {{-- css:external --}}
  @stack('css-external')

  {{-- css-internal --}}
  @stack('css-internal') 

  <body>
    <div id="app">
      <div class="main-wrapper">
        @include('includes.sidebar')
        <div class="main-panel">
            @include('includes.navbar')
  
            <div class="main-content">
              <section class="section">
                <div class="section-header">
                  <h1>@yield('header-title')</h1>
                  <div class="section-header-breadcrumb">
  
                    @yield('breadcrumbs')
                    
                  </div>
                </div>
            
                <div class="section-body">
                  @if(View::hasSection('section-title'))
                    <h2 class="section-title">@yield('section-title')</h2>
                  @endif
  
                  @if(View::hasSection('section-lead'))
                    <p class="section-lead">
                        @yield('section-lead')
                    </p>
                  @endif
            
                  @yield('content')
                  
                </div>
              </section>
            </div>    
  
            @include('includes.footer')
        </div>
      </div>
    </div>
  </body>
  
  @stack('before-script')
  @include('includes.script')
  @stack('after-script')

  @include('sweetalert::alert')
  
  {{-- javascript:external --}}
  @stack('javascript-external')

  {{-- javascript:internal --}}
  @stack('javascript-internal')
</html>