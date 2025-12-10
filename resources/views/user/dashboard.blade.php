@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret">
        <div class="container">
            
                <h1>Hello,{{ auth('web')->user()->name ?? '' }}</h1>


                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

             
               </div>

        </div>
        <form action="{{ route('account.logout') }}" method="POST" class="d-inline">
        @csrf  
        <button type="Submit" class="btn btn-secondary">Logout</button> 
        </form>
        
    </nav>

    <a href="{{ route('account.edit') }}" class="btn btn-primary">Edit Profile</a>

    <form action="{{ route('account.delete') }}" method="POST" style="display:inline-block;">
        @csrf
        <button class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete your account? This cannot be undone!')">
            Delete Account
        </button>
    </form>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">User Dashboard</h3>
            </div>
            <div class="card-body">
                You are logged in !!
            </div>
        </div>
    </div>
@endsection
