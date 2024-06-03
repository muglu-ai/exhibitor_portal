<?php

namespace App\Http\Controllers;

use App\Models\delegate_personal_info;
use App\Models\exhibitor_reg_details;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{

    public function sendInvitation(Request $request)
    {
        $request->validate([
            'invite_email' => 'required|email',
        ]);

        $exhibitorId = $request->input('exhibitor_id');
        $inviteEmail = $request->input('invite_email');

        // Check if an invitation with the same email already exists
        $existingInvitation = Invitation::where('exhibitor_id', $exhibitorId)
            ->where('email', $inviteEmail)
            ->first();

        $org_detail = exhibitor_reg_details::where('exhibitor_id', $exhibitorId)->first();
        $org_name = $org_detail->org_name;

        if ($existingInvitation) {
            // An invitation with the same email and exhibitor already exists
            return redirect()->back()->with('error', 'An invitation has already been sent to this email address for this exhibitor.');
        }

        // Generate a unique token for the invitation
        $token = Str::random(60);

        // Save the invitation to the database
        $invitation = new Invitation();
        $invitation->exhibitor_id = $exhibitorId;
        $invitation->email = $inviteEmail;
        $invitation->token = $token;
        $invitation->save();

        // Generate the invitation link
        $inviteLink = route('delegate_form', ['token' => $token]);

        // Copy the link to the clipboard using JavaScript
        $copyToClipboardScript = "
        const el = document.createElement('textarea');
        el.value = '{$inviteLink}';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        alert('Invitation link copied to clipboard: {$inviteLink}');
    ";

        // Execute the JavaScript code in the response
        return response($copyToClipboardScript)
            ->header('Content-Type', 'text/javascript');
    }

    public function showDelegateForm($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        $exhibitorId = $invitation->exhibitor_id;
        $org_detail = exhibitor_reg_details::where('exhibitor_id', $exhibitorId)->first();
        $org_name = $org_detail->org_name;
        return view('portal.pages.delegate_invitation_form', ['invitation' => $invitation, 'org_name'=>$org_name]);
    }


    public function submitDelegateForm(Request $request, $token)
    {
        // Retrieve invitation
        $invitation = Invitation::where('token', $token)->firstOrFail();
        // Extract exhibitor_id from the invitation
        $exhibitor_id = $invitation->exhibitor_id;
        $reg_table = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $tin_no = $reg_table->tin_no;

        // Validate request data
        $validatedData = $request->validate([
            'del_title' => 'required|string|max:30',
            'del_fname' => 'required|string|max:250',
            'del_lname' => 'required|string|max:250',
            'del_designation' => 'required|string|max:250',
            'del_contact' => 'required|string|max:15',
            'del_govtid_type' => 'nullable|string|max:250',
            'del_govtid_no' => 'nullable|string|max:250',
        ]);
        // Log::info($validatedData);
        // Save delegate information
        $delegate = new delegate_personal_info();
        $delegate->exhibitor_id = $exhibitor_id; // Assign exhibitor_id from invitation
        $delegate->tin_no = $tin_no; // Assign tin_no from invitation
        $delegate->del_email = $invitation->email;
        $delegate->del_type = 'Exhibitor Delegate';
        $delegate->fill($validatedData); // Fill delegate model with validated data
        $delegate->save();

        // Optionally, mark the invitation as used
        $invitation->delete();
        // Return response
        return response()->json(['exhibitor_id' => $exhibitor_id], 200);
    }

    public function resendInvitation(Request $request, $email)
    {
        try {
            // Find the invitation by email
            $invitation = Invitation::where('email', $email)->firstOrFail();

            // Generate the invitation link
            $inviteLink = route('delegate_form', ['token' => $invitation->token]);

            // Copy the link to the clipboard using JavaScript
            $copyToClipboardScript = "
            const el = document.createElement('textarea');
            el.value = '{$inviteLink}';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert('Invitation link copied to clipboard: {$inviteLink}');
        ";

            // Execute the JavaScript code in the response
            return response($copyToClipboardScript)
                ->header('Content-Type', 'text/javascript');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error occurred while resending invitation: ' . $e->getMessage());

            // Handle missing invitation
            return redirect()->back()->with('error', 'Invitation not found or expired.');
        }
    }


    public function cancelInvitation(Request $request, $email)
    {
        try {
            // Find the invitation by email
            $invitation = Invitation::where('email', $email)->firstOrFail();

            // Delete the invitation
            $invitation->delete();

            return redirect()->back()->with('success', 'Invitation canceled successfully.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error occurred while canceling invitation: ' . $e->getMessage());

            // Handle missing invitation
            return redirect()->back()->with('error', 'Invitation not found or an error occurred while canceling.');
        }
    }
}
