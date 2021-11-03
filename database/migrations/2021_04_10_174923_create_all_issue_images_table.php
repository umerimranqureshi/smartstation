<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllIssueImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_issue_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->index()->nullable()->constrained('modals')->nullOnDelete();
            $table->string('issue_name');
            $table->double('issue_price')->nullable();
            $table->string('issue_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_issue_images');
    }
}
