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

        Schema::create('delegate_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',30)->nullable();
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
            $table->string('cp_name', 250)->nullable();
            $table->string('cp_email', 250)->nullable();
            $table->string('cp_contact', 15)->nullable();
            $table->string('gst_details',5)->nullable();
            $table->string('gst_number',30)->nullable();
            $table->string('gst_invoice_add',250)->nullable();
            $table->string('pan_number',15)->nullable();
            $table->string('gst_state',50)->nullable();
            $table->string('group_type', 20)->nullable();
            $table->string('del1_name',250)->nullable();
            $table->string('del1_email',250)->nullable();
            $table->string('del1_designation',250)->nullable();
            $table->string('del1_contact',15)->nullable();
            $table->string('del1_type',250)->nullable();
            $table->string('del1_govtid_type', 25)->nullable();
            $table->string('del1_govtid_no', 50)->nullable();
            $table->string('del2_name',250)->nullable();
            $table->string('del2_email',250)->nullable();
            $table->string('del2_designation',250)->nullable();
            $table->string('del2_contact',15)->nullable();
            $table->string('del2_type',250)->nullable();
            $table->string('del2_govtid_type', 25)->nullable();
            $table->string('del2_govtid_no', 50)->nullable();
            $table->string('del3_name',250)->nullable();
            $table->string('del3_email',250)->nullable();
            $table->string('del3_designation',250)->nullable();
            $table->string('del3_contact',15)->nullable();
            $table->string('del3_type',250)->nullable();
            $table->string('del3_govtid_type', 25)->nullable();
            $table->string('del3_govtid_no', 50)->nullable();
            $table->string('del4_name',250)->nullable();
            $table->string('del4_email',250)->nullable();
            $table->string('del4_designation',250)->nullable();
            $table->string('del4_contact',15)->nullable();
            $table->string('del4_type',250)->nullable();
            $table->string('del4_govtid_type', 25)->nullable();
            $table->string('del4_govtid_no', 50)->nullable();
            $table->string('del5_name',250)->nullable();
            $table->string('del5_email',250)->nullable();
            $table->string('del5_designation',250)->nullable();
            $table->string('del5_contact',15)->nullable();
            $table->string('del5_type',250)->nullable();
            $table->string('del5_govtid_type', 25)->nullable();
            $table->string('del5_govtid_no', 50)->nullable();
            $table->string('del6_name',250)->nullable();
            $table->string('del6_email',250)->nullable();
            $table->string('del6_designation',250)->nullable();
            $table->string('del6_type',250)->nullable();
            $table->string('del6_contact',15)->nullable();
            $table->string('del6_govtid_type', 25)->nullable();
            $table->string('del6_govtid_no', 50)->nullable();
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
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
            $table->string('token', 100)->nullable();
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_table');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegate_table');
    }
};
