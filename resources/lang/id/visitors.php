<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Visitor',
        'create' => 'Tambah visitor',
        'edit' => 'Ubah visitor',
        'detail' => 'Detail visitor',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data visitor belum ada",
            'search' => "visitor :keyword tidak ditemukan",
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
                'placeholder' => 'Cari visitor',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'Induk visitor',
                'placeholder' => 'Pilih induk visitor',
                'attribute' => 'induk visitor'
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
            'title' => "Tambah visitor",
            'message' => [
                'success' => "visitor berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan visitor. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah visitor',
            'message' => [
                'success' => "visitor berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui visitor. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus visitor',
            'message' => [
                'confirm' => "Yakin akan menghapus visitor :title ?",
                'success' => "visitor berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus visitor. :error"
            ]
        ],
    ]
];
