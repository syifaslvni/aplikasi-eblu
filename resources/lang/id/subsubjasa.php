<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Sub-sub Jasa',
        'create' => 'Tambah Sub-sub Jasa',
        'edit' => 'Ubah Sub-sub Jasa',
        'detail' => 'Detail Sub-sub Jasa',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data Sub-sub Jasa belum ada",
            'search' => "Sub-sub Jasa :keyword tidak ditemukan",
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
                'placeholder' => 'Cari Sub-sub Jasa',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'Induk Sub-sub Jasa',
                'placeholder' => 'Pilih Sub Jasa',
                'attribute' => 'Sub Jasa'
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
            'title' => "Tambah Sub-sub Jasa",
            'message' => [
                'success' => "Sub-sub Jasa berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan Sub-sub Jasa. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Sub-sub Jasa',
            'message' => [
                'success' => "Sub-sub Jasa berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui Sub-sub Jasa. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Sub-sub Jasa',
            'message' => [
                'confirm' => "Yakin akan menghapus Sub-sub Jasa :title ?",
                'success' => "Sub-sub Jasa berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus Sub-sub Jasa. :error"
            ]
        ],
    ]
];
