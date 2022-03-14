@extends('layout.layout')

@section('content')

    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            <select class="form-select select-style" name="payStatus_id">
                <option selected value="{{$orderpay->id}}">{{$orderpay->name}}</option>
                @foreach($pay as $payp)
                    @if($payp->id !== $orderpay->id)
                        <option value="{{$payp -> id}}">{{$payp -> name}}</option>
                    @endif
                @endforeach
            </select>
            <select class="form-select select-style" name="status_id">
                <option selected value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>
                @foreach($statuses as $status)
                    @if($status->id !== $orderStatus->id)
                        <option value="{{$status -> id}}">{{$status -> name}}</option>
                    @endif
                @endforeach
            </select>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>

@endsection
