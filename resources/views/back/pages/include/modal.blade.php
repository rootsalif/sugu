@php
    $title ??='';
    $content ??= '';
    $class ??=''
@endphp


<div class="modal bs-example-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p @class([$class])>{{$content}}&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">OUI</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->