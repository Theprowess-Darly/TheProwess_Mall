@extends('layouts.vendor')

@section('title', 'Historique des abonnements')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Historique des abonnements</h4>
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

                    @if ($subscriptions->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Plan</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ $subscription->plan->name }}</td>
                                            <td>{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</td>
                                            <td>
                                                @if ($subscription->status == 'pending')
                                                    <span class="badge bg-warning">En attente de paiement</span>
                                                @elseif ($subscription->status == 'pending_approval')
                                                    <span class="badge bg-info">En attente d'approbation</span>
                                                @elseif ($subscription->status == 'active')
                                                    <span class="badge bg-success">Actif</span>
                                                @elseif ($subscription->status == 'expired')
                                                    <span class="badge bg-secondary">Expiré</span>
                                                @elseif ($subscription->status == 'cancelled')
                                                    <span class="badge bg-danger">Annulé</span>
                                                @elseif ($subscription->status == 'rejected')
                                                    <span class="badge bg-danger">Rejeté</span>
                                                @endif
                                            </td>
                                            <td>{{ $subscription->starts_at ? $subscription->starts_at->format('d/m/Y') : 'N/A' }}</td>
                                            <td>{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : 'N/A' }}</td>
                                            <td>{{ $subscription->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @if ($subscription->status == 'pending')
                                                    <a href="{{ route('vendor.subscription.payment', $subscription->id) }}" class="btn btn-sm btn-primary">Compléter le paiement</a>
                                                @elseif ($subscription->status == 'active' && $subscription->ends_at && $subscription->ends_at->isPast())
                                                    <a href="{{ route('vendor.subscription.plans') }}" class="btn btn-sm btn-warning">Renouveler</a>
                                                @elseif ($subscription->status == 'rejected')
                                                    <span class="text-danger">{{ $subscription->rejection_reason }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $subscriptions->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            Vous n'avez pas encore d'abonnements.
                        </div>
                        <a href="{{ route('vendor.subscription.plans') }}" class="btn btn-primary">Choisir un plan d'abonnement</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
