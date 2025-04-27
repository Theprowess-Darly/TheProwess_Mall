@extends('layouts.vendor')

@section('title', 'Plans d\'abonnement')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Choisir un plan d'abonnement</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-header text-center">
                                        <h5 class="card-title">{{ $plan->name }}</h5>
                                    </div>
                                    <div class="card-body ">
                                        <h3 class="text-center mb-4">{{ number_format($plan->price, 0, ',', ' ') }} FCFA</h3>
                                        <p class="text-center">Durée: {{ $plan->duration_in_days }} jours</p>
                                        <div class="features">
                                            <ul class="list-group list-group-flush">
                                                @foreach (explode("\n", $plan->features) as $feature)
                                                    <li class="list-group-item">
                                                        <i class="fas fa-check text-success me-2"></i> {{ $feature }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <form action="{{ route('vendor.subscription.subscribe') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                            <button type="submit" class="btn btn-primary">Choisir ce plan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
