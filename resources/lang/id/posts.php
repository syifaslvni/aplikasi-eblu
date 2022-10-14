<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'produk jasa layanan',
        'create' => 'Tambah produk jasa layanan',
        'edit' => 'Edit produk jasa layanan',
        'detail' => 'Detail produk jasa layanan',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Data produk jasa layanan belum ada",
            'search' => "Jasa layanan :keyword tidak ditemukan",
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
                'placeholder' => 'Cari produk jasa layanan',
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
            'value' => 'Edit'
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
                'success' => "Produk jasa layanan berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan produk jasa layanan. :error"
            ]
        ],
        'update' => [
            'title' => 'Edit produk jasa layanan',
            'message' => [
                'success' => "produk jasa layanan berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui produk jasa layanan. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus produk jasa layanan',
            'message' => [
                'confirm' => "Yakin akan menghapus produk jasa layanan :title ?",
                'success' => "produk jasa layanan berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus produk jasa layanan. :error"
            ]
        ],
    ]
];
