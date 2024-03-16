    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Role Permission List ( {{$role->role_name}} )</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <?php $permissions = getPermissionList();?>
                @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <h4>{{$loop->iteration}}. <storng>{{ucfirst($permission["name"])}}</storng></h4>
                        @foreach($permission['permission'] as $key => $item)
                            <div>
                                <label style="margin-left: 15px">
                                    <input type="checkbox" name="permissions[]" value="{{$key}}" @if(in_array($key, @unserialize($role->role_permission))) checked @endif disabled>
                                    {{$item}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>


