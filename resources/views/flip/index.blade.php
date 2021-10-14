@extends('layouts.app')
@push('pg_btn')
    <a href="{{ route('flips.create') }}" class="btn btn-sm btn-neutral">Créer un nouveau FlipBook</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Tous les Flipbook</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Couleur</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($flips as $flip)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$flip->name }}
                                            </div>
                                        </th>
                                        <td>
                                          <a href="{{route('flip.show',$flip->slug)}}" target=”_blank”>{{route('flip.show',$flip->slug)}}</a>
                                        </td>
                                        <td>
                                            <input type="color" value="{{$flip->color}}" readonly>
                                        </td>
                                        <td class="text-center">
                                          <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit post details" target=”_blank” href="{{route('flip.show', $flip->slug)}}">
                                              <i class="fa fa-eye" aria-hidden="true"></i>
                                          </a>
                                            {!! Form::open(['route' => ['flips.destroy', $flip],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete post" href="">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
