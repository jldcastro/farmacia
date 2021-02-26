<div class="modal fade" id="modal-delete-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="user" action="{!! route('usuario.destroy', $usuario->id) !!}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input name="_method" type="hidden" value="DELETE">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Activar a este Usuario en el Sistema</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">En realidad desea activar este usuario?</div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit">Activar</button></div>
            </div>
        </div>
    </form>
</div>
