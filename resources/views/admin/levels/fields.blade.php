<div class="row">
    <!-- Title Field -->
    <div class="col-lg-6 mb-5">
        <input type="hidden" name="added_by" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
        {{ Form::label('title',__('messages.common.name').':', ['class' => 'form-label']) }}<span
                class="text-danger">*</span>
        {{ Form::text('name', isset($level) ? $level->name : null, ['class' => 'form-control', 'placeholder' =>  __('messages.common.name'), 'required', 'maxLength'=>250]) }}
    </div>

    <!-- Slug Field -->
    <div class="col-lg-6 mb-5">
        {{ Form::label('slug', __('messages.common.level_price').':', ['class' => 'form-label']) }}<span
                class="text-danger">*</span>
        {{ Form::text('level_price',  isset($level) ? $level->level_price : null, ['class' => 'form-control', 'placeholder' => __('messages.common.level_price'), 'tabindex' => 1, 'required']) }}
    </div>

        <!-- Slug Field -->
    <div class="col-lg-6 mb-5">
        {{ Form::label('slug', __('messages.common.color').':', ['class' => 'form-label']) }}<span
                class="text-danger">*</span>
        {{ Form::text('slug',  isset($level) ? $level->color : null, ['class' => 'form-control', 'placeholder' => __('messages.common.color'), 'tabindex' => 1, 'required']) }}
    </div>
</div>
<div class="d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
    <a href="{{ route('levels.index') }}" type="reset"
       class="btn btn-secondary">{{__('messages.common.discard')}}</a>
</div>
</div>
</div>
