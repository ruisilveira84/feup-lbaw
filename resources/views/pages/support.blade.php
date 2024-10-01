@extends('layouts.app')

@section('content')
    @include('pages.sidebars')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Support') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('support.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="subject">{{ __('Subject') }}</label>
                                <select id="subject" name="subject" class="form-control" required>
                                    <option value="compliments">{{ __('Compliments') }}</option>
                                    <option value="issues">{{ __('Issues') }}</option>
                                    <option value="payments">{{ __('Payments') }}</option>
                                    <option value="others">{{ __('Others') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

