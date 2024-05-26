@extends('layout.master')

@section('title','Dashboard')

@section('content')

<!-- Dashboard -->
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-header">
                <h4>Dashboard</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Total Campaign Mails
                            </div>
                            <div class="card-body text-center">
                                <div class="circle bg-primary">
                                    <h2 class="m-2 text-white">{{ $data['totalCampaignMails'] }}</h2>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <h6><b>Total mails campaigned till date</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Scheduled Campaign Mail
                            </div>
                            <div class="card-body text-center">
                                <div class="circle bg-primary">
                                    <h2 class="m-2 text-white">{{ $data['totalScheduledMails'] }}</h2>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <h6><b>Total mails scheduled till date</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                Sent Campaign Mail
                            </div>
                            <div class="card-body text-center">
                                <div class="circle bg-primary">
                                    <h2 class="m-2 text-white">{{ $data['totalSentMails'] }}</h2>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <h6><b>Total mails sent till date</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                Opened Campaign Mail
                            </div>
                            <div class="card-body text-center">
                                <div class="circle bg-primary">
                                    <h2 class="m-2 text-white">{{ $data['totalOpenedMails'] }}</h2>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <h6><b>Total mails opened till date</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                Failed Campaign Mail
                            </div>
                            <div class="card-body text-center">
                                <div class="circle bg-primary">
                                    <h2 class="m-2 text-white">{{ $data['totalFailedMails'] }}</h2>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <h6><b>Total mails failed to deliver till date</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Campaign Statistics View</h4>
                            </div>
                            <div class="card-body text-center">
                            <div id="myChart" style="width:100%; max-width:900px; height:500px;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
$totalSentMailsPercentage = ($data['totalCampaignMails'] != 0) ? (($data['totalSentMails'] / $data['totalCampaignMails']) * 100) : 0;
    $totalOpenedMailsPercentage = ($data['totalCampaignMails'] != 0) ? (($data['totalOpenedMails'] / $data['totalCampaignMails']) * 100) : 0;
    $totalFailedMailsPercentage = ($data['totalCampaignMails'] != 0) ? (($data['totalFailedMails'] / $data['totalCampaignMails']) * 100) : 0;
    $totalScheduledMailsPercentage = ($data['totalCampaignMails'] != 0) ? (($data['totalScheduledMails'] / $data['totalCampaignMails']) * 100) : 0;
@endphp

@endsection

@section('script')
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
        ['Contry', 'Mhl'],
        ['Total Scheduled Mails', {{ $totalScheduledMailsPercentage }}],
        ['Total Sent Mails', {{ $totalSentMailsPercentage }}],
        ['Total Opened Mails', {{ $totalOpenedMailsPercentage }}],
        ['Total Failed Mails', {{ $totalFailedMailsPercentage }}],
    ]);

    const options = {
        title:'Mail Campaign Statistics View',
        is3D:true
    };

    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
@endsection
