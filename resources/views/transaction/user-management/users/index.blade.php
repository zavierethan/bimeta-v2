@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">User Management</li>
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;"  data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Tambah User</a>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">

            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">USERNAME</th>
                        <th class="whitespace-nowrap">DISPLAY NAME</th>
                        <th class="whitespace-nowrap">EMAIL</th>
                        <th class="whitespace-nowrap">ROLE</th>
                        <th class="whitespace-nowrap text-center">STATUS</th>
                        <th class="whitespace-nowrap text-center">LAST LOGIN</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->username}}</td>
                        <td>{{$item->display_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role_name}}</td>
                        <td class="whitespace-nowrap text-center">{{$item->status}}</td>
                        <td class="whitespace-nowrap text-center">{{$item->last_login}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('user-management.user.privilege', ['id' => $item->user_id])}}" title="Edit privilege"><i
                                        data-lucide="key" class="w-4 h-4 mr-1"></i> privilege</a>
                                <a class="flex items-center mr-3 text-primary"
                                    href="" title="Edit Role"><i
                                        data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Tambah User
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('user-management.user.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Username</label>
                                        <input id="horizontal-form-1" type="text" class="form-control" name="username" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Display Name</label>
                                        <input id="horizontal-form-1" type="text" class="form-control" name="display_name" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Email</label>
                                        <input id="horizontal-form-1" type="text" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Role</label>
                                        <select data-placeholder="Pilih Role" class="tom-select w-full form-control" name="role_id" required>
                                            <option value=" "> - </option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable();
})
</script>
@endsection
