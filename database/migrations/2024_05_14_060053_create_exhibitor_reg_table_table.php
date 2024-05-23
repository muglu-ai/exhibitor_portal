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
        Schema::disableForeignKeyConstraints();

        Schema::create('exhibitor_reg_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',15)->index();
            $table->string('org_name',250)->nullable();
            $table->string('org_type',250)->nullable();
            $table->text('org_reg_certificate')->nullable();
            $table->string('booth_size',250)->nullable();
            $table->string('booth_area',250)->nullable();
            $table->string('booth_space',250)->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('zip_code',12)->nullable();
            $table->string('cp_name',250)->nullable();
            $table->string('cp_email',250)->index();
            $table->string('cp_designation',250)->nullable();
            $table->string('cp_mobile',15)->nullable();
            $table->string('website',250)->nullable();
            $table->string('gst_details',50)->nullable();
            $table->string('gst_number',50)->nullable();
            $table->string('gst_invoice_add',250)->nullable();
            $table->string('pan_number',50)->nullable();
            $table->string('gst_state',50)->nullable();
            $table->string('sales_executive',250)->nullable();
            $table->string('reg_id',50)->nullable();
            $table->string('user_type',250)->nullable();
            $table->string('exhibiting_under',250)->nullable(); 
            $table->string('reg_date',250)->nullable();
            $table->string('tin_no',100)->nullable();
            $table->string('currency',100)->nullable();
            $table->string('amt_ext',100)->nullable();
            $table->string('paymode',100)->nullable();
            $table->string('pay_status',100)->nullable();
            $table->string('payment_date',250)->nullable();
            $table->string('pin_no',100)->nullable();
            $table->string('selection_amount',100)->nullable();
            $table->string('promo_code',100)->nullable();
            $table->string('discount',100)->nullable();
            $table->string('tax_amount',100)->nullable();
            $table->string('processing_charge',100)->nullable();
            $table->string('total_amount',100)->nullable();
            $table->string('total_amt_received',    100)->nullable();
            $table->string('delegate_type',250)->nullable();
            $table->text('pg_errorText')->nullable();
            $table->text('pg_paymentId')->nullable();
            $table->text('pg_trackId')->nullable();
            $table->text('pg_result')->nullable();
            $table->text('pg_tranid')->nullable();
            $table->text('pg_auth')->nullable();
            $table->text('pg_avr')->nullable();
            $table->text('pg_ref')->nullable();
            $table->text('pg_amt')->nullable();
            $table->string('event_name', 250)->nullable();
            $table->string('event_year', 4)->nullable();
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
            $table->foreign('exhibiting_under')->references('promocode_organization')->on('promocode_table');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitor_reg_table');
    }
};
