<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="#"><i class="fas fa-ship"></i>eBLU</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="#">eBLU</a>
     </div>
     <ul class="sidebar-menu">
      {{-- dashboard --}}
       <li class="menu-header">Dashboard</li>
       <li class="nav-link {{ set_active('dashboard.index') }}">
        <a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i>
        <span>Dashboard</span></a></li>
        
        {{-- jasa --}}
       <li class="menu-header">Jasa</li>
       {{-- kategori jasa --}}
       <li class="nav-link {{ set_active(['categories.index', 'categories.create', 'categories.edit']) }}">
        <a href="{{ route('categories.index') }}"><i class="fas fa-bookmark"></i>
        <span>Kategori Jasa</span></a></li>

        {{-- kategori jasa --}}
        {{-- <li class="nav-link {{ set_active(['jenisjasa.index', 'jenisjasa.create', 
        'subjasa.index', 'subjasa.create', 'subjasa.edit',
        'subsubjasa.index', 'subsubjasa.create', 'subsubjasa.edit']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bookmark">
            </i><span>Kategori Jasa</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-link {{ set_active(['jenisjasa.index', 'jenisjasa.create']) }}">
              <a href="{{ route('jenisjasa.index') }}">Jenis Jasa</a></li>
            
            <li class="nav-link {{ set_active(['subjasa.index', 'subjasa.create', 'subjasa.edit']) }}">
              <a href="{{ route('subjasa.index') }}">Sub Jasa</a></li>
            
            <li class="nav-link {{ set_active(['subsubjasa.index', 'subsubjasa.create', 'subsubjasa.edit']) }}">
              <a href="{{ route('subsubjasa.index') }}">Sub-sub Jasa</a></li>
          </ul>
        </li> --}}

        {{-- produk jasa --}}
        <li class="nav-link {{ set_active(['posts.index', 'posts.create', 'posts.show', 'posts.edit']) }}">
          <a href="{{ route('posts.index') }}"><i class="fas fa-newspaper"></i>
         <span>Jasa Layanan</span></a></li>

         {{-- produk jasa --}}
        {{-- <li class="nav-link {{ set_active(['products.index', 'products.create', 'products.show', 'products.edit']) }}">
          <a href="{{ route('products.index') }}"><i class="fas fa-newspaper"></i>
         <span>Jasa Produk Layanan</span></a></li> --}}
         
         {{-- visitor --}}
         <li class="menu-header">Visitors</li>
         {{-- file manager--}}
        <li class="nav-link {{ set_active(['visitors.index']) }}">
          <a href="{{ route('visitors.index') }}"><i class="fas fa-users"></i>
         <span>Pengunjung Web</span></a>
        </li>
       
         {{-- setting --}}
        <li class="menu-header">Settings</li>
         {{-- file manager--}}
        <li class="nav-link {{ set_active(['filemanager.index']) }}">
          <a href="{{ route('filemanager.index') }}"><i class="fas fa-images"></i>
         <span>File Manager</span></a>
        </li>
        
      </ul>        
    </aside>
 </div>