@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista Membri</h1>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Adaugă Membru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nume</th>
                <th>Email</th>
                <th>Profesia</th>
                <th>Companie</th>
                <th>Status</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->profession }}</td>
                    <td>{{ $member->company }}</td>
                    <td>{{ $member->status }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Sigur ștergi acest membru?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
