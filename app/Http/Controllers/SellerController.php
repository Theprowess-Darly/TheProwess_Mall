<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email',
            'boutique_name' => 'required|string|max:255|unique:sellers,boutique_name',
            'product_type' => 'required|string',
        ]);

        // Store the seller data
        // ... your storage logic here ...

        // Redirect to document verification step
        return redirect()->back()->with('show_verification', true);
    }

    public function uploadDocuments(Request $request)
    {
        $validated = $request->validate([
            'id_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'business_registry' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'address_proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Store the documents
        // ... your file storage logic here ...

        // Redirect to next step
        return redirect()->back()->with('success', 'Documents uploaded successfully');
    }
}