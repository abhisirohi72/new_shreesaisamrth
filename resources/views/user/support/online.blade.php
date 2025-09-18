@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Send and receive support messages</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Support Chat</h3>
        </div>

        @include('layouts.error_msg')

        <div class="chat-container">
            <div class="chat-box" id="chat-box">
                @foreach ($chat_details as $item)
                    <div class="message @if($item->sender_id == auth()->id()) sent @else received @endif">
                        <p>{{ $item->message }}</p>
                        <span class="time">{{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}</span>
                    </div>    
                @endforeach
            </div>

            <div class="input-box">
                <input type="text" placeholder="Type a message..." id="message">
                <button id="sendBtn" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

    <style>
        .chat-container {
            width: 100%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 20px;
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
@endsection

@push('script-push')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    const authUserId = {{ auth()->id() }};

    function formatTime(timestamp) {
        let date = new Date(timestamp);
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;
        minutes = minutes.toString().padStart(2, '0');
        return `${hours}:${minutes} ${ampm}`;
    }

    function fetchMessages() {
        axios.get('/user/messages').then(response => {
            document.getElementById("chat-box").innerHTML = response.data.map(msg => 
                `<div class="message ${msg.sender_id == authUserId ? 'sent': 'received'}">
                    <p>${msg.message}</p>
                    <span class="time">${formatTime(msg.created_at)}</span>
                </div>`
            ).join('');
            document.getElementById("chat-box").scrollTop = document.getElementById("chat-box").scrollHeight;
        });
    }

    function sendMessage() {
        const message = document.getElementById("message").value;
        if(!message.trim()) return;
        axios.post('/user/messages', { message }).then(() => {
            document.getElementById("message").value = "";
        });
    }

    Pusher.logToConsole = true;
    var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
    });
    var channel = pusher.subscribe("admin.chat");
    channel.bind("message-sent", function() {
        fetchMessages();
    });

    fetchMessages();
</script>
@endpush
