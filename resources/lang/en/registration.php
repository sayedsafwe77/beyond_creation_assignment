<?php

return [
    'singular' => 'Registration',
    'plural' => 'Registrations',
    'empty' => 'There are no Registration yet.',
    'count' => 'Registration Count.',
    'search' => 'Search',
    'select' => 'Select Registration',
    'permission' => 'Manage Registration',
    'trashed' => 'Registration Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for Registration',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new Registration',
        'show' => 'Show Registration',
        'edit' => 'Edit Registration',
        'delete' => 'Delete Registration',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Registration has been created successfully.',
        'updated' => 'The Registration has been updated successfully.',
        'deleted' => 'The Registration has been deleted successfully.',
        'restored' => 'The Registration has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'User Name',
        'email' => 'email',
        'mobile' => 'mobile',
        'eventdays' => 'eventdays',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Registration?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the Registration?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the Registration?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
