<div class="modal fade" id="editUserModal_{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> تحديث دور المستخدم </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" id="editUserForm_{{ $user->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="custom-form-field row">
                    <div class="form-group col-12">
                        <label for="role" class="mb"> دور المستخدم </label>
                        <select name="role" class="form-control" id="role">
                            <option value="0"> مستخدم عادي </option>
                            <option value="1"> ادمن </option>
                        </select>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="editUserForm_{{ $user->id }}" class="btn btn-primary"> حفظ التعديلات </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>



