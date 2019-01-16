<?php

namespace Flagrow\Mason;

use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->js(__DIR__.'/js/dist/forum.js'),
    (new Extend\Frontend('admin'))
        ->css(__DIR__.'/resources/less/admin.less')
        ->js(__DIR__.'/js/dist/admin.js'),
    (new Extend\Routes('api'))
        // Fields
        ->post('/flagrow/mason/fields/order', 'flagrow.mason.api.fields.order', Api\Controllers\FieldOrderController::class)
        ->get('/flagrow/mason/fields', 'flagrow.mason.api.fields.index', Api\Controllers\FieldIndexController::class)
        ->post('/flagrow/mason/fields', 'flagrow.mason.api.fields.store', Api\Controllers\FieldStoreController::class)
        ->patch('/flagrow/mason/fields/{id:[0-9]+}', 'flagrow.mason.api.fields.update', Api\Controllers\FieldUpdateController::class)
        ->delete('/flagrow/mason/fields/{id:[0-9]+}', 'flagrow.mason.api.fields.delete', Api\Controllers\FieldDeleteController::class)

        // Answers
        ->post('/flagrow/mason/fields/{id:[0-9]+}/answers/order', 'flagrow.mason.api.answers.order', Api\Controllers\AnswerOrderController::class)
        ->post('/flagrow/mason/fields/{id:[0-9]+}/answers', 'flagrow.mason.api.answers.create', Api\Controllers\AnswerStoreController::class)
        ->patch('/flagrow/mason/answers/{id:[0-9]+}', 'flagrow.mason.api.answers.update', Api\Controllers\AnswerUpdateController::class)
        ->delete('/flagrow/mason/answers/{id:[0-9]+}', 'flagrow.mason.api.answers.delete', Api\Controllers\AnswerDeleteController::class),
    (new Extend\Locales(__DIR__.'/resources/locale'))
];


//return function (Dispatcher $events) {
//    $events->subscribe(Listeners\AddDiscussionAnswerRelationship::class);
//    $events->subscribe(Listeners\AddForumFieldRelationship::class);
//    $events->subscribe(Listeners\InjectSettings::class);
//    $events->subscribe(Listeners\SaveAnswersToDatabase::class);
//
//    $events->subscribe(Access\AnswerPolicy::class);
//    $events->subscribe(Access\DiscussionPolicy::class);
//    $events->subscribe(Access\FieldPolicy::class);
//};
