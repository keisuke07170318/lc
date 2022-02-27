<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class="create">[<a href='/posts/create'>create</a>]</p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                      <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id}}" id ="form_{{ $post->id }}" method ="POST">
                        @csrf
                        @method('DELETE')
                        <button type="delete"><span onclick="deletePost(this)"></span>削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(e){
                'use strict'
                if(confirm("本当に削除しますか？")){
                    document.getElemntById(form_{{ $post->id }}).submit();
                }
            }
            
        </script>
    </body>
</html>