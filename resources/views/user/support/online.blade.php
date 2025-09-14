@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Support Ticket System</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Send Messages</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <style>
                                .chat-container {
                                    width: 100%;
                                    background: white;
                                    border-radius: 10px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    overflow: hidden;
                                }

                                .chat-box {
                                    height: 400px;
                                    overflow-y: auto;
                                    padding: 10px;
                                    display: flex;
                                    flex-direction: column;
                                }

                                .message {
                                    max-width: 75%;
                                    padding: 10px;
                                    border-radius: 10px;
                                    margin: 5px 0;
                                    position: relative;
                                }

                                .received {
                                    background-color: #e0e0e0;
                                    align-self: flex-start;
                                }

                                .sent {
                                    background-color: #0084ff;
                                    color: white;
                                    align-self: flex-end;
                                }

                                .time {
                                    display: block;
                                    font-size: 12px;
                                    margin-top: 5px;
                                    text-align: right;
                                    opacity: 0.7;
                                }

                                .input-box {
                                    display: flex;
                                    padding: 10px;
                                    border-top: 1px solid #ddd;
                                    background: #fff;
                                }

                                .input-box input {
                                    flex: 1;
                                    padding: 10px;
                                    border: none;
                                    outline: none;
                                    font-size: 16px;
                                    border-radius: 20px;
                                    background: #f1f1f1;
                                }

                                .input-box button {
                                    padding: 10px 20px;
                                    border: none;
                                    background: #0084ff;
                                    color: white;
                                    font-size: 16px;
                                    border-radius: 20px;
                                    margin-left: 10px;
                                    cursor: pointer;
                                }

                                .input-box button:hover {
                                    background: #006bd6;
                                }
                            </style>
                            <div class="chat-container">
                                <div class="left">

                                </div>
                                <div class="right">
                                    <div class="chat-box" id="chat-box">
                                        @foreach ($chat_details as $item)
                                            <div class="message @if($item->sender_id==auth()->id()) sent @else received @endif">
                                                <p>{{ $item->message }}</p>
                                                <span class="time">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}</span>
                                            </div>    
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="chat-box" id="chat-box">
                                    <div class="message received">
                                        <p>Hey! How are you?</p>
                                        <span class="time">10:30 AM</span>
                                    </div>
                                    <div class="message sent">
                                        <p>I'm good! How about you?</p>
                                        <span class="time">10:32 AM</span>
                                    </div>
                                    <div class="message received">
                                        <p>I'm doing great, thanks for asking! 😊</p>
                                        <span class="time">10:34 AM</span>
                                    </div>
                                </div> --}}
                                <div class="input-box">
                                    <input type="text" placeholder="Type a message..." id="message">
                                    <button id="sendBtn" onclick="sendMessage()">Send</button>
                                </div>
                                {{-- <div id="messages"></div>
                                <input type="text" id="message" placeholder="Type a message">
                                <button onclick="sendMessage()">Send</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('script-push')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const authUserId = {{ auth()->id() }}; // Store it once

        console.log("authUserId=" + authUserId);

        function formatTime(timestamp) {
            let date = new Date(timestamp);
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12 || 12; // Convert 0 to 12 for AM/PM format
            minutes = minutes.toString().padStart(2, '0'); // Ensure two-digit minutes

            return `${hours}:${minutes} ${ampm}`;
        }
        function fetchMessages() {
            axios.get('/user/messages').then(response => {
                console.log("balbla");
                document.getElementById("chat-box").innerHTML = response.data.map(msg => 
                    // `<p><strong>${msg.user_id == authUserId ? 'You' : 'User'}:</strong> ${msg.message}</p>`
                    `<div class="message ${msg.sender_id== authUserId ? 'sent': 'received'} ">
                        <p>${msg.message}</p>
                        <span class="time">${formatTime(msg.created_at)}</span>
                    </div>`
                ).join('');
            });
        }

        function sendMessage() {
            console.log("sendmsg");
            const message = document.getElementById("message").value;
            axios.post('/user/messages', {
                message
            }).then(() => {
                document.getElementById("message").value = "";
            });
        }

        Pusher.logToConsole = true;
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });
        var channel = pusher.subscribe("admin.chat");
        channel.bind("message-sent", function() {
            console.log("admin_chat");
            fetchMessages();
        });

        fetchMessages();
    </script>
@endpush
