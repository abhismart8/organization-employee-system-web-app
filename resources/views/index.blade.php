@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="/logout" class="btn btn-danger mt-15" style="float: right;"> Logout </a>
    </div>
    <div class="col-sm-12 text-center">
        <h2 class=""> <strong> {{config('app.name')}} </strong> </h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center mt-30">
        <a href="{{route('backup')}}" class="btn btn-primary mt-15"> Download Backup </a>
    </div>
</div>
@endsection

@push('post-scripts')
<script src="{{ asset('js/index.js') }}"></script>
<script>
</script>
@endpush