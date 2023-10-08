@extends('layout.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Role</h4>
                    </div>
                    <div class="card-body">
                        <form action="/edit-role-update/{{ $role->id }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" placeholder="Enter role name" name="name" id="name"
                                    class="form-control" value="{{ $role->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions</label>
                                <div class="checkbox-list">
                                    @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]"
                                                id="permission-{{ $permission->id }}" value="{{ $permission->id }}"
                                                class="custom-control-input"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="permission-{{ $permission->id }}">{{ $formattedPermissions[$permission->id] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
