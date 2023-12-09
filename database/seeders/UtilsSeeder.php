<?php

namespace Database\Seeders;

use App\Models\Utils;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utils::insert([
            [
                'privacy' => 'Welcome to our "Privacy Policy" page! We are excited to have you here as you delve into the comprehensive framework that shapes our commitment to safeguarding your privacy. Your presence on this page underscores your dedication to informed and transparent engagement with our policies.

                At CERRS, we prioritize establishing a secure and respectful environment for all users. Our Privacy Policies outline the rights and responsibilities for both parties – you, our valued user, and us, the dedicated provider of exceptional services and products. This is a space where your trust is paramount, as we demystify how your personal data is gathered, employed, and unveiled. These practices echo the principles set forth by the legal constructs of Bangladesh, ensuring harmony between your rights and our responsibilities. This page aims not only to elucidate the legal dimensions but also to deepen your comprehension of the principles governing our partnership.
                
                The usage of this website hinges upon the policies delineated below. We urge you to carefully review them, and by accessing our site, you signify your acceptance of these policies. However, if you find yourself in disagreement with our policies, we kindly request that you refrain from using the website. If you have any questions or require further clarification, feel free to reach out to our support team at support@cerrsltd.com. Your feedback fuels our growth.
                
                 Policies at a glance
                1. Privacy Policies
                1.1. Confidentiality
                1.2. Not Selling/Sharing Information to/with Third Parties
                1.3. Disclosure for Sharing Information to Concerned Authorities
                1.4. Information Security/How We Protect Personal Information
                1.5. Cookie and Tracking Policies
                1.6. Information Types and Their Collection Policies
                1.6.1. Information Collected Directly from You
                1.6.2. Information Collected Automatically
                1.6.3. Information We May Collect through Interactive Applications
                1.7. Usage and Processing of Collected Information
                1.8. Information Management Policies
                1.8.1. Accessing/Updating Personal Information
                1.8.2. Retention and Deletion of Personal Information
                2. Promotional Policies
                2.1. Emails
                2.2. Newsletters
                2.3. Text Messages and Push Notifications
                3. Social Media Interaction Policy
                4. Visitors from outside Bangladesh
                5. Changes to Our Policies
                5.1. Right to Modify Policies
                5.2. Effective Date of Modifications
                5.3. Acceptance of Modified Policies
                5.4. Regular Review
                6. Disclaimer
                 Details of Our Policies
                 Click on a specific section below to expand or collapse its subsections.
                
                1. Privacy Policies
                2. Promotional Policies
                3. Social Media Interaction Policy
                4. Visitors from outside Bangladesh
                5. Changes to Our Policies
                6. Disclaimer
                
                 Thank you for choosing CERRS and reviewing our policies.
                
                Your trust drives our commitment to excellence. We look forward to a fruitful and respectful partnership ahead. If you have any inquiries, comments, or concerns about the above policies, we encourage you to look through our FAQs page and Help page to see whether we have previously addressed them. If not, kindly use our online Contact Form to contact us.
                
                We anticipate hearing from you!',

                'terms' => 'Welcome to our "Terms & Conditions" page! We are delighted to have you here as you embark on a journey through the legal framework that governs the use of our services and products. Your presence on this page signifies your commitment to responsible and transparent engagement with our offerings.
                            At CERRS, we believe in creating a secure and respectful environment for all users. Our Terms and Conditions (Ts&Cs) outline rights and responsibilities for both parties – you, our valued user, and us, dedicated providers of exceptional services and products',
                'refund_policy' => 'salamatinnovation',
                'warranty_policy' => 'salamatinnovation',
                'others' => 'alamatinnovation.com',
                'status' => '1',
            ],
        ]);
    }
}
