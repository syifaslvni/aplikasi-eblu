<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Sub Jasa',
        'create' => 'Tambah Sub Jasa',
        'edit' => 'Ubah Sub Jasa',
        'detail' => 'Detail Sub Jasa',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data Sub Jasa belum ada",
            'search' => "Sub Jasa :keyword tidak ditemukan",
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
                'placeholder' => 'Cari Sub Jasa',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'jenis jasa',
                'placeholder' => 'Pilih jenis jasa',
                'attribute' => 'jenis jasa'
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
            'title' => "Tambah Sub Jasa",
            'message' => [
                'success' => "Sub Jasa berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan Sub Jasa. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Sub Jasa',
            'message' => [
                'success' => "Sub Jasa berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui Sub Jasa. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Sub Jasa',
            'message' => [
                'confirm' => "Yakin akan menghapus Sub Jasa :title ?",
                'success' => "Sub Jasa berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus Sub Jasa. :error"
            ]
        ],
    ]
];
