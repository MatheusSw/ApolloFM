@extends('layouts.dashboard')

@section('title', 'Home')

@section('header')
    @if( Auth::user()->lastfm_user)
        <div id="stats-header" class="grid grid-cols-1 mt-16 md:grid-cols-2 lg:grid-cols-5 xl:grid-col-5">
            <div class="flex flex-wrap items-center justify-center">
                <div class="flex-shrink mr-5">
                    @svg('/images/icons/lastfm.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">{{$lastfmUser['scrobbles']}}</span>
                    <span class="font-normal">Scrobbles</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/heart.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">{{$lastfmUser['lovedTracks']}}</span>
                    <span class="font-normal">Loved tracks</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/clock.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">{{$lastfmUser['listeningTime']}}</span>
                    <span class="font-normal">Listening time</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/music.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">{{$lastfmUser['artists']}}</span>
                    <span class="font-normal">Artists</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/vinyl.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">{{$lastfmUser['tracks']}}</span>
                    <span class="font-normal">Tracks</span>
                </div>
            </div>
        </div>
    @else
        <div id="stats-header" class="grid grid-cols-1 mt-16 md:grid-cols-2 lg:grid-cols-5 xl:grid-col-5">
            <div class="flex flex-wrap items-center justify-center">
                <div class="flex-shrink mr-5">
                    @svg('/images/icons/lastfm.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">?</span>
                    <span class="font-normal">Scrobbles</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/heart.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">?</span>
                    <span class="font-normal">Loved tracks</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/clock.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">?</span>
                    <span class="font-normal">Listening time</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/music.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">?</span>
                    <span class="font-normal">Artists</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center">
                <div class="mr-5">
                    @svg('/images/icons/vinyl.svg', 'fill-salmon w-12')
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold">?</span>
                    <span class="font-normal">Tracks</span>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="p-1 mt-5">
                <div class="p-4 text-orange-700 bg-orange-100 rounded-medium" role="alert">
                    <p class="font-bold">Last.FM account missing</p>
                    <p>Go to <a class="font-bold underline text-salmon" href="{{route('dashboard.settings')}}">settings</a> and get started!</p>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('main-content')
    <div class="grid gap-16 mt-10 md:grid-cols-1 lg:grid-cols-2">
        <div id="ArtistOfTheWeek">
            <div class="flex flex-grow bg-white rounded-large">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/1/14/Travis_Scott_-_Openair_Frauenfeld_2019_08.jpg"
                    alt="Artist of the week" class="object-cover object-center w-1/2 overflow-hidden rounded-large">
                <div class="w-1/2 p-2 my-5">
                    <div class="flex flex-col items-center h-full justify-evenly">
                        @svg(images/icons/stars.svg,'w-24')
                        <div class="mt-5 text-center">
                            <div>
                                <span class="text-xl font-medium">Artist of the week</span>
                            </div>
                            <div>
                                <span class="text-5xl font-bold">Travis scott</span>
                            </div>
                            <div class="text-center">
                                <span class="font-normal">with</span><br>
                                <span class="text-2xl font-bold">33.4k</span><br>
                                <span class="font-normal">scrobbles</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-16 md:grid-cols-2">
            <div id="AlbumOfTheWeek" class="min-w-full">
                <div
                    class="flex flex-col flex-wrap items-center h-full p-5 text-center bg-white rounded-large justify-evenly">
                    <span class="text-xl font-bold">Album of the week</span>
                    <div id="AlbumOfTheWeek-Info">
                        <span class="font-semibold">
                            My beautiful dark twisted fantasy
                        </span></br>
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61MoJyecIHL._SL1200_.jpg"
                             alt="My beautiful dark twisted fantasy album cover"
                             class="inline-block object-cover w-48 h-48 overflow-hidden rounded-medium"/></br>
                        <span class="font-semibold">
                            Kanye West
                        </span>
                    </div>
                    <div>
                        with</br>
                        <span class="text-2xl font-bold">20.3k</span></br>
                        scrobbles
                    </div>
                </div>
            </div>
            <div id="TrackOfTheWeek" class="min-w-full">
                <div
                    class="flex flex-col flex-wrap items-center h-full p-5 text-center bg-white rounded-large justify-evenly">
                    <span class="text-xl font-bold">Track of the week</span>
                    <div id="AlbumOfTheWeek-Info">
                        <span class="font-semibold">
                            Amour plastique
                        </span></br>
                        <img src="https://lastfm.freetls.fastly.net/i/u/ar0/d8f8c186c485b7b6db0c735391b6a8eb.jpg"
                             alt="Amour plastique cover"
                             class="inline-block object-cover w-48 h-48 overflow-hidden rounded-medium"/></br>
                        <span class="font-semibold">
                            Videoclub
                        </span>
                    </div>
                    <div>
                        with</br>
                        <span class="text-2xl font-bold">10.2k</span></br>
                        scrobbles
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
