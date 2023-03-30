<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_details', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('sname');
            $table->string('investment_made_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->string('contact_method');
            $table->string('dob');
            $table->string('occupation');
            $table->text('submission_details')->nullable();
            $table->string('company_name');
            $table->string('invest_company');
            $table->string('scheme');
            $table->string('total_invest');
            $table->string('invest_date');
            $table->string('account_id');
            $table->string('invest_method');
            $table->string('hear_invest_company');
            $table->string('payment_instructions');
            $table->string('assistance');
            $table->string('represented');
            $table->string('their_contact');
            $table->string('received_returns');
            $table->string('what_company')->nullable();
            $table->string('how_receive_payment')->nullable();
            $table->string('expecting_returns')->nullable();
            $table->string('invest_company_returns')->nullable();
            $table->string('source_funds');
            $table->string('updates_investment');
            $table->string('legal_assistance');
            $table->string('legal_proceedings');
            $table->string('legal_gains')->nullable();
            $table->string('law_enforcement')->nullable();
            $table->string('backing_claim');
            $table->string('evidence')->nullable();
            $table->text('losses_investment');
            $table->string('ip_address');
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
        Schema::dropIfExists('investor_details');
    }
}
