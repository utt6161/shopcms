@extends('layouts.layout')

@section('title', 'О нас')

@section('content')

<div style = "padding-top: 60px ;padding-left:120px; padding-right:120px">
<section id="about">
      <div class="container">
        <h2>О нас</h2>
        <p>
          Мы классные, мы делаем часики, окда
        </p>
      </div>
    </section>

    <section id="contact">
      <div class="container">
      <h3 class="section-title" style = "color:white">Найдите или свяжитесь с нами</h3>
      <div>
            <i style = "color:white;" class="fa fa-phone fa-2x"></i>
            <p>+1 5589 55488 55</p>
          </div>
      <p class="section-description">Мы вот тут находимся</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1673.4645445501392!2d88.2211902060982!3d69.34742990802707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x44ac5e984c55ccd3%3A0xf6c75952efd2b505!2z0YPQuy4g0KLQsNC70L3QsNGF0YHQutCw0Y8sIDE2LCDQndC-0YDQuNC70YzRgdC6LCDQmtGA0LDRgdC90L7Rj9GA0YHQutC40Lkg0LrRgNCw0LksINCg0L7RgdGB0LjRjywgNjYzMzA1!5e0!3m2!1sru!2suk!4v1545028205498" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </section>
      </div>
</div>
@stop