@extends('adminlte::page')

@section('content')
<div class="py-4">
    <div class="mb-4 row align-items-center">
        <div class="col-md-6">
            <h1 class="complaints-heading m-0">Complaints</h1>
        </div>
        <div class="col-md-6 text-md-end">
            <button type="button" class="raise-complaint-btn" data-bs-toggle="modal" data-bs-target="#addComplaintModal">
                Raise Complaint
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="complaints-card">
                <div class="complaints-header">
                    <h3>My Complaints</h3>
                </div>
                <div class="table-responsive">
                    <table class="table complaints-table">
                        <thead>
                            <tr>
                            <b>
                                <th>Complaint ID</th>
                                <th>Complaint Description</th>
                                <th>Status</th>
                            </b>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                            <tr>
                                <td class="complaint-id">{{ $complaint->ticket }}</td>
                                <td class="complaint-description">{{ $complaint->description }}</td>
                                <td>
                                    <span class="status-badge status-{{ $complaint->status }}">
                                        {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="complaints-footer">
                    <div class="float-right">
                        {{ $complaints->links('vendor.pagination.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('complaints.add')
@include('components.success-modal')
@endsection

@section('css')
<style>
    /* Main heading */
    .complaints-heading {
        font-weight: 600;
        font-size: 2.8rem;
        font-family: 'Hover Pass', sans-serif;
    }

    /* Raise Complaint Button */
    .raise-complaint-btn {
        background-color: #011425;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .raise-complaint-btn:hover {
        background-color: #01253f;
    }

    /* Card styling */
    .complaints-card {
        color: #fff;
        background-color: #fff;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    /* Header styling */
    .complaints-header {
        background-color: #1c4e63;
        color: white;
        padding: 15px;
        font-weight: 500;
    }

    .complaints-header h3 {
        margin: 0;
        font-size: 16px;
    }

    /* Table styling */
    .complaints-table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
    }

    .complaints-table thead tr {
        background-color: #1c4e63;
        color: white;
    }

    .complaints-table th {
        padding: 12px 15px;
        font-size: 14px;
        font-weight: 500;
        border-bottom: 1px solid #dee2e6;
        text-align: left;
    }

    .complaints-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
    }

    .complaints-table tbody tr:last-child {
        border-bottom: none;
    }

    .complaints-table td {
        padding: 12px 15px;
        font-size: 14px;
        color: #333;
    }

    /* ID column */
    .complaint-id {
        white-space: nowrap;
        font-weight: 500;
        color: #333;
    }

    /* Description column */
    .complaint-description {
        word-wrap: break-word;
        white-space: normal;
        max-width: 400px;
    }

    /* Status badges */
    .status-badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        display: inline-block;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-in_progress {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-resolved {
        background-color: #d4edda;
        color: #155724;
    }

    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* Footer styling */
    .complaints-footer {
        background-color: #f8f9fa;
        padding: 12px 15px;
        border-top: 1px solid #f0f0f0;
    }
</style>
@endsection
