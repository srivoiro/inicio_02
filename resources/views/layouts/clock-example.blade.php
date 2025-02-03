@extends('layouts.app')

@section('title', 'Reloj')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Clock Example</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Reloj</h2>
            <p class="section-lead">
                Ejemplo de uso del Reloj
            </p>
            <div id="clock" class="text-center" style="font-size: 48px;"></div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endpush