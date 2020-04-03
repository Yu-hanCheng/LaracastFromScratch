@extends ('layout')
@section ('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.1/css/bulma.css"/>
@endsection
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <form action="/articles" method="post">
            @csrf
           <div class="field">
               <label for="title">Title</label>
               <div class="control">
                   <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title"/>
                  
               </div>
           </div> 
            <div class="field">
               <label for="excerpt">Excerpt</label>
               <div class="control">
                   <textarea class="textarea" type="text" name="excerpt" id="excerpt"></textarea>
                   @error('excerpt')
                    <p class="help is-danger">{{ $errors->first('excerpt')}}</p> 
                    @enderror
               </div>
           </div>
            <div class="field">
               <label for="body">Body</label>
               <div class="control">
                   <textarea class="textarea" type="text" name="body" id="body"></textarea>
                   @if ($errors->has('body'))
                    <p class="help is-danger">{{ $errors->first('body')}}</p> 
                    @endif
               </div>
           </div>
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection