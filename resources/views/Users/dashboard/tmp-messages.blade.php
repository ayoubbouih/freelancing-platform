@extends('layouts.app')
@section('includes')
<link rel="stylesheet" href="{{ asset('css/user/messages.css') }}">


@endsection
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="img_cont">
                                    <img src="images/female-avatar.png" class="rounded-circle">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>Chat avec Tjdigt</span>
                                    <p>17 Messages</p>
                                </div>
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                            <div class="action_menu">
                                <ul>
                                    <li><i class="fas fa-user-circle"></i> Visiter le profile</li>
                                    <li><i class="fas fa-ban"></i> Reporter</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start mb-2">
                                <div class="img_cont img_msg">
                                    <img src="images/male-avatar.png" class="rounded-circle">
                                </div>
                                <div class="msg_envoyer">
                                    Hi, how are you samim?
                                    <span class="msg_time_send">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="msg_recevoir">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont img_msg">
                                    <img src="images/female-avatar.png" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="img_cont img_msg">
                                    <img src="images/male-avatar.png" class="rounded-circle">
                                </div>
                                <div class="msg_envoyer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time_send">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="msg_recevoir">
                                    You are welcome
                                    <span class="msg_time">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont img_msg">
                                    <img src="images/female-avatar.png" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="img_cont img_msg">
                                    <img src="images/male-avatar.png" class="rounded-circle">
                                </div>
                                <div class="msg_envoyer">
                                    I am looking for your next templates
                                    <span class="msg_time_send">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="msg_recevoir">
                                    You are welcome tal messages for testing here whe going to shot messag
                                    or testing here whe going to shot messag
                                    <span class="msg_time">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont img_msg">
                                    <img src="images/female-avatar.png" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="img_cont img_msg">
                                    <img src="images/male-avatar.png" class="rounded-circle">
                                </div>
                                <div class="msg_envoyer">
                                    Bye, see you
                                    <span class="msg_time_send">9:12 AM, Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control" placeholder="Inserer votre message..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection