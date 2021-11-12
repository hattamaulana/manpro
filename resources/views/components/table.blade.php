<div>
    <div class="card card-default">
        @if (isset($header))
        <div class="card-header flex-row justify-content-between">
            {{ $header}}
        </div>
        @endif

        <div class="card-body">
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                    {{ $thead }}
                </thead>
                {{ $tbody}}
            </table>
        </div>
    </div>
</div>
