@extends('app')
@section('title', $faq_title)
@include('others.faq.faq_contents', ['title' => $faq_title])
