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
        // Create employers table
        Schema::create('employers', function (Blueprint $table) {

            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained();
            $table->timestamps();
        });

        // Add foreign key to jobs table
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key from jobs table
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['employer_id']);
            $table->dropColumn('employer_id');
        });

        // Drop employers table
        Schema::dropIfExists('employers');
    }
};
