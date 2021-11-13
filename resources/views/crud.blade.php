<title>CRUD-APP</title>
@extends('layouts.app')
@section('content')

        {{-- <div class="container mx-auto flex justify-between">
            <div class="flex">
                <router-link class="mr-4" to='/' exact>Home</router-link>
                <router-link to='/about'>About</router-link>
            </div>
            <div class="flax">
                <router-link class="mr-4" to='/login' exact>Login</router-link>
                <router-link to='/register'>Register</router-link>
            </div>
        </div> --}}
<div id="app">
    <top-bar> </top-bar>

    <table-body></table-body>
    <router-view></router-view>

</div>


@endsection
