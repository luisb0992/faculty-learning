<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            // $now = now();
            // $data = [
            //     [
            //         'title'         => 'header_menu',
            //         'value'         => '"a:4:{i:0;a:3:{s:5:\"label\";s:4:\"Home\";s:3:\"url\";s:1:\"\/\";s:9:\"mega_menu\";s:0:\"\";}i:1;a:3:{s:5:\"label\";s:4:\"Blog\";s:3:\"url\";s:5:\"\/blog\";s:9:\"mega_menu\";s:0:\"\";}i:2;a:3:{s:5:\"label\";s:7:\"Courses\";s:3:\"url\";s:8:\"\/courses\";s:9:\"mega_menu\";s:0:\"\";}i:3;a:3:{s:5:\"label\";s:10:\"Instructor\";s:3:\"url\";s:12:\"\/instructors\";s:9:\"mega_menu\";s:0:\"\";}}"',
            //         'status'        => 1,
            //         'lang'          => 'en',
            //         'created_at'    => $now,
            //         'updated_at'    => $now,
            //     ]
            // ];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
