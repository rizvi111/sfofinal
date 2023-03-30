<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SFO') }}</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>

</head>

<body>

    <div class="container bg-white p-0">

        <header class="p-3">

            <img src="{{ asset('assets/frontend/img/SFOLogo.png') }}" alt="Logo" title="Logo">

        </header>

        <section id="notice" class="bg-light p-3">

            <div class="row">

                <div class="col-md-12">

                    <h3>Serious Fraud Office Secure Form</h3>

                    <p>In order to facilitate the submission of both large files and sensitive data, we have put in
                        place this secure form.</p>

                    <p>Please fill out the form in as much detail as possible and attach any accompanying files. Once
                        you submit these details they will be processed and securely delivered to the Serious Fraud
                        Office.</p>

                </div>

            </div>

        </section>

        <section id="mainForm" class="p-3">

            @if (Session::has('errors'))
                <div class="alert alert-danger" role="alert">

                    Something wrong! please fill the form correctly.

                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">

                    Success! {{ Session::get('success') }}

                </div>
            @endif

            <form method="POST" action="{{ route('form_submit') }}" enctype="multipart/form-data" id="login"
                onsubmit="process(event)">

                @csrf

                <div class="accordion" id="accordionForm">

                    <div class="accordion-item">

                        <h2 class="accordion-header" id="headingOne">

                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#investorDetails" aria-expanded="true" aria-controls="investorDetails">

                                Investor Details

                            </button>

                        </h2>

                        <div id="investorDetails" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionForm">

                            <div class="accordion-body">

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="fname" class="form-label"><strong>1. First name (of
                                                    investor)</strong></label>

                                            <input type="text" class="form-control" value="{{ old('fname') }}"
                                                id="fname" name="fname" required>

                                            @error('fname')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="sname" class="form-label"><strong>2. Surname (of
                                                    investor)</strong></label>

                                            <input type="text" class="form-control" value="{{ old('sname') }}"
                                                id="sname" name="sname" required>

                                            @error('sname')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="investment_made_name" class="form-label"><strong>3. Name in
                                                    which investment was made (if not investors own
                                                    name)</strong></label>

                                            <input type="text" class="form-control"
                                                value="{{ old('investment_made_name') }}" id="investment_made_name"
                                                name="investment_made_name">

                                            @error('investment_made_name')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="email" class="form-label"><strong>4. Email
                                                    Address</strong></label>

                                            <input type="email" class="form-control" value="{{ old('email') }}"
                                                id="email" name="email" required>

                                            @error('email')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="phone" class="form-label"><strong>5. Home Telephone
                                                    Number</strong></label>

                                            <input type="text" class="form-control" value="{{ old('phone') }}"
                                                id="phone" name="phone" required>

                                            @error('phone')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="mobile" class="form-label"><strong>6. Mobile Telephone
                                                    Number</strong></label>

                                            <input type="text" class="form-control" value="{{ old('mobile') }}"
                                                id="mobile" name="mobile" required>

                                            @error('mobile')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="fname" class="form-label"><strong>7. Preferred Contact
                                                    Method</strong></label><br>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="contact_method"
                                                    id="contact_method1" value="Phone">

                                                <label class="form-check-label" for="contact_method1">Phone</label>

                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="contact_method"
                                                    id="contact_method2" value="Email">

                                                <label class="form-check-label" for="contact_method2">Email</label>

                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="contact_method"
                                                    id="contact_method3" value="Skype">

                                                <label class="form-check-label" for="contact_method3">Skype</label>

                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="contact_method"
                                                    id="contact_method4" value="WhatsApp">

                                                <label class="form-check-label" for="contact_method4">WhatsApp</label>

                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="contact_method"
                                                    id="contact_method5" value="Others">

                                                <label class="form-check-label" for="contact_method5">Others</label>

                                            </div>

                                            @error('contact_method')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="dob" class="form-label"><strong>8. Date of
                                                    Birth</strong></label>

                                            <input type="text" class="form-control" value="{{ old('dob') }}"
                                                id="datepicker" name="dob" placeholder="DD-MM-YYYY" required>

                                            @error('dob')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="mb-3">

                                            <label for="occupation" class="form-label"><strong>9.
                                                    Occupation</strong></label>

                                            <input type="text" class="form-control"
                                                value="{{ old('occupation') }}" id="occupation" name="occupation"
                                                required>

                                            @error('occupation')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12">

                                        <div class="mb-3">

                                            <label for="submission_details" class="form-label"><strong>10. If you are
                                                    not the investor named above, please give details of your
                                                    relationship to them and why you are making this submission on their
                                                    behalf ?</strong><span class="text-sm fst-italic fs-6">
                                                    (Optional)</span></label>

                                            <textarea class="form-control" id="submission_details" name="submission_details">{{ old('submission_details') }}</textarea>

                                            @error('submission_details')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingTwo">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#investmentDetails" aria-expanded="false"
                            aria-controls="investmentDetails">

                            Investment Details

                        </button>

                    </h2>

                    <div id="investmentDetails" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="company_name" class="form-label"><strong>11. Name of company/
                                                companies invested in</strong></label>

                                        <input type="text" class="form-control" value="{{ old('company_name') }}"
                                            id="company_name" name="company_name" required>

                                        @error('company_name')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="invest_company" class="form-label"><strong>12. How did you hear
                                                about the investment company /companies?</strong></label>

                                        <input type="text" class="form-control"
                                            value="{{ old('invest_company') }}" id="invest_company"
                                            name="invest_company" required>

                                        @error('invest_company')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="scheme" class="form-label"><strong>13. What were you told about
                                                the scheme and by whom?</strong></label>

                                        <input type="text" class="form-control" value="{{ old('scheme') }}"
                                            id="scheme" name="scheme" required>

                                        @error('scheme')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="total_invest" class="form-label"><strong>14. Indicate below the
                                                total amount invested?</strong></label>

                                        <input type="text" class="form-control" value="{{ old('total_invest') }}"
                                            id="total_invest" name="total_invest" required>

                                        @error('total_invest')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="invest_date" class="form-label"><strong>15. Date/Dates in which
                                                the investment/investments were made</strong><span
                                                class="text-sm fst-italic fs-6">
                                                (Optional)</span></label>

                                        <input type="text" class="form-control" value="{{ old('invest_date') }}"
                                            id="invest_date" name="invest_date">

                                        @error('invest_date')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="account_id" class="form-label"><strong>16. Account Id / Account
                                                Id's</strong><span class="text-sm fst-italic fs-6">
                                                (Optional)</span></label>

                                        <input type="text" class="form-control" value="{{ old('account_id') }}"
                                            id="account_id" name="account_id">

                                        @error('account_id')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="invest_date" class="form-label"><strong>17. How did you make your
                                                investment/ investments</strong></label>

                                        <select name="invest_method" class="form-select" id="invest_method" required>

                                            <option value="">Select Investments</option>

                                            <option id="bank_transfer" value="Bank Transfer">Bank Transfer</option>

                                            <option value="Cryptocurrency">Cryptocurrency</option>

                                            <option value="Digital Transfer">Digital Transfer</option>

                                            <option value="Others">Others</option>

                                        </select>

                                        @error('invest_method')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row" id="bank_transfer_yes">

                                <div class="col-sm-12">

                                    <div class="mb-3">

                                        <label for="hear_invest_company" class="form-label"><strong>18.if your carried
                                                out your investment /investment through a bank transfer indicate below
                                                the respective company and recipient account detail ( big content box
                                                )</strong></label>

                                        <input type="text" class="form-control"
                                            value="{{ old('hear_invest_company') }}" id="hear_invest_company"
                                            name="hear_invest_company" required>

                                        @error('hear_invest_company')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="mb-3">

                                        <label for="fname" class="form-label"><strong>19. Do you have a copy of
                                                your payment instructions (and any receipts)</strong></label><br>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio"
                                                name="payment_instructions" id="payment_instructions1" value="YES"
                                                required>

                                            <label class="form-check-label" for="payment_instructions1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio"
                                                name="payment_instructions" id="payment_instructions2" value="NO"
                                                required>

                                            <label class="form-check-label" for="payment_instructions2">NO</label>

                                        </div>

                                        @error('payment_instructions')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#promoterDetails" aria-expanded="false" aria-controls="promoterDetails">

                            Agent / Promoter Details

                        </button>

                    </h2>

                    <div id="promoterDetails" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="col-sm-6">

                                <div class="mb-3">

                                    <label for="fname" class="form-label"><strong>20. Did you have assistance in
                                            form of account managers over the course of your
                                            investment</strong></label><br>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="assistance"
                                            id="assistance1" value="YES" required>

                                        <label class="form-check-label" for="assistance1">YES</label>

                                    </div>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="assistance"
                                            id="assistance2" value="NO" required>

                                        <label class="form-check-label" for="assistance2">NO</label>

                                    </div>

                                    @error('assistance')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row" id="assistance_yes">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="represented" class="form-label"><strong>21. What was their name,
                                                and the company they represented?</strong></label>

                                        <input type="text" class="form-control" value="{{ old('represented') }}"
                                            id="represented" name="represented" required>

                                        @error('represented')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>



                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="their_contact" class="form-label"><strong>22. What is their
                                                contact phone numbers, email address, office and postal
                                                address?</strong></label>

                                        <input type="text" class="form-control"
                                            value="{{ old('their_contact') }}" id="their_contact"
                                            name="their_contact" required>

                                        @error('their_contact')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>





                        </div>

                    </div>

                </div>

                <div class="accordion-item" id="returns_div">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#returns" aria-expanded="false" aria-controls="returns">

                            Returns

                        </button>

                    </h2>

                    <div id="returns" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="fname" class="form-label"><strong>23. Have you received any
                                                returns on your investment?</strong></label><br>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="received_returns"
                                                id="received_returns1" value="YES" required>

                                            <label class="form-check-label" for="received_returns1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="received_returns"
                                                id="received_returns2" value="NO" required>

                                            <label class="form-check-label" for="received_returns2">NO</label>

                                        </div>

                                        @error('received_returns')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row" id="returns_yes">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>24. how much have you
                                                received and by what company?</strong></label>

                                        <input type="text" class="form-control" value="{{ old('what_company') }}"
                                            id="what_company" name="what_company">

                                        @error('what_company')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="how_receive_payment" class="form-label"><strong>25. How did you
                                                receive this payment?</strong></label>

                                        <select name="how_receive_payment" class="form-select"
                                            id="how_receive_payment">

                                            <option value="">Select Receive Method</option>

                                            <option value="Bank Transfer">Bank Transfer</option>

                                            <option value="Cryptocurrency">Cryptocurrency</option>

                                            <option value="Digital Transfer">Digital Transfer</option>

                                            <option value="Others">Others</option>

                                        </select>

                                        @error('how_receive_payment')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>



                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="expecting_returns" class="form-label"><strong>26. Are you
                                                expecting further returns on your investment?</strong></label>
                                        <div class="mb-3">

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio"
                                                    name="expecting_returns" id="expecting_returns1" value="YES">

                                                <label class="form-check-label" for="expecting_returns1">YES</label>

                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio"
                                                    name="expecting_returns" id="expecting_returns2" value="NO">

                                                <label class="form-check-label" for="expecting_returns2">NO</label>

                                            </div>
                                            @error('expecting_returns')
                                                <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>







                                <!-- <div class="col-sm-6">

                <div class="mb-3">

                    <label for="expecting_returns" class="form-label"><strong>27. How did you hear about the investment company /companies?</strong></label>

                    <input type="text" class="form-control" value="{{ old('invest_company_returns') }}" id="invest_company_returns" name="invest_company_returns">

                    @error('invest_company_returns')
    <div class="text-danger">* {{ $message }}</div>
@enderror

                </div>

            </div> -->

                            </div>

                            <div class="col-sm-6">

                                <div class="mb-3">

                                    <label for="fname" class="form-label"><strong>27. Has all of your original
                                            investment (principal amount invested) been returned to
                                            you?</strong></label><br>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="invest_company_returns"
                                            id="invest_company_returns1" value="YES">

                                        <label class="form-check-label" for="invest_company_returns1">YES</label>

                                    </div>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="invest_company_returns"
                                            id="invest_company_returns2" value="NO">

                                        <label class="form-check-label" for="invest_company_returns2">NO</label>

                                    </div>

                                    @error('invest_company_returns')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#investmentSource" aria-expanded="false"
                            aria-controls="investmentSource">

                            Investment Source

                        </button>

                    </h2>

                    <div id="investmentSource" class="accordion-collapse collapse show"
                        aria-labelledby="headingThree" data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="source_funds" class="form-label"><strong>28. What was the source
                                                of your investment funds?</strong></label>

                                        <select name="source_funds" class="form-select" id="source_funds" required>

                                            <option value="">Select Investment Funds</option>

                                            <option value="Savings">Savings</option>

                                            <option value="Loan">Loan</option>

                                            <option value="Insurance">Insurance</option>

                                            <option value="Others">Others</option>

                                        </select>

                                        @error('source_funds')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#updates" aria-expanded="false" aria-controls="updates">

                            Updates

                        </button>

                    </h2>

                    <div id="updates" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>29. Have you received any
                                                updates on your investment?</strong></label><br>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="updates_investment"
                                                id="updates_investment1" value="YES" required>

                                            <label class="form-check-label" for="updates_investment1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="updates_investment"
                                                id="updates_investment2" value="NO" required>

                                            <label class="form-check-label" for="updates_investment2">NO</label>

                                        </div>

                                        @error('updates_investment')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#civilAction" aria-expanded="false" aria-controls="civilAction">

                            Civil Action

                        </button>

                    </h2>

                    <div id="civilAction" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>30. Have you sought any
                                                form of legal assistance within or across your country of residence
                                                regarding the status of your investment/investments?</strong></label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_assistance"
                                                id="legal_assistance1" value="YES" required>

                                            <label class="form-check-label" for="legal_assistance1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_assistance"
                                                id="legal_assistance2" value="NO" required>

                                            <label class="form-check-label" for="legal_assistance2">NO</label>

                                        </div>

                                        @error('legal_assistance')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="how_receive_payment" class="form-label"><strong>31. Have you been
                                                involved in any legal proceedings directly or
                                                indirectly</strong></label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_proceedings"
                                                id="legal_proceedings1" value="YES" required>

                                            <label class="form-check-label" for="legal_proceedings1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_proceedings"
                                                id="legal_proceedings2" value="NO" required>

                                            <label class="form-check-label" for="legal_proceedings2">NO</label>

                                        </div>

                                        @error('legal_proceedings')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row" id="legal_proceedings_yes">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>32. Did you receive any
                                                form of financial gains resulting from any legal
                                                proceeding?</strong></label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_gains"
                                                id="legal_gains1" value="YES">

                                            <label class="form-check-label" for="legal_gains1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="legal_gains"
                                                id="legal_gains2" value="NO">

                                            <label class="form-check-label" for="legal_gains2">NO</label>

                                        </div>

                                        @error('legal_gains')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="how_receive_payment" class="form-label"><strong>33. Have you
                                                contacted or been contacted by any law enforcement within the last
                                                6months</strong></label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="law_enforcement"
                                                id="law_enforcement1" value="YES">

                                            <label class="form-check-label" for="law_enforcement1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="law_enforcement"
                                                id="law_enforcement2" value="NO">

                                            <label class="form-check-label" for="law_enforcement2">NO</label>

                                        </div>

                                        @error('law_enforcement')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#otherIssues" aria-expanded="false" aria-controls="otherIssues">

                            Other Issues

                        </button>

                    </h2>

                    <div id="otherIssues" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>34. Do you have any
                                                evidence eg, (document, conversations, or recordings) indicating your
                                                investment backing your claim ?</strong></label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="backing_claim"
                                                id="backing_claim1" value="YES" required>

                                            <label class="form-check-label" for="backing_claim1">YES</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="backing_claim"
                                                id="backing_claim2" value="NO" required>

                                            <label class="form-check-label" for="backing_claim2">NO</label>

                                        </div>

                                        @error('backing_claim')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-6" id="evidence_doc" style="display:none">

                                    <div class="mb-3">

                                        <label for="what_company" class="form-label"><strong>34.1. Submit a copy of
                                                the evidence below ( add file here )</strong></label>

                                        <input type="file" name="evidence" id="evidence">

                                        @error('evidence')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="mb-3">

                                        <label for="how_receive_payment" class="form-label"><strong>35. Leave a
                                                detailed information ,Regarding the Impact the loss of Finance had on
                                                You.</strong></label>

                                        <textarea class="form-control" id="losses_investment" name="losses_investment" required>{{ old('losses_investment') }}</textarea>

                                        @error('losses_investment')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingThree">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#signature" aria-expanded="false" aria-controls="signature">

                            Signature

                        </button>

                    </h2>

                    <div id="signature" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionForm">

                        <div class="accordion-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="mb-3">

                                        <div class="form-group">

                                            <div class="wrapper" id="signa">

                                                <canvas style="background: #fff;border: 2px solid #dcdcdc;"
                                                    id="signature-pad" name="signature-pad" class="signature-pad"
                                                    width="400" height="200"></canvas>

                                            </div>

                                            <br />

                                            <div id="clear" class="btn btn-primary btn-sm">Clear</div>



                                        </div>

                                        @error('backing_claim')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>



                            </div>



                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="pt-3">

                            <button type="submit" class="btn btn-info submit-btn">Send</button>

                            <input type="hidden" id="signature_data" name="signature" class="form-control"
                                value="">

                        </div>

                    </div>

                </div>



    </div>







    </form>

    </section>

    </div>

    <!--<footer>-->

    <!--    <div class="container p-3 text-end">-->

    <!--        <p>Powered by Serious Fraud Office</p>-->

    <!--    </div>-->

    <!--</footer>-->



    <!-- Modal -->

    <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="noticeModalLabel">Serious Fraud Office Secure Form</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <p>This form has been put in place as part of an ongoing investigation into allegations of fraud
                        concerning online trading and Investments companies. The form is to allow investors involved in
                        these investment schemes to report their individual issues by filing a claim or claims to be
                        recognized as a victim being eligible for restitution payments. Please note that this form
                        relates to all forms of online investments, stocks , crypto currencies and Forex trading) ,with
                        unregulated online investment companies.</p>



                    <p><strong>Note:</strong> We cannot accept information for other investments or complains on this
                        form.</p>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proceed</button>

                    <!-- <button type="button" class="btn btn-primary">Proceed</button> -->

                </div>

            </div>

        </div>

    </div>



    <!-- Modal -->

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="successModalLabel">Serious Fraud Office Secure Form</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <p>Congratulation your application regarding your claim has been received and currently under review
                        once approved you will be contacted by your designated victims witness attorney who will assist
                        you proceeding forward.</p>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proceed</button>

                    <!-- <button type="button" class="btn btn-primary">Proceed</button> -->

                </div>

            </div>

        </div>

    </div>

    <div id="helpnotice" style="display:none; color:black;"><a href="tel:+442037696151" style="color:black;">Click
            To Call: +442037696151</a><span>-</span></div>

    <a class="emailIcon" href="mailto:support@sfosecure.claims"><img
            src="{{ asset('assets/frontend/img/email.png') }}"></a>

    <!--<a id="callIcon"><img src="{{ asset('assets/frontend/img/call.png') }}"></a>-->

    <!--<a class="skypeIcon" href="https://join.skype.com/invite/zE4CRscEjeRK"><img src="{{ asset('assets/frontend/img/skype.png') }}"></a>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script>
        const phoneInputField = document.querySelector("#mobile");

        const phoneInput = window.intlTelInput(phoneInputField, {

            utilsScript:

                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

        });
    </script>



    <script>
        var signaturePad = new SignaturePad(document.getElementById("signature-pad"),

            {

                backgroundColor: 'rgba(255, 255, 255, 0)',

                penColor: '#222222'

            });



        var saveButton = document.querySelector('.submit-btn');

        var clearButton = document.querySelector('#clear');



        if (saveButton) {

            saveButton.addEventListener('click', function(e) {

                document.querySelector('[name=signature]').value = signaturePad.toDataURL('image/png', 100);

            });

        }

        if (clearButton) {

            clearButton.addEventListener('click', function() {

                signaturePad.clear();

            });

        }



        var form = $('#sign');



        $(saveButton).click(function() {

            $.ajax({

                url: "form-submit",

                data: form.serialize(),

                type: 'POST',

                success: function(response, ui) {

                    swal({

                        title: "Signature Saved",

                        text: "Your signature has now been stored.",

                        icon: "success",

                    });

                    window.setTimeout(function() {
                        window.location.reload()
                    }, 3000);

                },

                error: function(response) {

                    console.log('Error!');

                }

            });

        });
    </script>

    <script>
        $(function() {

            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy'
            });

        });



        $('#callIcon img').on('click', function() {

            $('#helpnotice').show();

        });

        $('#helpnotice span').on('click', function() {

            $('#helpnotice').hide();

        });





        $(document).ready(function() {

            @if (Session::has('success'))

                $("#successModal").modal('show');
            @endif

            @if (Session::has('success') == null)

                $("#noticeModal").modal('show');
            @endif



            $("input[name$='received_returns']").click(function() {

                var received_returns = $(this).val();



                if (received_returns == "YES") {

                    $("#returns_yes").show();

                    $("#what_company").prop('required', true);

                    $("#how_receive_payment").prop('required', true);

                    $("#expecting_returns").prop('required', true);

                    // $("#invest_company_returns1").prop('checked', true);

                } else {

                    $("#returns_yes").hide();

                    $("#what_company").removeAttr("required");

                    $("#how_receive_payment").removeAttr("required");

                    $("#expecting_returns").removeAttr("required");

                    // $("invest_company_returns1").removeAttr("checked");

                }

            });

            //------------------------ Number 20 -----------------------------------

            $("input[name$='assistance']").click(function() {

                var assistance = $(this).val();


                if (assistance == "YES") {

                    $("#assistance_yes").show();

                    $("#represented").prop('required', true);

                    $("#their_contact").prop('required', true);

                    $("#represented").val("");

                    $("#their_contact").val("");

                    // $("#expecting_returns").prop('required',true);

                    // $("#invest_company_returns1").prop('checked',true);

                } else {

                    // $("#assistance_yes").hide();

                    $("#represented").val("None");

                    $("#their_contact").val("None");

                    // $("#expecting_returns").removeAttr("required");

                    // $("invest_company_returns1").removeAttr("checked");

                }

            });

            //------------------------ End Number 20 -----------------------------------



            //------------------------ banktransfer -----------------------------------

            $("#invest_method").change(function() {

                var selectedOption = $(this).val();

                if (selectedOption == "Bank Transfer") {

                    $("#bank_transfer_yes").show();

                    $("#hear_invest_company").prop('required', true);


                } else {

                    $("#bank_transfer_yes").hide();

                    $("#hear_invest_company").val('None');

                    $("#hear_invest_company").removeAttr("required");

                }

            });



            //------------------------ End Bank transfer-----------------------------------





            // $("input[name$='legal_proceedings']").click(function() {

            //     var legal_proceedings = $(this).val();



            //   if(legal_proceedings == "YES"){

            //     $("#legal_proceedings_yes").show();

            //     $("#legal_gains1").prop('checked',true);

            //     $("#law_enforcement1").prop('checked',true);

            //   }else{

            //     $("#legal_proceedings_yes").hide();

            //     $("#legal_gains1").removeAttr("checked");

            //     $("#law_enforcement1").removeAttr("checked");

            //   }

            // });



            $("input[name$='backing_claim']").click(function() {

                var backing_claim = $(this).val();



                if (backing_claim == "YES") {

                    $("#evidence_doc").show();

                    $("#evidence").prop('required', true);

                } else {

                    $("#evidence_doc").hide();

                    $("#evidence").removeAttr("required");

                }

            });

        });
    </script>



    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?29287';

        var s = document.createElement('script');

        s.type = 'text/javascript';

        s.async = true;

        s.src = url;

        var options = {

            "enabled": true,

            "chatButtonSetting": {

                "backgroundColor": "#4dc247",

                "ctaText": "",

                "borderRadius": "25",

                "marginLeft": "0",

                "marginBottom": "30",

                "marginRight": "45",

                "position": "right"

            },

            "brandSetting": {

                "brandName": "SFO",

                "brandSubTitle": "Typically replies within a day",

                "brandImg": "http://127.0.0.1:8000/assets/frontend/img/SFOLogo.png",

                "welcomeText": "Hi there!\nHow can I help you?",

                "messageText": "Hello, I have a question about SFO",

                "backgroundColor": "#0a5f54",

                "ctaText": "Start Chat",

                "borderRadius": "25",

                "autoShow": false,

                "phoneNumber": "8801979009229"

            }

        };

        // s.onload = function() {

        //     CreateWhatsappChatWidget(options);

        // };

        var x = document.getElementsByTagName('script')[0];

        x.parentNode.insertBefore(s, x);
    </script>



    <!--Start of Tawk.to Script-->

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();

        (function() {

            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];

            s1.async = true;

            s1.src = 'https://embed.tawk.to/637effc6b0d6371309d0ce63/1gik1e8ea';

            s1.charset = 'UTF-8';

            s1.setAttribute('crossorigin', '*');

            s0.parentNode.insertBefore(s1, s0);

        })();
    </script>

    <!--End of Tawk.to Script-->

</body>

</html>
