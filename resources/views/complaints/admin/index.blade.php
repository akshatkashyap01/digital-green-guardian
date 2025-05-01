@extends('adminlte::page')

@section('content')
<div class="py-4">
    <div class="mb-4">
        <h1 class="complaints-heading m-0">Complaints</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="complaints-card">
                <div class="complaints-header">
                    <h3>Complaints List</h3>
                </div>
                <div class="table-responsive">
                    <table class="table complaints-table">
                        <thead>
                            <tr>
                                <b>
                                    <th>Complaint ID</th>
                                    <th>Complaint Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </b>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                            <tr>
                                <td class="complaint-id">{{ $complaint->ticket }}</td>
                                <td class="complaint-description">{{ $complaint->description }}</td>
                                <td>
                                    @if($complaint->status == 'Pending')
                                    <span class="status-pending">Pending</span>
                                    @else
                                    <span class="status-reviewed">{{ ucfirst(str_replace('_', ' ', $complaint->status)) }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($complaint->status == 'Pending')
                                    <form class="approve-complaint-form no-ajax-submit" data-id="{{ $complaint->id }}">
                                        <button type="submit" class="approve-complaint-btn">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                    </form>
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
                <div class="complaints-footer">
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
    .complaints-heading {
        font-weight: 600;
        font-size: 2.8rem;
        font-family: 'Hover Pass', sans-serif;
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
    .status-pending {
        background-color: #ffc107;
        color: #212529;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        display: inline-block;
    }

    .status-reviewed {
        color: #555;
    }

    /* Approve button */
    .approve-complaint-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .approve-complaint-btn:hover {
        background-color: #218838;
    }

    /* Reviewed text */
    .reviewed-text {
        color: #555;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* Footer styling */
    .complaints-footer {
        background-color: #f8f9fa;
        padding: 12px 15px;
        border-top: 1px solid #f0f0f0;
    }
</style>
@endsection
