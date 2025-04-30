@extends('adminlte::page')
@section('content')

<div class="py-4">

    <div class="mb-4 row align-items-center">
        <div class="col-md-6">
            <h4 class="mb-0 mainCategory-heading" style="font-weight:600; font-size: 2.8rem !important;font-family: 'Hover Pass';">Dashboard</h4>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="card p-4" style="color:aliceblue;background-color:#1f4959;border-radius: 1rem; font-family: 'Times New Roman', Times, serif; font-weight:200; font-size: 2.0rem !important;">
            <p>
                Digital Green Guardian is an interactive web platform designed to engage employees in sustainable and eco-friendly activities within their organization. The platform encourages participation through a point-based reward system that tracks individual and team contributions to green initiatives.
            </p>
            <p>
                Employees earn <strong>rewardPoints</strong> for completing various verified activities. These points are credited to their personal profiles, where they can track their progress, compare with peers, and view leaderboards. Accumulated points can be <strong>redeemed for rewards</strong>, such as money, vouchers, extra time off, company merchandise, or donations to environmental organizations.
            </p>
            
            <div class="text-center mt-4">
                <img class="auth-logo-image" src="{{ asset('logos/green.png') }}" alt="Logo" >
            </div>

        </div>
    </div>

</div>

@endsection
