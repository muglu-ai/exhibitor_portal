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

        Schema::create('delegate_org_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',30)->nullable();
            $table->string('delegate_id',30)->unique();
            $table->string('sector',150)->nullable();
            $table->string('org_type',150)->nullable();
            $table->string('delegates_count',5)->nullable();
            $table->string('nationality',100)->nullable();
            $table->string('student',5)->nullable();
            $table->string('studentid',250)->nullable();
            $table->string('organization_name',250)->nullable();
            $table->string('address1',250)->nullable();
            $table->string('address2',250)->nullable();
            $table->string('city',150)->nullable();
            $table->string('state',150)->nullable();
            $table->string('country',150)->nullable();
            $table->string('zip_code',15)->nullable();
            $table->string('cp_title', 30)->nullable();
            $table->string('cp_fname', 250)->nullable();
            $table->string('cp_lname', 250)->nullable();
            $table->string('cp_email', 250)->nullable();
            $table->string('cp_contact', 15)->nullable();
            $table->string('gst_details',5)->nullable();
            $table->string('gst_number',30)->nullable();
            $table->string('gst_invoice_add',250)->nullable();
            $table->string('pan_number',15)->nullable();
            $table->string('gst_state',50)->nullable();
            $table->string('group_type', 20)->nullable();
            $table->string('reg_id',15)->nullable();
            $table->string('user_type',250)->nullable();
            $table->string('reg_date',250)->nullable();
            $table->string('tin_no',100)->nullable();
            $table->string('currency',100)->nullable();
            $table->string('amt_ext',50)->nullable();
            $table->string('paymode',50)->nullable();
            $table->string('pay_status',50)->nullable();
            $table->string('payment_date',50)->nullable();
            $table->string('pin_no',100)->nullable();
            $table->string('selection_amount',100)->nullable();
            $table->string('promo_code',250)->nullable();
            $table->string('discount',250)->nullable();
            $table->string('tax_amount',50)->nullable();
            $table->string('processing_charge',50)->nullable();
            $table->string('total_amount',50)->nullable();
            $table->string('total_amt_received',50)->nullable();
            $table->text('pg_errorText')->nullable();
            $table->text('pg_paymentId')->nullable();
            $table->text('pg_trackId')->nullable();
            $table->text('pg_result')->nullable();
            $table->text('pg_tranid')->nullable();
            $table->text('pg_auth')->nullable();
            $table->text('pg_avr')->nullable();
            $table->text('pg_ref')->nullable();
            $table->text('pg_amt')->nullable();
            $table->string('assoc_name', 250)->nullable();
            $table->string('event_name', 250)->nullable();
            $table->string('event_year', 4)->nullable();
            $table->string('delegate_under', 20)->nullable();
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
            $table->string('token', 100)->nullable();
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_details');
            $table->foreign('delegate_under')->references('promocode_organization')->on('promocode_details');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegate_org_details');
    }
};
