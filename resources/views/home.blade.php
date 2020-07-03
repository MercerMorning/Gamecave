@include('includes.header')
@extends('layouts.app')

<ul>
    @foreach($userInf as $inf)
    <li>
        {{ $inf }}
    </li>
    @endforeach
</ul>
@include('includes.footer')
