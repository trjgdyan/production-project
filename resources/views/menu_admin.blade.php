@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class=" w-100">
            <div class="d-flex flex-column flex-md-row">
                <div class="w-100 text-center border td-hover bg-primary p-3">
                    <a href="{{ route('user.index') }}" class="d-flex align-items-center justify-content-center text-white"
                        style="font-weight: bold; text-decoration: none;">
                        <i class="fas fa-cog mr-3" style="font-size: 3em;"></i>USER SETTING
                    </a>
                </div>
                <div class="w-100 text-center border td-hover bg-primary p-3">
                    <a href="{{ route('product.index') }}"
                        class="d-flex align-items-center justify-content-center text-white"
                        style="font-weight: bold; text-decoration: none;">
                        <i class="fas fa-folder mr-3" style="font-size: 3em;"></i>PRODUCT
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .td-hover:hover {
            background-color: #4a6fad !important;
            transition: background-color 0.3s ease;
        }

        .modal-container {
            display: none;
            position: fixed;
            top: 25%;
            left: 40%;
            width: 100%;
            height: 100%;
            z-index: 1050;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            width: 100%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close {
            font-size: 1.5em;
            cursor: pointer;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#openModal').click(function() {
                $('#modalSelection').fadeIn();
            });

            $('#closeModal, #closeModalButton').click(function() {
                $('#modalSelection').fadeOut();
            });

            $(document).click(function(e) {
                if ($(e.target).is('#modalSelection')) {
                    $('#modalSelection').fadeOut();
                }
            });
        });
    </script>

@endsection
