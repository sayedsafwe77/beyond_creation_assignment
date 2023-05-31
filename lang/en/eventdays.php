<?php

return [
    'singular' => 'EventDay',
    'plural' => 'EventDays',
    'empty' => 'There are no EventDay yet.',
    'count' => 'EventDay Count.',
    'search' => 'Search',
    'select' => 'Select EventDay',
    'permission' => 'Manage EventDay',
    'trashed' => 'EventDay Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for EventDay',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new EventDay',
        'show' => 'Show EventDay',
        'edit' => 'Edit EventDay',
        'delete' => 'Delete EventDay',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The EventDay has been created successfully.',
        'updated' => 'The EventDay has been updated successfully.',
        'deleted' => 'The EventDay has been deleted successfully.',
        'restored' => 'The EventDay has been restored successfully.',
    ],
    'attributes' => [
        'event_day' => 'event day',
        'showtime' => 'select showtimes',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the EventDay?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the EventDay?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the EventDay?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
