@extends('layout.app')

@section('style')
    <style>
        .branches_cards .singe_branch_contaienr {
            transition: all 1s;
            background: #4f5761;
            padding: 10px;
            border-radius: 14px;
        }

        .branches_cards .singe_branch_contaienr:hover {
            transform: translateY(-15px)
        }

        .branches_cards .singe_branch_contaienr .card_logo img {
            width: 50px;
            display: flex;
            margin: auto;
        }

        .branches_cards .singe_branch_contaienr .card_content .card_title {
            color: #fff;
        }

        .branches_cards .singe_branch_contaienr .btn-primary {
            transition: all 0.5s
        }

        .branches_cards .singe_branch_contaienr .btn-primary,
        .branches_cards .singe_branch_contaienr .btn-primary:hover,
        .branches_cards .singe_branch_contaienr .btn-primary:active {
            background: #95a94f;
            border-color: #95a94f;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row branches_cards">
            @foreach (Branch::get() as $branch)
                <div class="col-md-4 col-sm-6 col-xs-12 mt-4">
                    <div class="singe_branch_contaienr">
                        <div class="card_logo my-2">
                            <img src="{{ asset('assets/images/logoicon.png') }}">
                        </div>
                        <div class="card_content">
                            <h4 class="card_title text-center py-2">
                                {{ $branch->branch_name }}
                            </h4>
                        </div>
                        <div class="card_button d-flex">
                            <a href="{{ route('branch.freez_form', $branch->slug) }}" class="btn btn-primary m-auto">
                                Freezing Form
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
