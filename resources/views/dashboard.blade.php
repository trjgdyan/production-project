@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <table class="table w-100">
            <tbody class="bg-primary">
                <tr>
                    <td class="w-50 text-center border td-hover">
                        <a href="{{ route('user.index') }}"
                            class="d-flex align-items-center justify-content-center text-white"
                            style="font-weight: bold; text-decoration: none;">
                            <i class="fas fa-cog mr-3" style="font-size: 3em;"></i>USER SETTING
                        </a>
                    </td>
                    <td class="w-50 text-center border td-hover">
                        <a href="#" id="openModal" class="d-flex align-items-center justify-content-center text-white"
                            style="font-weight: bold; text-decoration: none;">
                            <i class="fas fa-folder mr-3" style="font-size: 3em;"></i>MODULE SELECTION
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="modalSelection" class="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Module Selection</h5>
                <button type="button" class="close" id="closeModal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <a href="{{ route('product.index') }}">
                        <li class="list-group-item">Produksi</li>
                    </a>
                    <a href="{{ route('qc.menu') }}">
                        <li class="list-group-item">QC</li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">Menu 3</li>
                    </a>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalButton">Close</button>
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
