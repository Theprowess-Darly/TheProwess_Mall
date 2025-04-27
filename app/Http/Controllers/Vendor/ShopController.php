<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Show the form for creating a new shop.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Check if vendor already has a shop
        $existingShop = Shop::where('user_id', Auth::id())->first();
        
        if ($existingShop) {
            return redirect()->route('vendor.shop.edit')
                ->with('info', 'Vous avez déjà une boutique. Vous pouvez la modifier ici.');
        }
        
        return view('vendor.shop.create');
    }

    /**
     * Store a newly created shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:shops',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->phone = $request->phone;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->country = $request->country;
        $shop->postal_code = $request->postal_code;
        $shop->description = $request->description;
        $shop->status = 'pending'; // Default status is pending

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('shops/logos', 'public');
            $shop->logo = $logoPath;
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('shops/banners', 'public');
            $shop->banner = $bannerPath;
        }

        $shop->save();

        return redirect()->route('vendor.subscription.plans')
            ->with('success', 'Boutique créée avec succès! Veuillez maintenant choisir un plan d\'abonnement.');
    }

    /**
     * Show the form for editing the shop.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $shop = Shop::where('user_id', Auth::id())->firstOrFail();
        return view('vendor.shop.edit', compact('shop'));
    }

    /**
     * Update the shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $shop = Shop::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255|unique:shops,name,' . $shop->id,
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->phone = $request->phone;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->country = $request->country;
        $shop->postal_code = $request->postal_code;
        $shop->description = $request->description;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($shop->logo) {
                Storage::disk('public')->delete($shop->logo);
            }
            $logoPath = $request->file('logo')->store('shops/logos', 'public');
            $shop->logo = $logoPath;
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            // Delete old banner if exists
            if ($shop->banner) {
                Storage::disk('public')->delete($shop->banner);
            }
            $bannerPath = $request->file('banner')->store('shops/banners', 'public');
            $shop->banner = $bannerPath;
        }

        $shop->save();

        return redirect()->route('vendor.shop.edit')
            ->with('success', 'Boutique mise à jour avec succès!');
    }
}
