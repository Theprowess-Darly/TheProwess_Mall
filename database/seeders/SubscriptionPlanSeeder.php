<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create([
            'name' => 'Basique',
            'price' => 00,
            'duration_in_days' => 10,
            'features' => "Periode d\'essai gratuit \n Jusqu'à 10 produits\nSupport par email\nTableau de bord",
            'is_active' => true,
        ]);

        SubscriptionPlan::create([
            'name' => 'Silver',
            'price' => 10000,
            'duration_in_days' => 30,
            'features' => "Jusqu'à 30 produits\nSupport prioritaire\nTableau de bord silver\nRapports de vente",
            'is_active' => true,
        ]);

        SubscriptionPlan::create([
            'name' => 'Gold',
            'price' => 110000,
            'duration_in_days' => 365,
            'features' => "Produits illimités\nSupport 24/7\nTableau de bord Gold\nRapports détaillés\nPromotions personnalisées",
            'is_active' => true,
        ]);
        $this->command->info('Subscription plans created successfully!');
    }
}