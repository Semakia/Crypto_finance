<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3 d-flex flex-column mb-md-10 mb-3">
                {{ Form::label('name', __('messages.common.name').(':'), ['class' => 'pb-2 fs-4 text-gray-600']) }}
                <span class="fs-4 text-gray-800">{{$level->name}}</span>
            </div>
            <div class="col-sm-3 d-flex flex-column mb-md-10 mb-3">
                {{ Form::label('name', __('messages.common.level_price').(':'), ['class' => 'pb-2 fs-4 text-gray-600']) }}
                <span class="fs-4 text-gray-800">{{$level->level_price}}</span>
            </div>   <div class="col-sm-3 d-flex flex-column mb-md-10 mb-3">
                {{ Form::label('name', __('messages.common.color').(':'), ['class' => 'pb-2 fs-4 text-gray-600']) }}
                <span class="fs-4 text-gray-800">{{$level->color}}</span>
            </div>
        </div>
    </div>
</div>
