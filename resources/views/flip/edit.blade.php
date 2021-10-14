@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('flips.index')}}" class="btn btn-sm btn-neutral">Tous les Flipbooks</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                  {!! Form::open(['route' => ['flips.update', $flip, 'files' => true], 'method'=>'put']) !!}
                    <h6 class="heading-small text-muted mb-4">Infos du FlipBook</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{ Form::label('name', 'Nom', ['class' => 'form-control-label']) }}
                                        {{ Form::text('name', $flip->name, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                        {{ Form::label('pdf', 'Fichier PDF', ['class' => 'form-control-label d-block']) }}
                                        <div class="custom-file">
                                          <input type="file" name="pdf" class="custom-file-input" id="chooseFile">
                                          <label class="custom-file-label" for="chooseFile">Choisir un PDF</label>
                                        </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        {{ Form::submit('Enregistrer', ['class'=> 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
