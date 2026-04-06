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
        .badge { background: #D4AF37; color: black; padding: 3px 8px; border-radius: 4px; font-weight: bold; font-size: 12px; text-transform: uppercase; }
        .cta-button { background: #000; color: #D4AF37 !important; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>888REALTY <span style="color: #D4AF37;">MATCHING</span></h1>
            <p>We've received your request!</p>
        </div>
        
        <div class="content">
            <p>Hi {{ $lead->name }},</p>
            <p>Thank you for reaching out to 888Realty. We have received your request to get matched with a top real estate agent in Vancouver. Our team is currently reviewing your details and we will match you with a specialist who perfectly fits your needs within 24 hours.</p>

            <div class="lead-info">
                <h3>Your Request Summary</h3>
                <div class="info-row">
                    <span class="info-label">Action:</span>
                    <span class="info-value badge">{{ ucfirst($lead->intent) }}</span>
                </div>
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

            <p>In the meantime, feel free to browse our latest blog posts or use our real estate tools to help you prepare for your next move.</p>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ url('/blog') }}" class="cta-button">Browse Insights</a>
            </div>

            <p style="margin-top: 30px;">If you have any urgent questions, feel free to reply to this email or call us at <strong>250 552 6542</strong>.</p>
            
            <p>Best Regards,<br><strong>888Realty Team</strong></p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} 888Realty. All rights reserved.<br>
            Luxury Real Estate Solutions | Vancouver, BC
        </div>
    </div>
</body>
</html>
