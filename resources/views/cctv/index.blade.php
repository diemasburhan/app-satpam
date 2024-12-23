@extends('layouts.app')

@section('title', 'Live CCTV Monitoring')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Pilih Kamera</h5>
                </div>
                <div class="card-body">
                    <select id="cameraSelect" class="form-control" onchange="changeStream()">
                        @foreach ($cameras as $camera)
                            <option value="{{ $camera['stream_url'] }}">{{ $camera['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Live Streaming</h5>
                </div>
                <div class="card-body text-center">
                    <video id="cctvVideo" controls autoplay muted style="width:100%; max-height: 500px;">
                        <source src="{{ $cameras[0]['stream_url'] }}" type="application/x-mpegURL">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function changeStream() {
        var video = document.getElementById('cctvVideo');
        var selectedURL = document.getElementById('cameraSelect').value;
        video.src = selectedURL;
    }
</script>
@endsection
