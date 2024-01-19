<?php

use App\Models\User;
use App\Models\Package;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Package::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(PaymentMethod::class)->nullable()->constrained()->nullOnDelete();
            $table->string('transaction_id')->nullable();
            $table->string('username');
            $table->string('package_name');
            $table->string('payment_method_name');
            $table->double('base_amount');
            $table->string('base_currency');
            $table->double('paid_amount');
            $table->string('paid_currency');
            $table->timestamp('purchase_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
