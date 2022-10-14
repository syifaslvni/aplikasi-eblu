<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'produk jasa',
        'create' => 'Tambah produk jasa',
        'edit' => 'Ubah produk jasa',
        'detail' => 'Detail produk jasa',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data produk jasa belum ada",
            'search' => "Produk jasa :keyword tidak ditemukan",
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
            'category' => [
                'label' => 'Kategori',
                'placeholder' => 'Pilih kategori',
                'attribute' => 'kategori'
            ],
            'search' => [
                'label' => 'Pencarian',
                'placeholder' => 'Cari produk jasa',
                'attribute' => 'pencarian'
            ]
        ],
        'select' => [
            'tag' => [
                'label' => 'Tag',
                'placeholder' => 'Masukan tag',
                'attribute' => 'tag',
                'option' => [
                    'publish' => 'Terbitkan',
                    'draft' => 'Draft'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Pilih status',
                'attribute' => 'status',
                'option' => [
                    'draft' => 'Draft',
                    'publish' => 'Terbitkan',
                ]
            ],
        ],
        'textarea' => [
            'description' => [
                'label' => 'Satuan',
                'placeholder' => 'Masukan deskripsi',
                'attribute' => 'deskripsi'
            ],
            'content' => [
                'label' => 'Konten',
                'placeholder' => 'Masukan konten',
                'attribute' => 'konten'
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
        'apply' => [
            'value' => 'Terapkan'
        ]
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah Produk Jasa",
            'message' => [
                'success' => "Produk jasa berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan produk jasa. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah produk jasa',
            'message' => [
                'success' => "produk jasa berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui produk jasa. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus produk jasa',
            'message' => [
                'confirm' => "Yakin akan menghapus produk jasa :title ?",
                'success' => "produk jasa berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus produk jasa. :error"
            ]
        ],
    ]
];
