@extends('layouts.app')

@section('title', __('Privacy Policy') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('Privacy Policy') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose max-w-none">
                <h2>1. Information We Collect</h2>
                <p>We collect information you provide directly to us, such as when you:</p>
                <ul>
                    <li>Fill out our contact form</li>
                    <li>Subscribe to our newsletter</li>
                    <li>Contact us via email or phone</li>
                </ul>

                <h3>Contact Form Data</h3>
                <p>When you submit our contact form, we collect:</p>
                <ul>
                    <li>Name</li>
                    <li>Email address</li>
                    <li>Phone number (optional)</li>
                    <li>Company name (optional)</li>
                    <li>Message content</li>
                    <li>IP address and browser information (for security)</li>
                </ul>

                <h2>2. How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Respond to your inquiries and requests</li>
                    <li>Provide customer support</li>
                    <li>Send you information about our services</li>
                    <li>Comply with legal obligations</li>
                </ul>

                <h2>3. Legal Basis for Processing (GDPR)</h2>
                <p>We process your personal data based on:</p>
                <ul>
                    <li><strong>Consent:</strong> When you voluntarily provide information</li>
                    <li><strong>Legitimate Interest:</strong> For business communication and customer support</li>
                    <li><strong>Legal Obligation:</strong> When required by law</li>
                </ul>

                <h2>4. Data Retention</h2>
                <p>We retain your personal data for as long as necessary to fulfill the purposes outlined in this policy, typically:</p>
                <ul>
                    <li>Contact form submissions: 3 years</li>
                    <li>Email communications: 5 years</li>
                </ul>

                <h2>5. Your Rights (GDPR)</h2>
                <p>You have the following rights regarding your personal data:</p>
                <ul>
                    <li><strong>Access:</strong> Request a copy of your personal data</li>
                    <li><strong>Rectification:</strong> Correct inaccurate personal data</li>
                    <li><strong>Erasure:</strong> Request deletion of your personal data</li>
                    <li><strong>Portability:</strong> Receive your data in a portable format</li>
                    <li><strong>Withdraw Consent:</strong> Withdraw consent at any time</li>
                </ul>

                <h2>6. Contact Information</h2>
                <p>For any privacy-related questions or to exercise your rights, contact us:</p>
                <ul>
                    <li>Email: privacy@metalik.bg</li>
                    <li>Phone: +359 2 XXX XXXX</li>
                    <li>Address: 1309 Sofia, Bulgaria</li>
                </ul>

                <h2>7. Changes to This Policy</h2>
                <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page.</p>

                <p><strong>Last updated:</strong> {{ date('F j, Y') }}</p>
            </div>
        </div>
    </div>
@endsection
