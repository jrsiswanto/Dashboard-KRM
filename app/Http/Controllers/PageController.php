<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function program()
    {
        return view('pages.program');
    }

    public function biodiversitas()
    {
        return view('pages.biodiversitas');
    }

    public function produkOlahan()
    {
        return view('pages.produk-olahan');
    }

    public function csr()
    {
        return view('pages.csr');
    }

    public function karbonTrading()
    {
        return view('pages.karbon-trading');
    }

    public function pirolisis()
    {
        return view('pages.pirolisis');
    }

    public function solarCell()
    {
        return view('pages.solar-cell');
    }

    public function silvoFishery()
    {
        return view('pages.silvo-fishery');
    }

    public function terangin()
    {
        return view('pages.terangin');
    }

    public function hubungiKami()
    {
        return view('pages.hubungi-kami');
    }
}