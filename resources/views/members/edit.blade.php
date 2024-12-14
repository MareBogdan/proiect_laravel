@extends('layouts.app')

@section('content')
    <h1>Editare Membru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
        </div>
        <div class="mb-3">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}" required>
        </div>
        <div class="mb-3">
            <label>Profession <span class="text-danger">*</span></label>
            <input type="text" name="profession" class="form-control" value="{{ old('profession', $member->profession) }}" required>
        </div>
        <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" class="form-control" value="{{ old('company', $member->company) }}">
        </div>
        <div class="mb-3">
            <label>LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $member->linkedin_url) }}">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ (old('status', $member->status)=='active')?'selected':'' }}>active</option>
                <option value="inactive" {{ (old('status', $member->status)=='inactive')?'selected':'' }}>inactive</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-warning">Actualizează</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Înapoi</a>
    </form>
@endsection
