@extends('layouts.basic')
@section('content')
    <div class="container mt-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <div class="card card-primary chat-box" id="mychatbox" style="height: 628px">
                    <div class="card-header">
                        <a href="{{ url('/') }}" class="btn btn-default">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>

                        <h4 id="text-username">Chatting dengan Ahli Psikolog</h4>
                    </div>

                    <div class="card-body chat-content" id="chat-content">
                    </div>

                    <div class="card-footer chat-form">
                        <div id="chat-form">
                            <input type="text" class="form-control" placeholder="Type a message" id="chatInput">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" tabindex="-1" role="dialog" id="modal" aria-hidden="true" style="display: none;"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        @csrf

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setup Username</h5>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <span>
                        Atur username sebagai tanda pengenal kepada psikolog yang akan menangani anda.
                    </span>
                    <br>

                    <input type="text" class="form-control mt-3" name="username" value="" placeholder="Username">
                </div>
            </div>

            <div class="modal-footer flex justify-content-right">
                <button type="button" class="btn btn-primary btn-icon" id="save-username">
                    <i class="fas fa-check"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>
    <script>
        let last = -1
        function write(message, sender, datetime) {
            let chat

            if (sender == 1) {
                chat = `
                <div class="chat-item chat-left" style="">
                    ${ last == 1 ? '': `<img src="{{ asset('public/assets/img/avatar-1.png') }}">` }
                    <div class="chat-details">
                        <div class="chat-text">${message}</div>
                        <div class="chat-time">${ datetime.format("dddd, D MMMM YYYY, h:mm") }</div>
                    </div>
                </div>`
            } else {
                chat = `
                    <div class="chat-item chat-right" style="">
                    ${ last == 0 ? '': `<img src="{{ asset('public/assets/img/avatar-2.png') }}">` }
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
            if (localStorage.getItem('username') == null) {
                $('#modal').modal('show')

                $('#save-username').click(function() {
                    $('#modal').modal('hide')

                    $input = $('input[name=username]')
                    $token = $('input[type=hidden]')

                    if ($input.val() != null) {
                        localStorage.setItem('username', $input.val())
                        localStorage.setItem('token', $token.val())

                        $.ajax({
                            url: '{!! route("chat.init") !!}',
                            type: 'POST',
                            data: {
                                token: $token.val(),
                                _token: $token.val(),
                                username: $input.val()
                            },
                            success: (res, status, xhr) => {
                                localStorage.setItem('id', res)
                                $('#text-username').html('@'+ $input.val())
                            }
                        })
                    } else {
                        alert('username tidak boleh kosong');
                    }
                })
            } else {
                $('#text-username').text('@'+ localStorage.getItem('username'))

                let ip_address  = '127.0.0.1';
                let socket_port = '3000';
                let socket      = io(ip_address + ':' + socket_port);
                let chatInput   = $('#chatInput');
                let credential  = {
                    id: localStorage.getItem('id'),
                    token: localStorage.getItem('token'),
                    username: localStorage.getItem('username')
                }

                socket.emit('init', credential);

                chatInput.keypress(function(e) {
                    let message = $(this).val();
                    if(e.which === 13 && !e.shiftKey) {
                        socket.emit('send', {
                            credential: credential,
                            inputs: {
                                chat_id: localStorage.getItem('id'),
                                sender : 0,
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

                socket.on('receive', (element) => {
                    write(element.data.message, element.data.sender, moment(element.data.created_at))
                });
            }
        })
    </script>
@endsection
