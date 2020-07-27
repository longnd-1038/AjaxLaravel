<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('description');
            $table->timestamps();
        });
        \App\Link::create([
            'url' => 'https://laravel.com/',
            'description' => 'Laravel - The PHP framework for web artisans.',
        ]);

        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);

        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);

        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);
        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);
        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);
        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);
        \App\Link::create([
            'url' => 'https://laracasts.com/',
            'description' => 'The best PHP and Laravel screencasts on the web.',
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
