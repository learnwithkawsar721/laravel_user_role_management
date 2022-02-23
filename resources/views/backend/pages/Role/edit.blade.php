@php
use App\Models\User;
@endphp
@extends('backend.layouts.master')
@section('title', 'Role page,Admin-panel')
@section('css')
<style>
    .custom-control-label {
    margin-top: 2px;
    text-transform: capitalize;
}
</style>
@endsection
@section('breadcrumbs')
    <ul class="breadcrumbs pull-left">
        <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
        <li><a href="{{ route('roles.index') }}">Roles</a></li>
        <li><span>Create Role</span></li>
    </ul>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        @includeIf('backend.layouts.partial.error-messages')
                        <h4 class="header-title">Create Role</h4>
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter a Role Name">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your
                                    email with anyone else.</small>
                            </div>
                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" class="custom-control-input" id="allcheck">
                                <label class="custom-control-label" for="allcheck">All</label>

                            </div>
                            <hr>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($get_groups as $group)
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <input type="checkbox" value="{{ $group->name }}"
                                            onclick="checkByGroups('role-{{ $i }}-management-checkbox',this.id)"
                                            class="custom-control-input management{{ $i }}"
                                            id="management{{ $i }}">
                                        <label class="custom-control-label px-2" for="management{{ $i }}">
                                            {{ $group->name }}</label>
                                    </div>
                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                        @php
                                            $getpermissions = User::getPermissionByGroupName($group->name);
                                        @endphp
                                        @foreach ($getpermissions as $permission)
                                        {{-- {{ hasPermissionTo($permission) }} --}}
                                            <div class="custom-control custom-checkbox">

                                                <input type="checkbox" name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    class="custom-control-input allpermission"
                                                    id="rolePermission{{ $permission->id }}">
                                                <label class="custom-control-label"
                                                    for="rolePermission{{ $permission->id }}">{{ $permission->name }}</label>

                                            </div>
                                           
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#allcheck').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        })

        function checkByGroups(className, thisChecked) {
            const gropuIdName = $('#' + thisChecked);
            const classCheckBox = $('.' + className+" input");
            if (gropuIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
        }
    </script>
@endsection
