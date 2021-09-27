@extends('layout.main')
@section('title')
    Attributes
@endsection
@section('style')
@endsection


@section('content')
    <div class="add text-end">
        <a href="{{ route('attributes.add') }}" class="btn btn-danger "><i class="fas fa-plus"></i></a>
    </div>
    <div class="card">
        <div class="card-header bg-info text-center">
            <h4>Attributes</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
                @php
                    $attributes = \App\Models\Attribute::with('values')->get();
                @endphp
                @foreach ($attributes as $name)
                    <tr>
                        <td>{{ $name->name }}
                            &nbsp; <a data-bs-toggle="modal" data-bs-target="#name{{ $name->id }}"
                                href="{{ $name->id }}"><i class=" fas fa-edit"></i></a>

                            &nbsp; <a class="text-danger"
                                onclick="return confirm('you want to sure to delete this attribute?')"
                                href="{{ route('delete.attr_name', ['id' => $name->id]) }}"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                        <div class="modal fade" id="name{{ $name->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('attributes_name.update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $name->id }}">
                                            <div class="form-group mb-3">
                                                <label for="value"></label>
                                                <input type="text" class="form-control" value="{{ $name->name }}"
                                                    name="name">
                                            </div>
                                            <button type="submit" class="btn btn-primary form-control">Save
                                                changes</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <td>
                            @foreach ($name->values as $item)
                                <li>{{ $item->value }}
                                    &nbsp; <a data-bs-toggle="modal" data-bs-target="#val{{ $item->id }}"
                                        href="{{ $name->id }}"><i class=" fas fa-edit"></i></a>

                                    &nbsp; <a class="text-danger"
                                        onclick="return confirm('you want to sure to delete this attributes value?')"
                                        href="{{ route('delete.attr_value', ['id' => $item->id]) }}"><i
                                            class="fas fa-trash"></i></a>
                                </li>


                                <div class="modal fade" id="val{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('attributes.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="form-group mb-3">
                                                        <label for="value"></label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $item->value }}" name="value">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary form-control">Save
                                                        changes</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection
@section('script')
@endsection
