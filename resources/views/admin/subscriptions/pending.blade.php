@extends('layouts.admin')

@section('title', 'Abonnements en attente')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Abonnements en attente d'approbation</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($pendingSubscriptions->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Marchand</th>
                                        <th>Boutique</th>
                                        <th>Plan</th>
                                        <th>Montant</th>
                                        <th>Méthode de paiement</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingSubscriptions as $subscription)
                                        <tr>
                                            <td>{{ $subscription->id }}</td>
                                            <td>{{ $subscription->user->name }}</td>
                                            <td>{{ $subscription->shop->name }}</td>
                                            <td>{{ $subscription->plan->name }}</td>
                                            <td>${{ number_format($subscription->amount, 2) }}</td>
                                            <td>{{ $subscription->payment_method }}</td>
                                            <td>{{ $subscription->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="btn btn-info btn-sm">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $pendingSubscriptions->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            Il n'y a pas d'abonnements en attente d'approbation.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection