@extends('super-admin.master', [
'title' => 'Chatting dengan customer'
])

@section('body')
    @if (session('data'))
        @include('layouts.alert')
    @endif

    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-sm-4 col-lg-4">
            <div class="card chat-box" id="mychatbox">
                <div class="card-header">
                    <h4>Customers</h4>
                </div>
                <div class="card-body chat-content">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach ($data as $i => $item)
                            <li class="media" data-id="{!! $item->id !!}" data-username="{!! $item->username !!}" style="cursor: pointer">
                                <img alt="image" class="mr-3 rounded-circle" width="50"
                                    src="{{ asset('public/assets/img/avatar-1.png') }}">
                                <div class="media-body">
                                    <div class="mt-0 mb-1 font-weight-bold">{{ $item->username }}</div>
                                    <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer chat-form">
                    <div style="height: 50px"></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-8">
            <div class="card chat-box" id="mychatbox">
                <div class="card-header">
                    <h4 id="text-username">Chat with </h4>
                </div>

                <div class="card-body chat-content" id="chat-content"></div>

                <div class="card-footer chat-form">
                    <div id="chat-form">
                        <input type="text" class="form-control" placeholder="Type a message" id="chatInput">
                        <button class="btn btn-primary" type="button">
                            <i class="far fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>
    <script>
        let last = -1
        function write(message, sender, datetime) {
            let chat

            if (sender == 0) {
                chat = `
                <div class="chat-item chat-left" style="">
                    ${ last == 0 ? '': `<img src="{{ asset('public/assets/img/avatar-1.png') }}">` }
                    <div class="chat-details">
                        <div class="chat-text">${message}</div>
                        <div class="chat-time">${ datetime.format("dddd, D MMMM YYYY, h:mm") }</div>
                    </div>
                </div>`
            } else {
                chat = `
                    <div class="chat-item chat-right" style="">
                    ${ last == 1 ? '': `<img src="{{ asset('public/assets/img/avatar-2.png') }}">` }
                    <div class="chat-details">
                        <div class="chat-text">${ message }</div>
                        <div class="chat-time">${ datetime.format("dddd, MMMM Do YYYY, h:mm:ss") }</div>
                    </div>
                </div>
                `
            }

            last = sender
            $('#chat-content').append(chat)
        }

        $(document).ready(function() {
            let id
            let ip_address  = '127.0.0.1';
            let socket_port = '3000';
            let socket      = io(ip_address + ':' + socket_port);
            let chatInput   = $('#chatInput');
            let credential

            $('.media').click(function() {
                id = $(this).data('id')
                let username = $(this).data('username')

                credential = { id: id }

                $('#chat-content').empty()
                $('#text-username').html('Chat With @'+ username)

                socket.emit('init', credential);

                $.ajax({
                    url: '{!! url("/chats") !!}/'+ id + '/edit',
                    type: 'GET',
                    success: (res, status, xhr) => {
                    }
                })
            })

            chatInput.keypress(function(e) {
                let message = $(this).val();
                if(e.which === 13 && !e.shiftKey) {
                    socket.emit('send', {
                        credential: credential,
                        inputs: {
                            chat_id: id,
                            sender : 1,
                            message: message
                        }
                    });
                    chatInput.val('');
                    return false;
                }
            });

            socket.on('loaded', (res) => {
                res.data.forEach(element => write(element.message, element.sender, moment(element.created_at)));
            });

            socket.on('receive', (element) => write(element.data.message, element.data.sender, moment(element.data.created_at)));
        })
    </script>
@endsection
