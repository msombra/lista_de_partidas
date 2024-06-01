<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalInsertLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertLabel">Inserir CNJ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cnjs.store') }}" method="post" id="form">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        {{-- TIME --}}
                        <div>
                            <label for="cnj">Cnj</label>
                            <input type="text" class="form-control" id="cnj" name="cnj">
                            @include('pages.includes.msg_errors', ['campo' => 'cnj'])
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
