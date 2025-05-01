<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\CheckSubscriptionExpiration;

// Commande inspirante par défaut
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Enregistrement de la commande de vérification des abonnements
// Cette commande vérifie les abonnements expirés et envoie des notifications
Artisan::command('subscriptions:check-expiration', function () {
    $this->call(CheckSubscriptionExpiration::class);
})->purpose('Vérifier les abonnements expirés et envoyer des notifications pour les abonnements qui vont bientôt expirer');
