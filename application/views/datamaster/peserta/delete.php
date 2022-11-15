<!-- Logout Delete Confirmation-->
<div class="modal fade" id="modalHapus" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="peserta/delete/<?php echo $data->id ?>">Delete</a>
            </div>
        </div>
    </div>
</div>