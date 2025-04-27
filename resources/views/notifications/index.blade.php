@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Notifications</h4>
                    <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary">Marquer tout comme lu</button>
                    </form>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($notifications->count() > 0)
                        <div class="list-group">
                            @foreach ($notifications as $notification)
                                <div class="list-group-item list-group-item-action {{ $notification->is_read ? '' : 'list-group-item-light' }}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            @if (!$notification->is_read)
                                                <span class="badge badge-primary">Nouveau</span>
                                            @endif
                                            {{ $notification->title }}
                                        </h5>
                                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $notification->message }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <div>
                                            <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-sm btn-info">
                                                {{ $notification->link ? 'Voir détails' : 'Marquer comme lu' }}
                                            </a>
                                        </div>
                                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4">
                            {{ $notifications->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            Vous n'avez pas de notifications.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
