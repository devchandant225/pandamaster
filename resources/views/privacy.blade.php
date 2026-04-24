@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gray-950 border-b border-white/5">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-4 uppercase tracking-tighter">
                Privacy <span class="text-yellow-500">Policy</span>
            </h1>
            <p class="text-gray-400 font-bold uppercase tracking-widest">Last Updated: April 2026</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 border border-white/5 p-8 md:p-12 rounded-[3rem] shadow-2xl">
                <div class="prose prose-invert prose-yellow max-w-none text-gray-300 leading-relaxed">
                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">1. Introduction</h2>
                    <p class="mb-8">This Privacy Policy explains how orionstars.vip (“we”, “our”, “us”) collects, uses, and protects your personal information when you use our website and services. By accessing or using this website, you agree to the terms of this Privacy Policy, along with our Terms & Conditions and any other applicable policies.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">2. Information We Collect</h2>
                    <p class="mb-4">We may collect the following types of information:</p>
                    <ul class="list-disc pl-6 mb-8 space-y-2">
                        <li><strong>Personal Information:</strong> Name, Email address, Payment or billing details, Account information, and any information you provide while using the platform.</li>
                        <li><strong>Usage Information:</strong> Pages visited and time spent on the website, Device and browser information, IP address and general location data, and activity on the platform (games played, interactions, etc.).</li>
                        <li><strong>Cookies & Tracking Technologies:</strong> We use cookies, web beacons, and similar technologies to improve user experience, analyze website performance, and understand user behavior. You can control or disable cookies through your browser settings.</li>
                    </ul>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">3. How We Use Your Information</h2>
                    <p class="mb-4">We use your information to:</p>
                    <ul class="list-disc pl-6 mb-8 space-y-2">
                        <li>Provide and improve our services</li>
                        <li>Process transactions and manage accounts</li>
                        <li>Communicate with users</li>
                        <li>Ensure security and prevent fraud</li>
                        <li>Comply with legal obligations</li>
                    </ul>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">4. Data Security</h2>
                    <p class="mb-8">We take reasonable technical and organizational measures to protect your personal information, including secure data storage systems, encryption and safe transmission methods, and restricted access to sensitive data. However, no system is completely secure, and we cannot guarantee absolute security.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">5. Sharing of Information</h2>
                    <p class="mb-4">We may share your information in the following cases:</p>
                    <ul class="list-disc pl-6 mb-8 space-y-2">
                        <li>With service providers (payment processors, analytics tools)</li>
                        <li>To comply with legal requirements or law enforcement</li>
                        <li>To protect our rights, users, or platform</li>
                        <li>In case of business transfer, merger, or acquisition</li>
                    </ul>
                    <p class="mb-8 font-bold text-yellow-500 italic">We do not sell your personal information to third parties.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">6. Data Retention</h2>
                    <p class="mb-8">We retain your personal information only as long as necessary to provide services, comply with legal obligations, and resolve disputes and enforce agreements.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">7. Your Rights</h2>
                    <p class="mb-4">Depending on your location, you may have the right to:</p>
                    <ul class="list-disc pl-6 mb-8 space-y-2">
                        <li>Access your personal data</li>
                        <li>Request correction or deletion</li>
                        <li>Withdraw consent where applicable</li>
                        <li>Restrict or object to data processing</li>
                    </ul>
                    <p class="mb-8">To exercise these rights, contact us through the website.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">8. Third-Party Links</h2>
                    <p class="mb-8">Our website may contain links to third-party websites. We are not responsible for the privacy practices of those sites.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">9. Children’s Privacy</h2>
                    <p class="mb-8">This website is not intended for users under the age of 21. We do not knowingly collect personal information from minors.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">10. Changes to This Policy</h2>
                    <p class="mb-8">We may update this Privacy Policy from time to time. Continued use of the website means you accept any updates.</p>

                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter mb-6">11. Contact Us</h2>
                    <p class="mb-8">If you have any questions about this Privacy Policy, please contact us through orionstars.vip.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
