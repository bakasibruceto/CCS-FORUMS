<x-app-layout>
    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/3">

            @livewire('chat.chat-list')

        </div>

        <div class="w-full md:w-2/3">

            @livewire('chat.chatbox')

            @livewire('chat.send-message')
        </div>
    </div>

    <script>
        window.addEventListener('chatSelected', event => {

            if (window.innerWidth < 768) {

                $('.chat_list_container').hide();
                $('.chat_box_container').show();

            }

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
            let height = $('.chatbox_body')[0].scrollHeight;
            window.livewire.dispatch('updateHeight', {

                height: height,

            });
        });

        $(window).resize(function() {

            if (window.innerWidth > 768) {
                $('.chat_list_container').show();
                $('.chat_box_container').show();

            }

        });

        $(document).on('click', '.return', function() {

            $('.chat_list_container').show();
            $('.chat_box_container').hide();

        });
    </script>

    <script>
        $(document).on('scroll', '#chatBody', function() {

            var top = $('.chatbox_body').scrollTop();
            if (top == 0) {

                window.livewire.dispatch('loadmore');
            }

        });
    </script>
</x-app-layout>
