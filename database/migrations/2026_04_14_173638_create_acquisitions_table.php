<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained();
            $table->date('acquisition_date');
            $table->string('supplier');
            $table->decimal('cost', 8, 2);
            $table->integer('quantity_added')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('book_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acquisitions');
    }
};
