<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Jenis Jasa',
        'create' => 'Tambah Jenis Jasa',
        'edit' => 'Ubah Jenis Jasa',
        'detail' => 'Detail Jenis Jasa',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data Jenis Jasa belum ada",
            'search' => "Jenis Jasa :keyword tidak ditemukan",
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
                'placeholder' => 'Cari Jenis Jasa',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'Induk Jenis Jasa',
                'placeholder' => 'Pilih induk Jenis Jasa',
                'attribute' => 'induk Jenis Jasa'
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
            'title' => "Tambah Jenis Jasa",
            'message' => [
                'success' => "Jenis Jasa berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan Jenis Jasa. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Jenis Jasa',
            'message' => [
                'success' => "Jenis Jasa berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui Jenis Jasa. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Jenis Jasa',
            'message' => [
                'confirm' => "Yakin akan menghapus Jenis Jasa :title ?",
                'success' => "Jenis Jasa berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus Jenis Jasa. :error"
            ]
        ],
    ]
];
