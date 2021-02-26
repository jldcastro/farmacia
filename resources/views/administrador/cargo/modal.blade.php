<div class="modal fade" id="modal-delete-{{$cargo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="user" action="{!! route('cargo.destroy', $cargo->id) !!}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input name="_method" type="hidden" value="DELETE">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suspender Cargo Hospital</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">En realidad desea suspender este cargo?</div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-danger" type="submit">Suspender</button></div>
            </div>
        </div>
    </form>
</div>
