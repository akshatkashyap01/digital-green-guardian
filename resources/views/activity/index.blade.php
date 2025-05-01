@extends('adminlte::page')

@section('content')
<div class="py-4">

    <div class="mb-4 row align-items-center">
        <div class="col-md-6">
            <h4 class="mb-0 mainCategory-heading" style="font-weight:600; font-size: 2.8rem !important;font-family: 'Hover Pass';">Activity Upload</h4>
        </div>
        <div class="text-md-end col-md-6">
            <button type="button" style="background-color:#011425;" class="btn btn-primary addActivitybtn" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                Add Activity
            </button>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="card p-4" style="color:aliceblue;background-color:#1f4959;border-radius: 1rem; font-family: 'Times New Roman', Times, serif; font-weight:500; font-size: 2.0rem !important;">
            <div class="reward-points-container" style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding: 10px 0;">
                <div class="left-text">Earning Reward Points</div>
                @if (!auth()->user()->hasRole('Super Admin'))
                <div class="right-text">My Reward Points : {{ $userRewardPoints }}</div>
                @endif
            </div>
            <p style="color:aliceblue;background-color:#1f4959;border-radius: 1rem; font-family: 'Times New Roman', Times, serif; font-weight:200; font-size: 1.5rem !important;">To earn reward points simply click on the upload button and follow these steps and if got approved yoou can win reward points which you can redeem later in the form of gift vouchers or cash. </p>

            <ul class="list-unstyled">
                <li class="mb-4 d-flex">
                    <div>
                        <i class="fas fa-upload me-3 align-self-center" style="font-size: 1.5rem;"></i>
                        <strong class="heading">Upload Activity Pictures</strong>
                        <ul>
                            <li class="points">Share photos of your activities, like planting trees/watering trees etc.</li>
                        </ul>
                    </div>
                </li>
                <li class="mb-4 d-flex">
                    <div>
                    <i class="fas fa-tags me-3 align-self-center" style="font-size: 1.5rem;"></i>
                        <strong class="heading">Select Activity Category</strong>
                        <ul>
                            <li class="points">Categorize your activity for relevant point crediting.</li>
                        </ul>
                    </div>
                </li>
                <li class="mb-4 d-flex">
                    <div>
                    <i class="fas fa-user-check me-3 align-self-center" style="font-size: 1.5rem;"></i>
                    <strong class="heading">Management Verification</strong>
                        <ul>
                            <li class="points">Await verification from the management team.</li>
                        </ul>
                    </div>
                </li>
                <li class="mb-4 d-flex">
                    <div>
                    <i class="fas fa-gift me-3 align-self-center" style="font-size: 1.5rem;"></i>
                        <strong class="heading">View Reward Point Portal</strong>
                        <ul>
                            <li class="points">Access your points and available rewards.</li>
                        </ul>
                    </div>
                </li>
            </ul>

            <div class="row mt-4 align-items-center">
                <!-- Left side: Table -->
                <div class="col-md-8">
                    <table style="width: 100%; background-color: rgba(255, 255, 255, 0.055); border-collapse: collapse; border-radius: 15px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 20px;">Activity</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 20px; width: 120px;">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 12px; font-size: 20px;">Planting roadside trees with regular watering (highest)</td>
                                <td style="padding: 12px; font-size: 18px;">2500</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px; font-size: 18px;">Planting roadside trees (upper high)</td>
                                <td style="padding: 12px; font-size: 18px;">2000</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px; font-size: 18px;">Planting small roadside plants (lower high)</td>
                                <td style="padding: 12px; font-size: 18px;">1000</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px; font-size: 18px;">Planting trees/plants at home with regular watering (low)</td>
                                <td style="padding: 12px; font-size: 18px;">500</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px; font-size: 18px;">Watering plants regularly (medium)</td>
                                <td style="padding: 12px; font-size: 18px;">700</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px; font-size: 18px;">Caring for plants in bad condition (bonus point)</td>
                                <td style="padding: 12px; font-size: 18px;">3000</td>
                            </tr>
                        </tbody>
                    </table>


                </div>

                <!-- Right side: Logo -->
                <div class="col-md-4 text-end">
                    <img class="auth-logo-image" src="{{ asset('logos/green.png') }}" alt="Logo">
                </div>
            </div>



            <div class="text-center mt-4" style="width: 100%; padding: 15px 0;">
                <p style="font-size: 0.8em; margin: 0;">Note: To redeem your points please send a mail to - ayushreevyas1@gmail.com</p>
            </div>
        </div>
    </div>
</div>

@include('activity.add')
@include('components.success-modal')
@endsection
