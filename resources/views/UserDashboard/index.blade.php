@extends('UserDashboard.Layout.userBaseView')

@section('title', 'Booking KPI')

@section('style')
<style>
    .icon {  
        float: right;
        font-size: 500%;
        position: absolute;
        top: 0rem;
        right: -0.3rem;
        opacity: 0.16;
    }

    #user-container,
    #web-container,
    #booking-container {
        width: 1200px;
        display: flex;
    }

    .grey-dark {
        background: #495057;
        color: #efefef;
    }

    .red {
        background: #a83b3b;
        color: #fff;
    }

    .purple {
        background: #886ab5;
        color: #fff;
    }

    .orange {
        background: #ffc241;
        color: #fff;
    }

    .kpi-card {
        overflow: hidden;
        position: relative;
        box-shadow: 1px 1px 3px rgba(0,0,0,0.75);
        display: inline-block;
        float: left;
        padding: 1em;
        border-radius: 0.3em;
        font-family: sans-serif;  
        width: 240px;
        min-width: 180px;
        margin-left: 0.5em;
        margin-top: 0.5em;
    }

    .card-value {
        display: block;
        font-size: 200%;  
        font-weight: bolder;
    }

    .card-text {
        display: block;
        font-size: 70%;
        padding-left: 0.2em;
    }
</style>
@endsection

@section('dashContent')
<div class="container mt-2">
    <h6>Booking KPI</h6><hr>
    <div id="web-container">
        <div class="kpi-card purple">
            <span class="card-value">{{ $data['totalBookings'] }}</span>
            <span class="card-text">Total Bookings</span>
            <i class="bi bi-journal-plus icon"></i>
        </div>
        <div class="kpi-card grey-dark">
            <span class="card-value">{{ $data['completedBookings'] }}</span>
            <span class="card-text">Completed Bookings</span>
            <i class="bi bi-journal-check icon"></i>
        </div>
    </div>
</div>
@endsection
