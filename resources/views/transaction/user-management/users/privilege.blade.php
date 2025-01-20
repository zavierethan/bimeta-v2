@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <form method="POST" action="" id='form_input' class="grid grid-cols-12 gap-6 mt-5">
        @csrf
        <div class="col-span-4 lg:col-span-4">
            <div class="intro-y box mt-5 p-5">
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-20 font-bold">Nama</label>
                    <input id="vertical-form-1" type="text" class="form-control" id="user_name" value="{{ @$user->username}}" readonly>
                    <input id="vertical-form-1" type="hidden" class="form-control" id="user_id" name='user_id' value="{{ @$user->id }}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-20 font-bold">Email</label>
                    <input id="vertical-form-1" type="text" class="form-control" id="user_email" value="{{ @$user->email }}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-20 font-bold">Role</label>
                    <input id="vertical-form-1" type="text" class="form-control" id="role_name" value="{{ @$role->name }}" readonly>
                </div>
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <a href="javascript:void(0);" id="btn-privilege" class="btn btn-primary w-full md:w-100" onclick='store();'>Update Privilege</a>
                </div>
            </div>
        </div>
        <div class="col-span-8 lg:col-span-8">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Privilege
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($menus as $menu)
                        <?php
                            $sub_menu = json_decode($menu->sub_menu);
                            if ($menu->sub_menu) {
                                $sub_menu = json_decode($menu->sub_menu);
                            ?>
                                <tr>
                                    <td colspan='2'>
                                        <b>{{$menu->title}}</b>
                                        <!-- <br>
                                        {{$menu->description}} -->
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <table class="table table-striped">
                                       <?php
                                            for ($i=0; $i < count($sub_menu); $i++) {
                                        ?>
                                            <tr onclick="checkedSub('{{ $sub_menu[$i]->id }}')">
                                                <td>
                                                    {{$sub_menu[$i]->title}}
                                                    <!-- <br>
                                                    {{$sub_menu[$i]->description}} -->
                                                </td>
                                                <td>
                                                <input class='checkPriv' type="checkbox" id='checkedSub{{ $sub_menu[$i]->id }}' <?= $sub_menu[$i]->is_checked?'checked':''; ?>  name='checkPriv' value='{{ $sub_menu[$i]->id }}'>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                       </table>
                                    </td>
                                </tr>
                            <?php
                            }else{
                            ?>
                                <tr onclick="checkedSub('{{ $menu->id }}')">
                                    <td>
                                        <b>{{$menu->title}}</b>
                                        <!-- <br>
                                        {{$menu->description}} -->
                                    </td>
                                    <td>
                                        <input class='checkPriv' type="checkbox" id='checkedSub{{ $menu->id }}' name='checkPriv' value='{{ $menu->id }}' <?= $menu->is_checked?'checked':''; ?> >
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </form>
</div>


@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(function() {
})

function checkedSub(id) {
    if ($('#checkedSub'+id).is(':checked') == false) {
        $('#checkedSub'+id).prop('checked', true);
    }else{
        $('#checkedSub'+id).prop('checked', false);
    }
}

function store() {
    $('#btn-privilege').prop('disabled', true);
    var menus = [];
    $("input:checkbox[name=checkPriv]:checked").each(function(){
        menus.push($(this).val());

    });

    var form = $('#form_input').serializeArray(); // convert form to array
    form.push(
        {name: "_token", value: $token},
        {name: "menus", value: menus},
    );
    $.ajax({
        url: `{{ route('user-management.user.privilege.store') }}`,
        type: "POST",
        dataType: "json",
        cache: false,
        data: form,
        success:function(result){
        if (result.message) {
            alert(result.message);
            window.location.href = `{{ route('user-management.user.index') }}`;
        }else{
            alert(result.error);
            $('#btn-privilege').prop('disabled', true);
        }
        hideProgres();
        }
    });
}
</script>
@endsection
