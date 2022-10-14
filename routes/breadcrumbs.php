<?php // routes/breadcrumbs.php

// // Note: Laravel will automatically resolve `Breadcrumbs::` without
// // this import. This is nice for IDE syntax and refactoring.
// use Diglactic\Breadcrumbs\Breadcrumbs;

// // This import is also not required, and you could replace `BreadcrumbTrail $trail`
// //  with `$trail`. This is nice for IDE type checking and completion.
// use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Dashboard
Breadcrumbs::for('dashboard_dashboard', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Dashboard');
});

// Kategori
Breadcrumbs::for('categories', function ($trail) {
    $trail->push('Kategori Jasa', route('categories.index'));
});

// Kategori > Data Kategori Jasa
Breadcrumbs::for('data_categories', function ($trail) {
    $trail->parent('categories');
    $trail->push('Data Kategori Jasa', route('categories.index'));
});

// Kategori > Data Kategori Jasa > Add
Breadcrumbs::for('add_categories', function ($trail) {
    $trail->parent('data_categories');
    $trail->push('Tambah Kategori Jasa', route('categories.create'));
});

// Kategori > Data Kategori Jasa > Edit
Breadcrumbs::for('edit_categories', function ($trail, $category) {
    $trail->parent('data_categories');
    $trail->push('Edit Kategori Jasa', route('categories.edit', ['category => $category']));
});

// Kategori > Data Kategori Jasa > Edit > [title]
Breadcrumbs::for('edit_categories_title', function ($trail, $category) {
    $trail->parent('edit_categories', $category);
    $trail->push($category->title, route('categories.edit', ['category => $category']));
});

// Posts
Breadcrumbs::for('posts', function ($trail) {
    $trail->push('Jasa Layanan', route('posts.index'));
});

// Products
Breadcrumbs::for('products', function ($trail) {
    $trail->push('Produk Jasa', route('products.index'));
});

// Posts > Data Product Jasa
Breadcrumbs::for('data_posts', function ($trail) {
    $trail->parent('posts');
    $trail->push('Data Nama Jasa', route('posts.index'));
});

// Posts  > Data Product Jasa > Add
Breadcrumbs::for('add_posts', function ($trail) {
    $trail->parent('data_posts');
    $trail->push('Tambah Produk Jasa', route('posts.create'));
});

// Visitors
Breadcrumbs::for('visitors', function ($trail) {
    $trail->push('Pengunjung Web', route('visitors.index'));
});

// Visitors > Data visitors
Breadcrumbs::for('data_visitors', function ($trail) {
    $trail->parent('visitors');
    $trail->push('Data Pengunjung Web', route('visitors.index'));
});


// Posts  > Detail Product Jasa > detail . [title]
Breadcrumbs::for('detail_posts', function ($trail, $post) {
    $trail->parent('data_posts');
    $trail->push('Detail Produk Jasa', route('posts.show', ['post' => $post]));
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});

// Posts  > Detail Product Jasa > detail . [edit]
Breadcrumbs::for('edit_posts', function ($trail, $post) {
    $trail->parent('data_posts');
    $trail->push('Edit Produk Jasa', route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});

// File Manager
Breadcrumbs::for('settings', function ($trail) {
    $trail->push('Settings', route('filemanager.index'));
});

// File Manager
Breadcrumbs::for('file_manager', function ($trail) {
    $trail->parent('settings');
    $trail->push('File Manager', route('filemanager.index'));
});

// Jenis Jasa
Breadcrumbs::for('kategories', function ($trail) {
    $trail->push('Kategori Jasa', route('jenisjasa.index', 'subjasa.index', 'subsubjasa.index'));
});

// Jenis Jasa > Data Jenis Jasa
Breadcrumbs::for('data_kategories', function ($trail) {
    $trail->parent('kategories');
    $trail->push('Data Jenis Jasa', route('jenisjasa.index'));
});

// Jenis Jasa > Data Jenis Jasa > Add
Breadcrumbs::for('add_kategories', function ($trail) {
    $trail->parent('data_kategories');
    $trail->push('Tambah Jenis Jasa', route('jenisjasa.create'));
});

// Sub Jasa > Data sub Jasa
Breadcrumbs::for('data_subkategories', function ($trail) {
    $trail->parent('kategories');
    $trail->push('Data sub Jasa', route('subjasa.index'));
});

// Sub Jasa > Data sub Jasa > Add
Breadcrumbs::for('add_subkategories', function ($trail) {
    $trail->parent('data_subkategories');
    $trail->push('Tambah sub Jasa', route('subjasa.create'));
});

// Sub Jasa  > Detail Sub Jasa > detail . [title]
Breadcrumbs::for('detail_subkategories', function ($trail, $subjasa) {
    $trail->parent('data_subkategories');
    $trail->push('Detail Produk Sub Jasa', route('subjasa.show', ['subjasa' => $subjasa]));
    $trail->push($subjasa->title, route('subjasa.show', ['subjasa' => $subjasa]));
});

// Sub Jasa  > Detail SubJasa > detail . [edit]
Breadcrumbs::for('edit_subkategories', function ($trail, $subjasa) {
    $trail->parent('data_subkategories');
    $trail->push('Edit Sub Jasa', route('subjasa.edit', ['subjasa' => $subjasa]));
    $trail->push($subjasa->title, route('subjasa.edit', ['subjasa' => $subjasa]));
});


// Sub-sub Jasa > Data Sub-sub Jasa
Breadcrumbs::for('data_subsubkategories', function ($trail) {
    $trail->parent('kategories');
    $trail->push('Data Sub-sub Jasa', route('subsubjasa.index'));
});

// Sub-sub Jasa > Data Sub-sub Jasa > Add
Breadcrumbs::for('add_subsubkategories', function ($trail) {
    $trail->parent('data_subsubkategories');
    $trail->push('Tambah Sub-sub Jasa', route('subsubjasa.create'));
});

// Sub-sub Jasa  > Detail Sub-sub Jasa > detail . [title]
Breadcrumbs::for('detail_subsubkategories', function ($trail, $subsubjasa) {
    $trail->parent('data_subsubkategories');
    $trail->push('Detail Produk Sub-sub Jasa', route('subsubjasa.show', ['subsubjasa' => $subsubjasa]));
    $trail->push($subsubjasa->title, route('subsubjasa.show', ['subsubjasa' => $subsubjasa]));
});

// Sub-sub Jasa  > Detail Sub-sub Jasa > detail . [edit]
Breadcrumbs::for('edit_subsubkategories', function ($trail, $subsubjasa) {
    $trail->parent('data_subsubkategories');
    $trail->push('Edit Sub-sub Jasa', route('subsubjasa.edit', ['subsubjasa' => $subsubjasa]));
    $trail->push($subsubjasa->title, route('subsubjasa.edit', ['subsubjasa' => $subsubjasa]));
});

// products  > Detail Product Jasa > detail . [title]
Breadcrumbs::for('detail_products', function ($trail, $product) {
    $trail->parent('data_products');
    $trail->push('Detail Produk Jasa', route('products.show', ['product' => $product]));
    $trail->push($product->title, route('products.show', ['product' => $product]));
});

// products  > Detail Product Jasa > detail . [edit]
Breadcrumbs::for('edit_products', function ($trail, $product) {
    $trail->parent('data_products');
    $trail->push('Edit Produk Jasa', route('products.edit', ['product' => $product]));
    $trail->push($product->title, route('products.edit', ['product' => $product]));
});

// products > Data Product Jasa
Breadcrumbs::for('data_products', function ($trail) {
    $trail->parent('products');
    $trail->push('Data Nama Jasa', route('products.index'));
});

// products  > Data Product Jasa > Add
Breadcrumbs::for('add_products', function ($trail) {
    $trail->parent('data_products');
    $trail->push('Tambah Produk Jasa', route('products.create'));
});

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });