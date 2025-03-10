@extends('chat')

@section('main-message')
    @include('Chatify::layouts.headLinks')
    <div class="messenger" style=" max-height: 90vh; ">
        {{-- ----------------------Users/Groups lists side---------------------- --}}
        <div class="messenger-listView">
            {{-- Header and search bar --}}
            <div class="m-header">
                <nav>
                    <a href="#"><i class="fas fa-inbox"></i> <span
                            class="messenger-headTitle">{{ auth()->user()->name }}</span> </a>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                        <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                    </nav>
                </nav>
                {{-- Search input --}}
                <input type="text" class="messenger-search" placeholder="Rechercher" />
                {{-- Tabs --}}
                <div class="messenger-listView-tabs">
                    <a href="#" @if ($type == 'user') class="active-tab" @endif data-view="users">
                        <span class="far fa-user"></span> Utilisateurs</a>
                </div>
            </div>
            {{-- tabs and lists --}}
            <div class="m-body contacts-container">
                {{-- Lists [Users/Group] --}}
                {{-- ---------------- [ User Tab ] ---------------- --}}
                <div class="@if ($type == 'user') show @endif messenger-tab users-tab app-scroll"
                    data-view="users">

                    {{-- Favorites --}}
                    <div class="favorites-section">
                        <p class="messenger-title">Favoris</p>
                        <div class="messenger-favorites app-scroll-thin"></div>
                    </div>

                    {{-- Saved Messages --}}
                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}

                    {{-- Contact --}}
                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

                </div>


                {{-- ---------------- [ Search Tab ] ---------------- --}}
                <div class="messenger-tab search-tab app-scroll" data-view="search">
                    {{-- items --}}
                    <p class="messenger-title">Recherche</p>
                    <div class="search-records">
                        <p class="message-hint center-el"><span>Chercher ici..</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView">
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    {{-- header back button, avatar and user name --}}
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <div class="avatar av-s header-avatar"
                            style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div>
                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                    </div>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                        <a href="/"><i class="fas fa-home"></i></a>
                        <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                    </nav>
                </nav>
            </div>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connecté</span>
                <span class="ic-connecting">Connection...</span>
                <span class="ic-noInternet">Pas d'accès internet</span>
            </div>
            {{-- Messaging area --}}
            <div class="m-body messages-container app-scroll">
                <div class="messages">
                    <p class="message-hint center-el"><span>Selectionner un message pour commencer</span></p>
                </div>
                {{-- Typing indicator --}}
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <p>
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </p>
                    </div>
                </div>
                {{-- Send Message Form --}}
                @include('Chatify::layouts.sendForm')
            </div>
        </div>
        {{-- ---------------------- Info side ---------------------- --}}
        <div class="messenger-infoView app-scroll">
            {{-- nav actions --}}
            <nav>
                <a href="#"><i class="fas fa-times"></i></a>
            </nav>
            {!! view('Chatify::layouts.info')->render() !!}
        </div>
    </div>

    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
@endsection
