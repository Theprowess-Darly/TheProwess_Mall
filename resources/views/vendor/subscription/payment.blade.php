@extends('layouts.vendor')

@section('title', 'Paiement d\'abonnement')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Paiement pour l'abonnement {{ $subscription->plan->name }}</h4>
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

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Résumé de la commande</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Plan:</td>
                                            <td><strong>{{ $subscription->plan->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Montant:</td>
                                            <td><strong>{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Durée:</td>
                                            <td><strong>{{ $subscription->plan->duration_in_days }} jours</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Boutique:</td>
                                            <td><strong>{{ $subscription->shop->name }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('vendor.subscription.process-payment', $subscription->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Méthode de paiement</label>
                            <select class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                <option value="">Sélectionner une méthode de paiement</option>
                                <option value="orange_money">Orange Money</option>
                                <option value="mtn_momo">MTN Mobile Money</option>
                                <option value="moov_money">Moov Money</option>
                                <option value="wave">Wave</option>
                                <option value="bank_transfer">Virement bancaire</option>
                            </select>
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="transaction_id" class="form-label">Numéro de transaction</label>
                            <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" id="transaction_id" name="transaction_id" required>
                            @error('transaction_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Entrez le numéro de transaction ou de référence de votre paiement.</div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Confirmer le paiement</button>
                            <a href="{{ route('vendor.subscription.plans') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>

                    <div class="mt-4">
                        <div class="alert alert-info">
                            <h5>Instructions de paiement:</h5>
                            <p>1. Effectuez votre paiement via l'une des méthodes ci-dessus.</p>
                            <p>2. Notez le numéro de transaction ou de référence.</p>
                            <p>3. Entrez ce numéro dans le formulaire ci-dessus et confirmez.</p>
                            <p>4. Votre abonnement sera activé après vérification du paiement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
