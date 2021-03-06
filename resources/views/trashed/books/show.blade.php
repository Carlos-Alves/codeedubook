@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Livro {{ $book->title }}</h3>
        </div>


        <div class="row">

           <ul class="list-group">
               <li class="list-group-item">
                   <strong>Título</strong>
               </li>
               <li class="list-group-item">
                   {{ $book->title }}
               </li>
               <li class="list-group-item">
                   <strong>Subtítulo</strong>
               </li>
               <li class="list-group-item">
                   {{ $book->subtitle }}
               </li>
               <li class="list-group-item">
                   <strong>Preço</strong>
               </li>
               <li class="list-group-item">
                   {{ $book->price }}
               </li>
               <li class="list-group-item">
                   <strong>Categorias</strong>
               </li>
               <li class="list-group-item">
                   {{ $book->categories->implode('name_trashed', ', ') }}
               </li>

               <li class="list-group-item">
                   <strong>Autor</strong>
               </li>
               <li class="list-group-item">
                   {{ $book->author->name }}
               </li>
           </ul>

        </div>
    </div>
    @endsection