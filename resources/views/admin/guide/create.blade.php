@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide Add
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                        <h3 class="card-title float-left"><strong>Create Guide</strong></h3>
                    </div>
                    <div class="card-body">
                        @include('partial.errors')
                        <form action="{{ route('admin.guide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"> Name: </label>
                                <input type="text" class="form-control" placeholder="Enter Name" id="name"
                                    value="{{ old('name') }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="nid"> Emirates ID: </label>
                                <input type="number" class="form-control" placeholder="Enter Nid" id="nid"
                                    value="{{ old('nid') }}" name="nid">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email: </label>
                                <input type="text" class="form-control" placeholder="Enter Email " id="email"
                                    value="{{ old('email') }}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="contact"> Contact: </label>
                                <input type="number" class="form-control" placeholder="Enter Contact" id="contact"
                                    value="{{ old('contact') }}" name="contact">
                            </div>
                            <div class="form-group">
                                <label for="address"> Address: </label>
                                <input type="text" class="form-control" placeholder="Enter Address" id="address"
                                    value="{{ old('address') }}" name="address">
                            </div>

                            <div class="form-group">
                                <label for="price"> Price: </label>
                                <input type="number" class="form-control" placeholder="Enter price" id="price"
                                    value="{{ old('price') }}" name="price">
                            </div>

                            <div class="form-group">
                                <label for="experience"> Experience (Years): </label>
                                <input type="number" class="form-control" placeholder="Enter experience" id="experience"
                                    value="{{ old('experience') }}" name="experience">
                            </div>

                            <div class="form-group">
                                <label for="response_time"> Response Time ( hours ): </label>
                                <input type="number" class="form-control" placeholder="Enter response Time"
                                    id="response_time" value="{{ old('response_time') }}" name="response_time">
                            </div>

                            <div class="form-group">
                                <label for="no_of_slots"> No of Slots ( in month ): </label>
                                <input type="number" class="form-control" placeholder="Enter no_of_slots" id="no_of_slots"
                                    value="{{ old('no_of_slots') }}" name="no_of_slots">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="description"></trix-editor>
                            </div>

                            <div class="form-group">
                                <label>Languages</label>
                                <select class="form-control select-languages" data-placeholder="Choose Language"
                                    name="languages[]" multiple>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            {{ in_array($language->id, old('languages', [])) ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Choose Activities</label>
                                <select class="form-control select-activitites" data-placeholder="Choose Activity"
                                    name="activities[]" multiple>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}"
                                            {{ in_array($activity->id, old('activities', [])) ? 'selected' : '' }}>
                                            {{ $activity->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Private Places </label>
                                <select class="form-control select-private" data-placeholder="Choose Activity"
                                    name="privateDestinations[]" multiple>
                                    @foreach ($places as $places)
                                        <option value="{{ $places->id }}"
                                            {{ in_array($places->id, old('privateDestinations', [])) ? 'selected' : '' }}>
                                            {{ $places->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Other Places </label>
                                <select class="form-control select-places" data-placeholder="Choose Activity"
                                    name="otherDestinations[]" multiple>
                                    @foreach ($otherDestinations as $otherDestination)
                                        <option value="{{ $otherDestination->id }}"
                                            {{ in_array($otherDestination->id, old('otherDestinations', [])) ? 'selected' : '' }}>
                                            {{ $otherDestination->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image"> Image: </label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="isCertified" value="1"
                                        {{ old('isCertified', []) ? 'checked' : '' }}>
                                    Certified
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="highRatings" value="1"
                                        {{ old('highRatings', []) ? 'checked' : '' }}>
                                    High Ratings
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="responsiveGuide" value="1"
                                        {{ old('responsiveGuide', []) ? 'checked' : '' }}>
                                    Responsive Guide
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                                <a href="{{ route('admin.guide.index') }}"  class="btn btn-danger wave-effect">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/trix.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select-activitites').chosen();
            $('.select-languages').chosen();
            $('.select-places').chosen();
            $('.select-private').chosen();
            
        })
    </script>
@endsection

@section('css')
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
