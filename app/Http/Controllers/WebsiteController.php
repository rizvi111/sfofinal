<?php

namespace App\Http\Controllers;

use App\Mail\SubmittedForm;
use Illuminate\Http\Request;
use App\Models\InvestorDetails;
use App\Notifications\FormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class WebsiteController extends Controller
{
	public function index()
	{

		return view('web');
	}

	public function form_submit(Request $request)
	{
		$ip_address = $request->ip();

		$this->validate($request, [
			'fname' => 'required|max:255',
			'sname' => 'required|max:255',
			'investment_made_name' => 'nullable|max:255',
			'email' => 'required|max:255',
			'phone' => 'required|max:255',
			'mobile' => 'required|max:255',
			'contact_method' => 'required|max:255',
			'dob' => 'required',
			'occupation' => 'required|max:255',
			'submission_details' => 'nullable',
			'company_name' => 'required|max:255',
			'invest_company' => 'required|max:255',
			'scheme' => 'required|max:255',
			'total_invest' => 'required|max:255',
			'invest_date' => 'nullable|max:255',
			'account_id' => 'nullable|max:255',
			'invest_method' => 'required|max:255',
			'hear_invest_company' => 'required|max:255',
			'payment_instructions' => 'required|max:255',
			'assistance' => 'required|max:255',
			'represented' => 'sometimes|required|max:255',
			'their_contact' => 'sometimes|required|max:255',
			'received_returns' => 'required|max:255',
			'what_company' => 'nullable|max:255',
			'how_receive_payment' => 'nullable|max:255',
			'expecting_returns' => 'nullable|max:255',
			'invest_company_returns' => 'nullable|max:255',
			'source_funds' => 'required|max:255',
			'updates_investment' => 'required|max:255',
			'legal_assistance' => 'required|max:255',
			'legal_proceedings' => 'required|max:255',
			'legal_gains' => 'nullable|max:255',
			'law_enforcement' => 'nullable|max:255',
			'backing_claim' => 'required|max:255',
			'evidence' => 'nullable|max:2048',
			'losses_investment' => 'required',
			'signature' => 'required',
		]);

		$evidence_file = $request->file('evidence');
		if ($evidence_file != null) {
			$imagename = pathinfo($evidence_file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $evidence_file->getClientOriginalExtension();
			$evidence_file->move(public_path('/uploads/evidence'), $imagename);
		} else {
			$imagename = "";
		}

		$data_uri = $request->signaturePad;
		$encoded_image = explode(",", $data_uri)[0];
		$decoded_image = base64_decode($encoded_image);

		file_put_contents("signature.png", $decoded_image);

		$invest_date = $request->invest_date;
		$account_id = $request->account_id;
		if ($request->invest_date == null) {
			$invest_date = 'None';
		}
		if ($request->account_id == null) {
			$account_id = 'None';
		}

		$invest = InvestorDetails::create(array(
			"fname" => $request->fname,
			'sname' => $request->sname,
			"investment_made_name" => $request->investment_made_name,
			"email" => $request->email,
			"phone" => $request->phone,
			"mobile" => $request->mobile,
			"contact_method" => $request->contact_method,
			"dob" => $request->dob,
			"occupation" => $request->occupation,
			"submission_details" => $request->submission_details,
			"company_name" => $request->company_name,
			"invest_company" => $request->invest_company,
			"scheme" => $request->scheme,
			"total_invest" => $request->total_invest,
			"invest_date" => $invest_date,
			"account_id" => $account_id,
			"invest_method" => $request->invest_method,
			"hear_invest_company" => $request->hear_invest_company,
			"payment_instructions" => $request->payment_instructions,
			"assistance" => $request->assistance,
			'represented' => $request->represented,
			"their_contact" => $request->their_contact,
			"received_returns" => $request->received_returns,
			"what_company" => $request->what_company,
			"how_receive_payment" => $request->how_receive_payment,
			"expecting_returns" => $request->expecting_returns,
			"invest_company_returns" => $request->invest_company_returns,
			"source_funds" => $request->source_funds,
			"updates_investment" => $request->updates_investment,
			"legal_assistance" => $request->legal_assistance,
			"legal_proceedings" => $request->legal_proceedings,
			"legal_gains" => $request->legal_gains,
			"law_enforcement" => $request->law_enforcement,
			"backing_claim" => $request->backing_claim,
			"evidence" => $imagename,
			"losses_investment" => $request->losses_investment,
			"ip_address" => $ip_address,
			"signature" => $request->signature,
		));
		Notification::route('mail', $request->email)->notify(new FormSubmitted($invest));
		// Mail::to($request->email)->send(new SubmittedForm($invest));
		return redirect()->back()->with('success', 'Your Details Send successfully');
	}
}
