@extends('admin')

@section('content')
<div class="row">
<div class="col-md-12">
                        <div class="title table-responsive">
                            <h3 class="title-text">Name (of investor): {{$client_details->fname .' '. $client_details->sname}}</h3>
                            <table class="table table-striped f-border-none">
                                <tbody>
                                    <tr>
                                        <th>Investor Details</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$client_details->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>{{$client_details->phone}} @if($client_details->mobile), {{$client_details->mobile}}@endif</td>
                                    </tr>
                                    <tr>
                                        <td>IP Address</td>
                                        <td>{{$client_details->ip_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Name in which investment was made (if not investors own name)</td>
                                        <td>{{$client_details->investment_made_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Preferred Contact Method</td>
                                        <td>{{$client_details->contact_method}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{date('d M, Y', strtotime($client_details->dob))}}</td>
                                    </tr>
                                    <tr>
                                        <td>Occupation</td>
                                        <td>{{$client_details->occupation}}</td>
                                    </tr>
                                    <tr>
                                        <td>If you are not the investor named above, please give details of your relationship to them and why you are making this submission on their behalf ?</td>
                                        <td>{{$client_details->submission_details}}</td>
                                    </tr>
                                    <tr>
                                        <th>Investment Details</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Name of company/ companies invested in</td>
                                        <td>{{$client_details->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>How did you hear about the investment company /companies?</td>
                                        <td>{{$client_details->invest_company}}</td>
                                    </tr>
                                    <tr>
                                        <td>What were you told about the scheme and by whom?</td>
                                        <td>{{$client_details->scheme}}</td>
                                    </tr>
                                    <tr>
                                        <td>Indicate below the total amount invested?</td>
                                        <td>{{$client_details->total_invest}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date/Dates in which the investment/investments were made</td>
                                        <td>{{$client_details->invest_date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Account Id / Account Id's</td>
                                        <td>{{$client_details->account_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>How did you make your investment/ investments</td>
                                        <td>{{$client_details->invest_method}}</td>
                                    </tr>
                                    <tr>
                                        <td>How did you hear about the investment company /companies?</td>
                                        <td>{{$client_details->hear_invest_company}}</td>
                                    </tr>
                                    <tr>
                                        <td>Do you have a copy of your payment instructions (and any receipts)</td>
                                        <td>{{$client_details->payment_instructions}}</td>
                                    </tr>
                                    <tr>
                                        <th>Agent/Promoter Details</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Did you have assistance in form of account managers over the course of your investment</td>
                                        <td>{{$client_details->assistance}}</td>
                                    </tr>
                                    <tr>
                                        <td>What was their name, and the company they represented?</td>
                                        <td>{{$client_details->represented}}</td>
                                    </tr>
                                    <tr>
                                        <td>What is their contact phone numbers, email address, office and postal address? (OPTIONAL)</td>
                                        <td>{{$client_details->their_contact}}</td>
                                    </tr>
                                    <tr>
                                        <td>Have you received any returns on your investment?</td>
                                        <td>{{$client_details->received_returns}}</td>
                                    </tr>
                                    @if($client_details->received_returns == 'YES')
                                    <tr>
                                        <th>Returns</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>how much have you received and by what company?</td>
                                        <td>{{$client_details->what_company}}</td>
                                    </tr>
                                    <tr>
                                        <td>How did you receive this payment?</td>
                                        <td>{{$client_details->how_receive_payment}}</td>
                                    </tr>
                                    <tr>
                                        <td>Are you expecting further returns on your investment?</td>
                                        <td>{{$client_details->expecting_returns}}</td>
                                    </tr>
                                    <tr>
                                        <td>Has all of your original investment (principal amount invested) been returned to you?</td>
                                        <td>{{$client_details->invest_company_returns}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Investment Source</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>What was the source of your investment funds</td>
                                        <td>{{$client_details->source_funds}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updates</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Have you received any updates on your investment?</td>
                                        <td>{{$client_details->updates_investment}}</td>
                                    </tr>
                                    <tr>
                                        <th>Civil Action</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Have you sought any form of legal assistance within or across your country of residence regarding the status of your investment/investments?</td>
                                        <td>{{$client_details->legal_assistance}}</td>
                                    </tr>
                                    <tr>
                                        <td>Have you been involved in any legal proceedings directly or indirectly</td>
                                        <td>{{$client_details->legal_proceedings}}</td>
                                    </tr>
                                    @if($client_details->legal_proceedings == 'YES')
                                    <tr>
                                        <td>Did you receive any form of financial gains resulting from any legal proceeding?</td>
                                        <td>{{$client_details->legal_gains}}</td>
                                    </tr>
                                    <tr>
                                        <td>Have you contacted or been contacted by any law enforcement within the last 6months</td>
                                        <td>{{$client_details->law_enforcement}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Other Issues</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Do you have any evidence eg, (document, conversations, or recordings) indicating your investment backing your claim ?</td>
                                        <td>{{$client_details->backing_claim}}</td>
                                    </tr>
                                    @if($client_details->backing_claim == 'YES' && !empty($client_details->evidence))
                                    <tr>
                                        <td>Submit a copy of the evidence below ( Click file here )</td>
                                        <td><a href="{{asset('uploads/evidence/'.$client_details->evidence)}}" download>Download</a></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Leave a detailed information of the impact of the losses of investment had on you</td>
                                        <td>{{$client_details->losses_investment}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>
@endsection