<?php

return [
    'singular' => 'Movie',
    'plural' => 'Movies',
    'empty' => 'There are no Movie yet.',
    'count' => 'Movie Count.',
    'search' => 'Search',
    'select' => 'Select Movie',
    'permission' => 'Manage Movie',
    'trashed' => 'Movie Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for Movie',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new Movie',
        'show' => 'Show Movie',
        'edit' => 'Edit Movie',
        'delete' => 'Delete Movie',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Movie has been created successfully.',
        'updated' => 'The Movie has been updated successfully.',
        'deleted' => 'The Movie has been deleted successfully.',
        'restored' => 'The Movie has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Movie Name',
        'description' => 'Description',
        'image' => 'Images',
        'eventdays' => 'Eventdays',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Movie?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the Movie?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the Movie?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
