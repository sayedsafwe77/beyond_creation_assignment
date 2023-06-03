<?php
return [
    'singular' => 'الفيلم',
    'plural' => 'الافلام',
    'empty' => 'لا يوجد افلام حتى الان',
    'count' => 'عدد الافلام',
    'search' => 'بحث',
    'select' => 'اختر الفيلم',
    'permission' => 'ادارة الافلام',
    'trashed' => 'الافلام المحذوفه',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن فيلم',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة فيلم',
        'show' => 'عرض الفيلم',
        'edit' => 'تعديل الفيلم',
        'delete' => 'حذف الفيلم',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الفيلم بنجاح.',
        'updated' => 'تم تعديل الفيلم بنجاح.',
        'deleted' => 'تم حذف الفيلم بنجاح.',
        'restored' => 'تم استعادة الفيلم بنجاح.',
    ],
    'attributes' => [
        'name' => 'الاسم',
        'description' => 'الوصف',
        'image' => 'الصور',
        'eventdays' => 'ايام العرض',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الفيلم',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا الفيلم',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الفيلم نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
