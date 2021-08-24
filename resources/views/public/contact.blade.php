@extends('layouts.app')

@section('meta-generator')
<meta name="title" content="Contact | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="Contact | BeEmployer">
<title>Contact | BeEmployer</title>
@endsection

@section('content')

<div class="container content">
    <div class="row">
        <div class="my-3 col-md-10 offset-md-1 border border-primary rounded">
            @if(session()->has('success'))
                <div class="mt-1 py-1 alert alert-success">{{session()->get('success')}}</div>
            @endif
            <div class="well well-sm">
                <form action="{{route('submitContact')}}" method=post>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Adresse email :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Enter votre email" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">Sujet :</label>
                                <select name="subject" class="custom-select @error('subject') is-invalid @enderror" >
                                    <option value="" {{old('subject')==''?'selected':''}}>Choisissez:</option>
                                    <option value="service" {{old('subject')=='service'?'selected':''}}>Service client général</option>
                                    <option value="suggestions" {{old('subject')=='suggestions'?'selected':''}}>Suggestions</option>
                                    <option value="product" {{old('subject')=='product'?'selected':''}}>Support de produits</option>
                                </select>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5" cols="25"  placeholder="Message">{{old('message')}}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1 mb-1">
                            <button type="submit" class="btn btn-primary btn-block">Envoyer le message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection