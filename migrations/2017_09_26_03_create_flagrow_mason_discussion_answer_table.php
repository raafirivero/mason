<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        $schema->create('raafirivero_mason_discussion_answer', function (Blueprint $table) {
            $table->unsignedInteger('discussion_id');
            $table->unsignedInteger('answer_id');
            $table->timestamps();

            $table->foreign('discussion_id')->references('id')->on('discussions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('raafirivero_mason_answers')->onDelete('cascade');
        });
    },
    'down' => function (Builder $schema) {
        $schema->drop('raafirivero_mason_discussion_answer');
    },
];
