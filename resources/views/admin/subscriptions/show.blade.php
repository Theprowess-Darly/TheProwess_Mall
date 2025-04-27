@extends('layouts.admin')

@section('title', 'Détails de l\'abonnement')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Détails de l'abonnement #{{ $subscription->id }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Détails de l'abonnement</h5>
                            <p><strong>Plan:</strong> {{ $subscription->plan->name }}</p>
                            <p><strong>Montant:</strong> ${{ number_format($subscription->amount, 2) }}</p>
                            <p><strong>Statut:</strong> 
                                @if ($subscription->status == 'pending_approval')
                                    <span class="badge badge-warning">En attente d'approbation</span>
                                @else
                                    <span class="badge badge-secondary">{{ $subscription->status }}</span>
                                @endif
                            </p>
                            <p><strong>Méthode de paiement:</strong> {{ $subscription->payment_method }}</p>
                            <p><strong>ID de transaction:</strong> {{ $subscription->payment_id }}</p>
                            <p><strong>Date de création:</strong> {{ $subscription->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Détails du marchand</h5>
                            <p><strong>Nom:</strong> {{ $subscription->user->name }}</p>
                            <p><strong>Email:</strong> {{ $subscription->user->email }}</p>
                            <p><strong>Téléphone:</strong> {{ $subscription->user->phone }}</p>
                            <p><strong>Adresse:</strong> {{ $subscription->user->address }}</p>
                            <p><strong>Ville:</strong> {{ $subscription->user->city }}</p>
                            <p><strong>Pays:</strong> {{ $subscription->user->country }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5>Détails de la boutique</h5>
                            <p><strong>Nom de la boutique:</strong> {{ $subscription->shop->name }}</p>
                            <p><strong>Description:</strong> {{ $subscription->shop->description }}</p>
                            <p><strong>Email:</strong> {{ $subscription->shop->email }}</p>
                            <p><strong>Téléphone:</strong> {{ $subscription->shop->phone }}</p>
                            <p><strong>Adresse:</strong> {{ $subscription->shop->address }}, {{ $subscription->shop->city }}, {{ $subscription->shop->country }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('admin.subscriptions.approve', $subscription->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">Approuver</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#rejectModal">
                                Rejeter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.subscriptions.reject', $subscription->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Rejeter l'abonnement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rejection_reason">Raison du rejet</label>
                        <textarea class="form-control" id="rejection_reason" name="rejection_reason" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Rejeter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
