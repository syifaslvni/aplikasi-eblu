<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Kategori',
        'create' => 'Tambah Kategori',
        'edit' => 'Ubah Kategori',
        'detail' => 'Detail Kategori',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data kategori belum ada",
            'search' => "Kategori :keyword tidak ditemukan",
        ]
    ],
    'form_control' => [
        'input' => [
            'title' => [
                'label' => 'Judul',
                'placeholder' => 'Masukan judul',
                'attribute' => 'judul'
            ],
            'slug' => [
                'label' => 'Slug',
                'placeholder' => 'Automatis dibuatkan',
                'attribute' => 'slug'
            ],
            'thumbnail' => [
                'label' => 'Thumbnail',
                'placeholder' => 'Telusuri thumbnail',
                'attribute' => 'thumbnail'
            ],
            'search' => [
                'label' => 'Pencarian',
                'placeholder' => 'Cari kategori',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'Induk Kategori',
                'placeholder' => 'Pilih induk kategori',
                'attribute' => 'induk kategori'
            ]
        ],
        'textarea' => [
            'description' => [
                'label' => 'Deskripsi',
                'placeholder' => 'Masukan deskripsi',
                'attribute' => 'deskripsi'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Tambah'
        ],
        'save' => [
            'value' => 'Simpan'
        ],
        'edit' => [
            'value' => 'Ubah'
        ],
        'delete' => [
            'value' => 'Hapus'
        ],
        'cancel' => [
            'value' => 'Batal'
        ],
        'browse' => [
            'value' => 'Telusuri'
        ],
        'back' => [
            'value' => 'Kembali'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah Kategori",
            'message' => [
                'success' => "Kategori berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan kategori. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Kategori',
            'message' => [
                'success' => "Kategori berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui kategori. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Kategori',
            'message' => [
                'confirm' => "Yakin akan menghapus kategori :title ?",
                'success' => "Kategori berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus kategori. :error"
            ]
        ],
    ]
];
