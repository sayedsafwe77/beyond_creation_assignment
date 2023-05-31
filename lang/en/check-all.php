<?php

return [
    'actions' => [
        'delete' => 'Delete Selected',
        'restore' => 'Restore Selected',

    ],
    'messages' => [
        'deleted' => 'The :type has been selected successfully.',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the :type ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the :type ?',
            'confirm' => 'restore',
            'cancel' => 'cancel',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'Are you sure you want to delete the :type permanently ?',
            'confirm' => 'permanent delete',
            'cancel' => 'cancel',
        ],
    ],
];
