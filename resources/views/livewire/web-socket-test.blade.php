<div>
    <x-page-title pageTitle="Usuários" wire:click="searchUserClear()"/>
    <x-content acao="open"/>

    <x-grid cols=2 spaces=0 class="justify-center" />

        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    
                    <ul id="teste"
                        class="list-unstyled"
                        style="height:300px; overflow-y:auto;">

                        @foreach($messages as $message)
                            <li class="p-2">
                                <strong>{{ $message['user']['name'] }}</strong>
                                {{ $message['message'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <input
                    wire:model="message"
                    onkeydown="sendTypingEvent()" 
                    wire:keydown.enter="sendMessage" 
                    onkeyup="scrollToB()"
                    type="text" 
                    name="message" 
                    placeholder="Enter your message..." 
                    class="form-control" />
            </div>

            @if($userTypping)
                <span class="text-muted">{{ $userTypping['name'] }} user is typing...</span>
                @php
                    $userTypping = [];
                @endphp
            @endif
        </div>

        <div class="col-6">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        @foreach($usersList as $us)
                            <li class="py-2"><strong>{{ $us['name'] }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> 
        
        <x-grid acao='close' />         

    <x-content acao="close"/>
</div>  
@push('custom-scrip')
    <script>
        var typpingTimer;
        var scrollToB = function() {
            const theElement = document.getElementById('teste');
            const scrollToBottom = (node) => {
                node.scrollTop = node.scrollHeight;
            }
            setTimeout(function() {
                scrollToBottom(theElement);
            }, 100)
        }
        function sendTypingEvent() {
            window.Echo.join('chat')                      
                .whisper('typing', @this.activeUser);
        }

        scrollToB();        

        window.Echo.join('chat')
            .here(user => {
                @this.set("loggedUser", user);               
            })
            .joining(user => {
                @this.set("joiningUsers", user);
            })
            .leaving(user => {
                @this.set("leavingUsers", user);
            })                        
            .listen('MessageSent', (e) => {
                @this.set("newMessage", e.message);
                scrollToB(); 
            })
            .listenForWhisper('typing', user => {
                @this.set("userTypping", user);
                if(typpingTimer) {
                    clearTimeout(typpingTimer);
                }

                typpingTimer = setTimeout(() => {
                    @this.set("userTypping", []);
                }, 1500);
            });

        scrollToB();
    </script>
@endpush
@stack('custom-scrip')
