<?php

namespace ProcessWire;

return [
    'title' => __('Seo fields'),
    'fields' => [
        'window_title' => [
            'label' => __('Window title'),
            'type' => Mystique::TEXT, // or InputfieldText
            'useLanguages' => true,
            'attr' => [
                'placeholder' => __('Enter a window title')
            ]
        ],
        'navigation_title' => [
            'label' => __('Navigation title'),
            'type' => Mystique::TEXT, // or InputfieldText
            'useLanguages' => true,
            'showIf' => [
                'window_title' => "!=''"
            ],
            'attr' => [
                'placeholder' => __('Enter a navigation title')
            ]
        ],
        'description' => [
            'label' => __('Description for search engines'),
            'type' => Mystique::TEXTAREA,
            'useLanguages' => true
        ],
        'page_tpye' => [
            'label' => __('Type'),
            'type' => Mystique::SELECT,
            'options' => [
                'basic' => __('Basic page'),
                'gallery' => __('Gallery'),
                'blog' => __('Blog')
            ]
        ],
        'show_on_nav' => [
            'label' => __('Display this page on navigation'),
            'type' => Mystique::CHECKBOX
        ]
    ]
];
?>