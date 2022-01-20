
<div class="{{ collect($inputs)->has('column') ? '' : 'row'}}">
    @foreach ($inputs as $i => $item)
    @switch($item['type'])
        @case('text')
            <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <div class="input-group">
                    @if (isset($item['input-group-prepend']))
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{ $item['input-group-prepend' ]}}
                        </span>
                    </div>
                    @endif

                    <input type="text" class="form-control @error($item['name']) is-invalid @enderror"
                        name="{{ $item['name'] ?? '' }}" value="{{ $item['value'] ?? '' }}" {{ $item['read'] ?? '' }}>

                    @error($item['name'])
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @break

        @case('password')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <input type="password" class="form-control @error($item['name']) is-invalid @enderror"
                    name="{{ $item['name'] ?? '' }}" value="{{ $item['value'] ?? '' }}">
                @error($item['name'])
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @break

        @case('number')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <input type="number" class="form-control @error($item['name']) is-invalid @enderror"
                    name="{{ $item['name'] ?? '' }}" value="{{ $item['value'] ?? '' }}" {{ $item['read'] ?? '' }}>
                @error($item['name'])
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @break

        @case('date')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif
                <input type="text" name="{{ $item['name'] ?? '' }}" class="form-control datepicker @error($item['name']) is-invalid @enderror">
            </div>
        @break

        @case('select')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <select name="{{ $item['name'] ?? '' }}" class="form-control @error($item['name']) is-invalid @enderror">
                    @if (isset($item['options']))
                        @foreach ($item['options'] as $i => $option)
                            <option value="{{ $option['value'] }}"
                                {{ $option['value'] == $item['value'] ? 'selected' : '' }}>{{ $option['text'] }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        @break

        @case('select2')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif
                <select name="{{ $item['name'] ?? '' }}" {{ isset($item['read']) && Str::contains($item['read'], 'readonly') ? 'disabled' : '' }} class="form-control select2  @error($item['name']) is-invalid @enderror"
                    @if (isset($item['multiple'])) multiple="multiple" @endif>
                    @if (isset($item['options']))
                        @foreach ($item['options'] as $i => $option)
                            <option value="{{ $option['value'] }}"
                                {{ isset($item['value']) && $option['value'] == $item['value'] ? 'selected' : '' }}>
                                {{ $option['text'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        @break

        @case('radio')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif
                <div class="selectgroup w-100">
                    @foreach ($item['options'] as $i => $option)
                        <label class="selectgroup-item">
                            <input type="radio" name="{{ $item['name'] }}" value="{{ $option['value'] }}"
                                class="selectgroup-input"
                                {{ isset($item['value']) && $option['value'] ? 'checked' : '' }}>
                            <span class="selectgroup-button">
                                {{ $option['text'] }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        @break

        @case('checkbox')
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">HTML</span>
                </label>
            </div>
        @break

        @case('hidden')
            <input
                type="hidden"
                name="{{ $item['name'] ?? '' }}"
                value="{{ $item['value'] ?? '' }}">
        @break

        @case('file')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <div class="input-images"></div>

                @error($item['name'])
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @break

        @case('maps')
        <div class="form-group {{ isset($item['column']) ? $item['column'] : 'col-12' }}">
                @if ($item['label'] ?? false)
                    <label>{{ $item['label'] }}</label>
                @endif

                <div id="mapid" style="height: 250px"></div>

                @error($item['name'])
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @break
    @endswitch
@endforeach
</div>
