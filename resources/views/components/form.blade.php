<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="row">
        <div class="col-{{ isset($column) ? $column : '12' }}">
            <div class="card">
                @if (isset($header))
                    <div class="card-header">
                        {{ $header }}
                    </div>
                @endif

                <div class="card-body">
                    {{ $body }}
                </div>

                @if (isset($footer))
                <div class="card-footer">
                    {{ $footer }}
                </div>
                @endif
            </div>
        </div>

        @if (isset($sideright))
            <div class="col-{{ isset($column) ? 12 - $column : 12 }}">
                {{ $sideright }}
            </div>
        @endif
    </div>
</div>
