@extends('layouts.vendor')

@section('title', 'Edit Shop')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Shop</h4>
                    <p class="card-description">
                        Update your shop information.
                    </p>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('vendor.shop.update', ['shop' => $shop->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Shop Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $shop->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Shop Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $shop->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Shop Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $shop->phone) }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Shop Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $shop->address) }}" required>
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $shop->city) }}" required>
                                    @error('city')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $shop->country) }}" required>
                                    @error('country')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $shop->postal_code) }}" required>
                                    @error('postal_code')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Shop Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $shop->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Shop Logo</label>
                                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo">
                                    <small class="form-text text-muted">Recommended size: 200x200 pixels</small>
                                    @error('logo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @if ($shop->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $shop->logo) }}" alt="Shop Logo" class="img-thumbnail" style="max-width: 150px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner">Shop Banner</label>
                                    <input type="file" class="form-control-file @error('banner') is-invalid @enderror" id="banner" name="banner">
                                    <small class="form-text text-muted">Recommended size: 1200x300 pixels</small>
                                    @error('banner')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @if ($shop->banner)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $shop->banner) }}" alt="Shop Banner" class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Shop</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
