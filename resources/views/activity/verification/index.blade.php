@extends('adminlte::page')

@section('content')
<div class="py-4">
    <div class="mb-4">
        <h1 class="activity-heading m-0">Activity Verification</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="activity-card">
                <div class="activity-header">
                    <h3>Activity Verification List</h3>
                </div>
                <div class="table-responsive">
                    <table class="table activity-table">
                        <thead>
                            <tr>
                                <b>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Image Proof</th>
                                    <th>Actions</th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                            <tr>
                                <td class="user-name">{{ $complaint->user->name }}</td>
                                <td class="category-name">{{ $complaint->category->name }}</td>
                                <td class="image-proof">
                                    <a href="{{ asset('storage/' . $complaint->photo) }}" target="_blank" class="proof-image-link">
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $complaint->photo) }}" alt="Proof Image">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    @if($complaint->status == 'Pending')
                                    <div class="action-buttons">
                                        <form class="approve-verification-form" data-id="{{ $complaint->id }}">
                                            @csrf
                                            <button type="submit" class="approve-btn">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>

                                        <form class="reject-verification-form" data-id="{{ $complaint->id }}">
                                            @csrf
                                            <button type="submit" class="reject-btn">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @else
                                    <span class="reviewed-text">
                                        <i class="fas fa-check-circle"></i> Reviewed
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="activity-footer">
                    <div class="float-right">
                        {{ $complaints->links('vendor.pagination.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.success-modal')
@endsection

@section('css')
<style>
    /* Main heading */
    .activity-heading {
        font-weight: 600;
        font-size: 2.8rem;
        font-family: 'Hover Pass', sans-serif;
    }

    /* Card styling */
    .activity-card {
        color: #fff;
        background-color: #fff;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    /* Header styling */
    .activity-header {
        background-color: #1c4e63;
        color: white;
        padding: 15px;
        font-weight: 500;
    }

    .activity-header h3 {
        margin: 0;
        font-size: 16px;
    }

    /* Table styling */
    .activity-table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
    }

    .activity-table thead tr {
        background-color: #1c4e63;
        color: white;
    }

    .activity-table th {
        padding: 12px 15px;
        font-size: 14px;
        font-weight: 500;
        border-bottom: 1px solid #dee2e6;
        text-align: left;
    }

    .activity-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
    }

    .activity-table tbody tr:last-child {
        border-bottom: none;
    }

    .activity-table td {
        padding: 12px 15px;
        font-size: 14px;
        color: #333;
        vertical-align: middle;
    }

    /* User column */
    .user-name {
        white-space: nowrap;
        font-weight: 500;
        color: #333;
    }

    /* Category column */
    .category-name {
        word-wrap: break-word;
        white-space: normal;
        max-width: 400px;
    }

    /* Image column */
    .image-proof {
        padding: 10px !important;
    }

    .proof-image-link {
        display: block;
        text-decoration: none;
    }

    .image-container {
        width: 100px;
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .image-container:hover {
        transform: scale(1.05);
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-nowrap: nowrap;
    }

    .approve-btn, .reject-btn {
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .approve-btn {
        background-color: #28a745;
        color: white;
    }

    .reject-btn {
        background-color: #dc3545;
        color: white;
    }

    .approve-btn:hover, .reject-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    /* Reviewed text */
    .reviewed-text {
        color: #555;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* Status colors */
    .status-pending {
        color: #ffc107;
    }

    .status-in_progress {
        color: #007bff;
    }

    .status-resolved {
        color: #28a745;
    }

    .status-rejected {
        color: #dc3545;
    }

    /* Footer styling */
    .activity-footer {
        background-color: #f8f9fa;
        padding: 12px 15px;
        border-top: 1px solid #f0f0f0;
    }
</style>
@endsection
