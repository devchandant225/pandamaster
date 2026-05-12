<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'intent' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        $intentMap = [
            'buying' => 'buy',
            'selling' => 'sell'
        ];
        
        $intent = $intentMap[$validated['intent']] ?? $validated['intent'];

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'intent' => $intent,
            'city' => $validated['city'],
            'budget' => $validated['budget'],
            'timeline' => $validated['timeline'],
            'message' => $validated['message'] ?? 'General Inquiry from Homepage/Contact',
        ]);

        // Send Professional Email to Admin
        try {
            $adminEmail = 'info@pandamastervip.com';
            
            Mail::send('emails.leads.notification', ['lead' => $lead], function ($message) use ($lead, $adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Lead: ' . $lead->name . ' - ' . ucfirst($lead->intent))
                    ->from('noreply@pandamastervip.com', '888Realty Lead System');
            });

            // Send Confirmation Email to Visitor
            Mail::send('emails.leads.confirmation', ['lead' => $lead], function ($message) use ($lead) {
                $message->to($lead->email)
                    ->subject('Request Received: We\'re matching you with an agent!')
                    ->from('info@pandamastervip.com', '888Realty Team');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send lead email: ' . $e->getMessage());
        }

        return redirect()->route('contact.thanks')->with('lead_name', $lead->name);
    }

    public function thanks()
    {
        return view('thanks');
    }
}
