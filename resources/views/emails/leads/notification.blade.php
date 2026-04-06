<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-top: 5px solid #D4AF37; border-radius: 8px; }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid #eee; }
        .header h1 { color: #000; margin: 0; font-size: 24px; }
        .content { padding: 20px 0; }
        .lead-info { background: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .lead-info h3 { margin-top: 0; border-bottom: 2px solid #D4AF37; display: inline-block; padding-bottom: 5px; }
        .info-row { margin-bottom: 10px; }
        .info-label { font-weight: bold; width: 120px; display: inline-block; color: #666; }
        .info-value { color: #000; }
        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px; }
        .badge { background: #D4AF37; color: black; padding: 3px 8px; rounded-radius: 4px; font-weight: bold; font-size: 12px; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>888REALTY <span style="color: #D4AF37;">LEAD</span></h1>
            <p>New "Get Matched" Form Submission</p>
        </div>
        
        <div class="content">
            <div class="lead-info">
                <h3>Contact Information</h3>
                <div class="info-row">
                    <span class="info-label">Name:</span>
                    <span class="info-value">{{ $lead->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $lead->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone:</span>
                    <span class="info-value">{{ $lead->phone }}</span>
                </div>
            </div>

            <div class="lead-info">
                <h3>Project Details <span class="badge">{{ $lead->intent }}</span></h3>
                <div class="info-row">
                    <span class="info-label">City:</span>
                    <span class="info-value">{{ $lead->city ?? 'Not specified' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Budget:</span>
                    <span class="info-value">{{ $lead->budget ?? 'Not specified' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Timeline:</span>
                    <span class="info-value">{{ $lead->timeline ?? 'Not specified' }}</span>
                </div>
            </div>

            @if($lead->message)
            <div class="lead-info">
                <h3>Additional Message</h3>
                <p style="white-space: pre-wrap; font-style: italic;">"{{ $lead->message }}"</p>
            </div>
            @endif

            <p>Please log in to the admin dashboard to assign this lead to an agent.</p>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('admin.dashboard') }}" style="background: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">View in Dashboard</a>
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} 888Realty. All rights reserved.<br>
            Automated lead notification system.
        </div>
    </div>
</body>
</html>
